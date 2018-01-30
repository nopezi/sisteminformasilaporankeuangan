<?php 
include '../koneksi.php';
$id_keluar=$_POST['id_keluar'];
$id_proxy=$_POST['id_proxy'];
$tanggal=$_POST['tanggal'];
$bulan=$_POST['bulan'];
$tahun=$_POST['tahun'];
$nama_proxy=$_POST['nama_proxy'];
$detail=$_POST['detail'];
$jumlah=$_POST['jumlah'];


if($tanggal == "" || $bulan == ""){
	echo '<script language="javascript">alert("Isi Semua Data"); document.location="pemasukkan.php";</script>';
}else{
mysqli_query($koneksi, "update keluar set
			id_proxy='$id_proxy', 
			tanggal='$tanggal',
			tahun='$tahun', 
			nama_proxy='$nama_proxy', 
			detail='$detail', 
			jumlah='$jumlah'
			where id_keluar='$id_keluar'");
header("location:finance.php?id_proxy=$id_proxy");
}
?>