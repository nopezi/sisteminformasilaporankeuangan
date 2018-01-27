<?php 
include '../koneksi.php';
$id_masuk=$_GET['id_masuk'];
mysqli_query($koneksi, "delete from pemasukkan where id_masuk='$id_masuk'");
header("location:pemasukkan.php");

?>