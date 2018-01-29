<?php 
include '../koneksi.php';
$id_proxy = $_POST['id_proxy'];
$tanggal   = $_POST['tanggal'];
$bulan   = $_POST['bulan'];
$tahun   = $_POST['tahun'];
$nama_proxy = $_POST['nama_proxy'];
$detail = $_POST['detail'];
$jumlah = $_POST['jumlah'];

if($tanggal == "" || $bulan == ""){
	echo '<script language="javascript">alert("Isi Semua Data"); document.location="finance.php";</script>';
}else{
mysqli_query($koneksi, "insert into keluar values('', '$id_proxy', '$tanggal', '$bulan', '$tahun', '$nama_proxy', '$detail', '$jumlah')");
header("location:finance.php");
}
 ?>