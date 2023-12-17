<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Menampilkan semua data dari table siswa berdasarkan nis secara Descending
$siswa = query("SELECT * FROM siswa ORDER BY nis DESC");

// Membuat nama file
$filename = "data barang-" . date('Ymd') . ".xls";

// Kodingam untuk export ke excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Siswa.xls");

?>
<table class="text-center" border="1">
    <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>No faktur</th>
            <th>Nama barang</th>
            <th>Tempat beli</th>
            <th>Expired</th>
            <th>Jenis barang</th>
            <th>No barang</th>
            <th>Harga barang</th>
            <th>Jumlah barang</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php $no = 1; ?>
        <?php foreach ($barang as $row) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['no faktur']; ?></td>
                <td><?= $row['nama barang']; ?></td>
                <td><?= $row['tmpt_beli']; ?>, <?= $row['tgl_beli']; ?></td>
                <?php
                $now = time();
                $timeTahun = strtotime($row['tgl_beli']);
                $setahun = 31536000;
                $hitung = ($now - $timeTahun) / $setahun;
                ?>
                <td><?= floor($hitung); ?> Tahun</td>
                <td><?= $row['jekel']; ?></td>
                <td><?= $row['No barang']; ?></td>
                <td><?= $row['harga barang']; ?></td>
                <td><?= $row['jumlah barang']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>