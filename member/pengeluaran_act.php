<?php 
include '../koneksi.php';
$id_keluar = $_POST['id_keluar'];
$nama_proxy   = $_POST['nama_proxy'];
$tanggal   = $_POST['tanggal'];
$detail = $_POST['detail'];
$jumlah = $_POST['jumlah'];


mysqli_query($koneksi, "insert into keluar values('', '$id_keluar', '$tanggal','$nama_proxy', '$detail', '$jumlah')");
header("location:pengeluaran.php");

 ?>