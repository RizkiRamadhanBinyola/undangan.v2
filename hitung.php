<?php
include 'config.php';

// menghitung jumlah data sebelumnya
$query_jumlah_sebelumnya = "SELECT count(*) AS jumlah_sebelumnya FROM msg";
$dewan2 = $conn->prepare($query_jumlah_sebelumnya);
$dewan2->execute();
$res2 = $dewan2->get_result();
$row2 = $res2->fetch_assoc();
$jumlah_sebelumnya = $row2['jumlah_sebelumnya'];

// melakukan input data

// menghitung jumlah data setelah input berhasil
$query_jumlah = "SELECT count(*) AS jumlah FROM msg";
$dewan1 = $conn->prepare($query_jumlah);
$dewan1->execute();
$res1 = $dewan1->get_result();

// cek apakah query mengembalikan hasil atau tidak
if ($res1->num_rows > 0) {
  $row1 = $res1->fetch_assoc();
  $jumlah_terbaru = $row1['jumlah'];
  $jumlah_baru = $jumlah_terbaru - $jumlah_sebelumnya; // menghitung selisih antara jumlah data saat ini dengan jumlah data sebelumnya
} else {
  $jumlah_terbaru = 0;
  $jumlah_baru = 0;
}

echo "Jumlah data record hasil inputan terbaru: " . $jumlah_baru;
