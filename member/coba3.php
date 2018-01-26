<?php 
$nama = $_POST['nama'];
 
if($nama == ""){
	echo '<script language="javascript">alert("data kosong"); document.location="coba2.php";</script>';
}else{
	echo "Nama anda adalah". $nama;
}
?>