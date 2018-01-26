<?php 
include '../koneksi.php';
$id=$_GET['id'];
mysqli_query($koneksi, "delete from keluar where id='$id'");
header("location:pengeluaran.php");

?>