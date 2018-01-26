<?php 

    @session_start();

    include "koneksi.php";

    if (@$_SESSION['admin']) { 

    include 'header.php';    

?>

<div class="container-fluid">
<div class="panel panel-success" style="padding-top: 100px">
<div class="panel-body">

<h3><span class="glyphicon glyphicon-briefcase"></span>Data Login</h3>

<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-pencil"></span>  Tambah Data</button>

<br/>


<br/>

<table id="example" class="display" cellspacing="0">
	<tr>
		<th>No</th>
		<th>Id</th>
		<th>username</th>						
		<th>Password</th>
		<th>Level</th>
		<th>Opsi</th>
	</tr>
	<?php 
	$brg=mysqli_query($koneksi, "select * from user");
	$no=1;
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['id']; ?> </td>
			<td><?php echo $b['username'] ?></td>
			<td><?php echo $b['pass'] ?></td>
			<td><?php echo $b['level']; ?></td>		
						
			<td>		
				<a href="edit_user.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_user.php?id=<?php echo $b['id']; ?>' }" class="btn btn-danger">Hapus</a>
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

<?php
class Random{
  public static function Numeric($length)
      {
          $chars = "1234567890";
          $clen   = strlen( $chars )-1;
          $id  = '';

          for ($i = 0; $i < $length; $i++) {
                  $id .= $chars[mt_rand(0,$clen)];
          }
          return ($id);
      }

  
}

  // echo Random::Numeric(6); # eg result: "567268"

?>
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Login</h4>
			</div>
			<div class="modal-body">				
					<form action="user_act.php" method="post">

						<div class="form-group">
							<input type="hidden" name="id" class="form-control" value="<?= Random::Numeric(2); ?>">
						</div>
															
						<div class="form-group">
							<label>Username</label>
							<input name="username" type="text" class="form-control" placeholder="username" autocomplete="off">
						</div>	
						<div class="form-group">
							<label>Password</label>
							<input name="pass" type="password" class="form-control" placeholder="password" autocomplete="off">
						</div>

						<div class="form-group">
							<label>Level Login</label>
							<select class="form-control" name="level">
								<option value="admin">admin</option>
								<option value="proxy">proxy</option>
							</select>												
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
<?php require_once 'footer.php'; ?>	
		</div>
	</div>
</div>

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