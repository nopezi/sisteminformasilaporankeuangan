<?php 
include 'koneksi.php';
$id = $_POST['id'];
$username = $_POST['username'];
$pass = $_POST['pass'];
$level = $_POST['level'];
// $no_wa = $_POST['no_wa'];
// $lokasi = $_POST['lokasi'];

mysqli_query($koneksi, "insert into user values('$id', '$username', '$pass', '$level')");
header("location:user.php");

 ?>