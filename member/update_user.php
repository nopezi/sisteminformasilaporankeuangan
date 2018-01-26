<?php 
include '../koneksi.php';
$id=$_POST['id'];
$username=$_POST['username'];
$pass=$_POST['pass'];
$level = $_POST['level'];

mysqli_query($koneksi, "update user set username='$username', pass='$pass', level='$level' where id='$id'");
header("location:user.php");

?>