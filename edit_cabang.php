<?php 
include 'header.php'; 



    @session_start();

    include "koneksi.php";

    if (@$_SESSION['admin'] || @$_SESSION['accounting']) {     

?>



<div class="container">
        <div class="panel panel-success" style="padding-top: 100px">


        <div class="panel-body">
            <h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Barang</h3>
<a class="btn" href="cabang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id=mysqli_real_escape_string($koneksi, $_GET['id']);
$det=mysqli_query($koneksi, "select * from cabang where id='$id'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>					
	<form action="update_cabang.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
			</tr>
			<tr>
				<td>Proxy</td>
				<td><input type="text" class="form-control" name="proxy" value="<?php echo $d['proxy'] ?>"></td>
			</tr>
			<tr>
				<td>Lokasi</td>
				<td><input type="text" class="form-control" name="lokasi" value="<?php echo $d['lokasi'] ?>"></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
        </div>

<?php require_once 'footer.php'; ?>
        
        </div>
   </div>

   

<?php 
}else{
        header("location:index.php");
}
?>