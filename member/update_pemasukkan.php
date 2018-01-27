<?php 
include '../koneksi.php';
$id_masuk=$_POST['id_masuk'];
$id_proxy=$_POST['id_proxy'];
$nama_proxy = $_POST['nama_proxy'];
$tanggal=$_POST['tanggal'];
$nama_pelanggan=$_POST['nama_pelanggan'];
$paket=$_POST['paket'];
$no_invoice=$_POST['no_invoice'];
$income=$_POST['income'];
$share_office=$_POST['share_office'];



if($id_masuk == "" || $nama_pelanggan == "" || $no_invoice == ""){
	echo '<script language="javascript">alert("Isi Semua Data"); document.location="edit_pemasukkan.php?id_masuk='.$id_masuk.'";</script>';
}else{
	mysqli_query($koneksi, "update pemasukkan set
			id_proxy='$id_proxy',
			nama_proxy='$nama_proxy', 
			tanggal='$tanggal', 
			nama_pelanggan='$nama_pelanggan', 
			paket='$paket', 
			no_invoice='$no_invoice',
			income='$income',
			share_office='$share_office'
			where id_masuk='$id_masuk'");
header("location:pemasukkan.php");
}

?>