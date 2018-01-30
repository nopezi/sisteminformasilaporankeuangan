<?php 
include 'koneksi.php';
// $id_proxy=$_GET['id_proxy'];

$id_keluar=$_GET['id_keluar'];

mysqli_query($koneksi, "delete from keluar where id_keluar='$id_keluar'");

header("location:home.php");



?>