<?php 
include '../koneksi.php';
$id_keluar=$_POST['id_keluar'];
$id_proxy=$_POST['id_proxy'];
$tanggal=$_POST['tanggal'];
$nama_proxy=$_POST['nama_proxy'];
$detail=$_POST['detail'];
$jumlah=$_POST['jumlah'];



mysqli_query($koneksi, "update keluar set
			id_proxy='$id_proxy', 
			tanggal='$tanggal', 
			nama_proxy='$nama_proxy', 
			detail='$detail', 
			jumlah='$jumlah'
			where id_keluar='$id_keluar'");
header("location:pengeluaran.php");

?>