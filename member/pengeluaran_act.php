<?php 
include '../koneksi.php';
$id_proxy = $_POST['id_proxy'];
$tanggal   = $_POST['tanggal'];
$bulan   = $_POST['bulan'];
$tahun   = $_POST['tahun'];
$nama_proxy = $_POST['nama_proxy'];
$detail = $_POST['detail'];
$jumlah = $_POST['jumlah'];


mysqli_query($koneksi, "insert into keluar values('', '$id_proxy', '$tanggal', '$bulan', '$tahun', '$nama_proxy', '$detail', '$jumlah')");
header("location:coba.php");

 ?>