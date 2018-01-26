<?php 
include 'header.php'; 



    @session_start();

    include "koneksi.php";

    if (@$_SESSION['admin'] || @$_SESSION['accounting']) {     

?>

<div class="container-fluid">
	<div class="panel panel-success" style="padding-top: 100px">
		<div class="panel-body">
<h3><span class="glyphicon glyphicon-briefcase"></span>Data Cabang</h3>

<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-pencil"></span>  Tambah Data</button>

<br/>


<br/>

<table id="example" class="display" cellspacing="0">
	<tr>
		<th>No</th>
		<th>Proxy</th>
		<th>Lokasi</th>						
		<th>Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cabang'])){
		$id=mysqli_real_escape_string($konek, $_GET['id']);
		$brg=mysqli_query($koneksi, "select * from cabang where id like '$id' order by id desc");
	}else{
		$brg=mysqli_query($koneksi, "select * from cabang order by id desc");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['proxy'] ?></td>
			<td><?php echo $b['lokasi'] ?></td>		
						
			<td>		
				<a href="edit_cabang.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_cabang.php?id=<?php echo $b['id']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>

		<?php 
	}
	?>
	
</table>

<script type="text/javascript">
	// For demo to fit into DataTables site builder...
	$('#example')
		.removeClass( 'display' )
		.addClass('table table-striped table-bordered table-hover');
</script>

<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Cabang
				</div>
				<div class="modal-body">				
					<form action="cabang_act.php" method="post">
															
						<div class="form-group">
							<label>Proxy/Cabang</label>
							<input name="proxy" type="text" class="form-control" placeholder="proxy" autocomplete="off">
						</div>	
						<div class="form-group">
							<label>Lokasi</label>
							<input name="lokasi" type="text" class="form-control" placeholder="lokasi" autocomplete="off">
						</div>																	

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<input type="reset" class="btn btn-danger" value="Reset">												
						<input type="submit" class="btn btn-primary" value="Simpan">
					</div>
				</form>
			</div>
		</div>
	</div>
		</div>
	</div>
</div>

<?php require_once 'footer.php'; ?>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#tgl").datepicker({dateFormat : 'yy/mm/dd'});							
		});
	</script>
<?php 
}else{
        header("location:index.php");
}
?>