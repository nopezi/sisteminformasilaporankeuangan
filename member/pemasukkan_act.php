<?php 
include '../koneksi.php';
$id_proxy = $_POST['id_proxy'];
$nama_proxy = $_POST['nama_proxy'];
$tanggal   = $_POST['tanggal'];
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$nama_pelanggan   = $_POST['nama_pelanggan'];
$paket   = $_POST['paket'];
$no_invoice = $_POST['no_invoice'];
$income = $_POST['income'];
$share_office   = $_POST['share_office'];
$share_proxy = $_POST['share_proxy'];
$lain = $_POST['lain'];


if($tanggal == "" || $bulan == ""){
	echo '<script language="javascript">alert("Isi Semua Data"); document.location="finance.php";</script>';
}else{
	mysqli_query($koneksi, "insert into pemasukkan values('', '$id_proxy', '$nama_proxy', '$tanggal', '$bulan', '$tahun', '$nama_pelanggan', '$paket', '$no_invoice', '$income', '$share_office', '$share_proxy', '$lain')");
	header("location:finance.php");
}


 ?>