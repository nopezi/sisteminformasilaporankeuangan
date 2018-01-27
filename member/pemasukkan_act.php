<?php 
include '../koneksi.php';
$id_proxy = $_POST['id_proxy'];
$nama_proxy = $_POST['nama_proxy'];
$tanggal   = $_POST['tanggal'];
$nama_pelanggan   = $_POST['nama_pelanggan'];
$paket   = $_POST['paket'];
$no_invoice = $_POST['no_invoice'];
$income = $_POST['income'];
$share_office   = $_POST['share_office'];


if($tanggal == ""){
	echo '<script language="javascript">alert("Isi Semua Data"); document.location="pemasukkan.php";</script>';
}else{
	mysqli_query($koneksi, "insert into pemasukkan values('', '$id_proxy', '$nama_proxy', '$tanggal','$nama_pelanggan', '$paket', '$no_invoice', '$income', '$share_office')");
	header("location:pemasukkan.php");
}


 ?>