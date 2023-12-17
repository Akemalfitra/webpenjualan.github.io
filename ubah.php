<?php
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

// Memanggil atau membutuhkan file function.php
require 'function.php';

// Mengambil data dari nis dengan fungsi get
$nis = $_GET['nis'];

// Mengambil data dari table siswa dari nis yang tidak sama dengan 0
$barang = query("SELECT * FROM siswa WHERE nis = $nis")[0];

// Jika fungsi ubah lebih dari 0/data terubah, maka munculkan alert dibawah
if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('Data barang berhasil diubah!');
                document.location.href = 'index.php';
            </script>";
    } else {
        // Jika fungsi ubah dibawah dari 0/data tidak terubah, maka munculkan alert dibawah
        echo "<script>
                alert('Data barang gagal diubah!');
            </script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     <!-- Bootstrap Icons -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
     <!-- Font Google -->
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
     <!-- animasi CSS Aos -->
     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
     <!-- My CSS -->
     <link rel="stylesheet" href="css/style.css">

     <title>Update Data</title>
</head>

<body background="img/bg/bck.png">
     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
          <div class="container">
               <a class="navbar-brand" href="index.php">Sistem Admin Data Siswa</a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                         <li class="nav-item">
                              <a class="nav-link" aria-current="page" href="index.php">Home</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="#about">About</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="logout.php">Logout</a>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>
     <!-- Close Navbar -->

     <!-- Container -->
     <div class="container">
          <div class="row my-2 text-light">
               <div class="col-md">
                    <h3 class="fw-bold text-uppercase ubah_data"></h3>
               </div>
               <hr>
          </div>
          <div class="row my-2 text-light">
               <div class="col-md">
                    <form action="" method="post" enctype="multipart/form-data">
                         <input type="hidden" name="gambarLama" value="<?= $siswa['gambar']; ?>">
                         <div class="mb-3">
                              <label for="no barang" class="form-label">No barang</label>
                              <input type="number" class="form-control w-50" id="no barang" value="<?= $barang['no barang']; ?>"
                                   name="no barang" readonly>
                         </div>
                         <div class="mb-3">
                              <label for="nama barang" class="form-label">Nama barang</label>
                              <input type="text" class="form-control w-50" id="nama baranh" value="<?= $barang['nama barang']; ?>"
                                   name="nama barang" autocomplete="off" required>
                         </div>
                         <div class="mb-3">
                              <label for="tmpt_beli" class="form-label">Tempat beli</label>
                              <input type="text" class="form-control w-50" id="tmpt_beli"
                                   value="<?= $barang['tmpt_beli']; ?>" name="tmpt_beli" autocomplete="off" required>
                         </div>
                         <div class="mb-3">
                              <label for="tgl_beli" class="form-label">Tanggal Beli</label>
                              <input type="date" class="form-control w-50" id="tgl_beli"
                                   value="<?= $barang['tgl_beli']; ?>" name="tgl_beli" autocomplete="off" required>
                         </div>
                         <div class="mb-3">
                              <label>Jenis barang</label>
                              <div class="form-check">
                                   <input class="form-check-input" type="radio" name="jekel" id="makanan"
                                        value="makanan" <?php if ($barang['jekel'] == 'makanan') { ?> checked=''
                                        <?php } ?>>
                                   <label class="form-check-label" for="makanan">makanan</label>
                              </div>
                              <div class="form-check">
                                   <input class="form-check-input" type="radio" name="jekel" id="bahan dapur"
                                        value="bahan dapur" <?php if ($barang['jekel'] == 'bahan dapur') { ?> checked=''
                                        <?php } ?>>
                                   <label class="form-check-label" for="bahan dapur">bahan dapur</label>
                              </div>
                         </div>
                         <div class="mb-3">
                              <label for="no barang" class="form-label">no barang</label>
                              <select class="form-select w-50" id="no barang" name="no barang">
                                   <option disabled selected value>--------------------------------------------Pilih
                                        Jurusan--------------------------------------------</option>
                                   <option value="15" <?php if ($barang['no barang'] == '15') { ?>
                                        selected='' <?php } ?>>15</option>
                                   <option value="10"
                                        <?php if ($barang['no barang'] == '10') { ?> selected=''
                                        <?php } ?>>10</option>
                                   <option value="100" <?php if ($barang['no barang'] == '100') { ?>
                                        selected='' <?php } ?>>100</option>
                                   <option value="4"
                                        <?php if ($barang['no barang'] == '4') { ?> selected=''
                                        <?php } ?>>4</option>
                                   <option value="18" <?php if ($barang['no barang'] == '18') { ?>
                                        selected='' <?php } ?>>18</option>
                                   <option value="19" <?php if ($barang['no barang'] == '19') { ?> selected=''
                                        <?php } ?>>19</option>
                              </select>
                         </div>
                         <div class="mb-3">
                              <label for="harga barang" class="form-label">harga barang</label>
                              <input type="harga barang" class="form-control w-50" id="harga barang" value="<?= $siswa['harga barang']; ?>"
                                   name="harga barang" autocomplete="off" required>
                         </div>
                         <div class="mb-3">
                              <label for="jumlah barang" class="form-label">jumlah barang</label>
                              <textarea class="form-control w-50" id="jumlah barang" rows="5" name="jumlah barang"
                                   autocomplete="off"><?= $barang['jumlah barang']; ?></textarea>
                         </div>
                         <hr>
                         <a href="index.php" class="btn btn-secondary">Kembali</a>
                         <button type="submit" class="btn btn-warning" name="ubah">Ubah</button>
                    </form>
               </div>
          </div>
     </div>
     <!-- Close Container -->



     <!-- Footer -->
     <div class="container-fluid">
          <div class="row bg-dark text-white text-center">
               <div class="col my-2" id="about">
                    <br><br><br>
                    <h4 class="fw-bold text-uppercase">About</h4>

                    <p>
                         Pembuat:
                         1. Hakim alfitra(230180081)
                    </p>
               </div>
          </div>
     </div>
     <!-- Close Footer -->

     <!-- Bootstrap -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
     </script>

     <!-- animasi  gsap-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"> </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/TextPlugin.min.js"></script>
     <script>
     gsap.registerPlugin(TextPlugin);
     gsap.to('.ubah_data', {
          duration: 2,
          delay: 1,
          text: '<i class="bi bi-pencil-square"></i>Ubah Data Barang'
     })
     gsap.from('.navbar', {
          duration: 1,
          y: '-100%',
          opacity: 0,
          ease: 'bounce',
     })
     </script>
</body>

</html>