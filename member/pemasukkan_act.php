<?php 
include '../koneksi.php';
$id_proxy = $_POST['id_proxy'];
$tanggal   = $_POST['tanggal'];
$nama_pelanggan   = $_POST['nama_pelanggan'];
$paket   = $_POST['paket'];
$no_invoice = $_POST['no_invoice'];
$income = $_POST['income'];
$share_office   = $_POST['share_office'];



mysqli_query($koneksi, "insert into pemasukkan values('', '$id_proxy', '$tanggal','$nama_pelanggan', '$paket', '$no_invoice', '$income', '$share_office')");
header("location:pemasukkan.php");

 ?>