<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika dataSiswa diklik maka
if (isset($_POST['databarang'])) {
    $output = '';

    // mengambil data siswa dari nis yang berasal dari dataSiswa
    $sql = "SELECT * FROM barang WHERE nis = '" . $_POST['databarang'] . "'";
    $result = mysqli_query($koneksi, $sql);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '<tr align="center">
                            <td colspan="2"><img src="img/' . $row['gambar'] . '" width="50%"></td>
                        </tr>
                        <tr>
                            <th width="40%">NIS</th>
                            <td width="60%">' . $row['no faktur'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama</th>
                            <td width="60%">' . $row['nama barang'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Tempat dan Tanggal beli</th>
                            <td width="60%">' . $row['tmpt_beli'] . ', ' . date("d M Y", strtotime($row['tgl_beli'])) . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Jenis barang</th>
                            <td width="60%">' . $row['jekel'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Jurusan</th>
                            <td width="60%">' . $row['no barang'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">harga barang</th>
                            <td width="60%">' . $row['harga barang'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">jumlah barang</th>
                            <td width="60%">' . $row['jumlah barang'] . '</td>
                        </tr>
                        ';
    }
    $output .= '</table></div>';
    // Tampilkan $output
    echo $output;
}
