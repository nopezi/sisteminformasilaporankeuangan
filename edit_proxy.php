<?php 
include 'header.php';

@session_start();

    include "koneksi.php";

    if (@$_SESSION['admin'] || @$_SESSION['accounting']) {
?>



<div class="container">
<div class="panel panel-success" style="padding-top: 100px">

  <div class="panel-heading">
  	<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Barang</h3>
	<a class="btn" href="proxy.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>	
  </div>	


  <div class="panel-body">
    <?php
$id_proxy=mysqli_real_escape_string($koneksi, $_GET['id_proxy']);
$det=mysqli_query($koneksi, "select * from proxy where id_proxy='$id_proxy'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>					
	<form action="update_proxy.php" method="post">
		<table class="table table-hover">
			<tr>
				<td></td>
				<td><input type="hidden" name="id_proxy" value="<?php echo $d['id_proxy'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Proxy</td>
				<td><input type="text" class="form-control" name="nama_proxy" value="<?php echo $d['nama_proxy'] ?>"></td>
			</tr>

			<tr>
				<td>Cabang</td>
				<td>
					<select class="form-control" name="cabang">
								<?php 
								$cbng=mysqli_query($koneksi, "select * from cabang");
								while($b=mysqli_fetch_array($cbng)){
									?>	
									<option value="<?php echo $b['proxy']; ?>"><?php echo $b['proxy'] ?></option>
									<?php 
								}
								?>
					</select>
				</td>
			</tr>

			<tr>
				<td>Email Proxy</td>
				<td><input type="text" class="form-control" name="email_proxy" value="<?php echo $d['email_proxy'] ?>"></td>
			</tr>

			<tr>
				<td>Nomor Whatsapp</td>
				<td><input type="text" class="form-control" name="no_wa" value="<?php echo $d['no_wa'] ?>"></td>
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
  </div>

        <div class="panel-footer">
            &copy;Kahyangan Multimedia Finance <b><?php echo date('Y'); ?></b>
        </div>
        
        </div>
</div>



	<?php 
}
?>
<?php 
}else{
        header("location:index.php");
}
?>