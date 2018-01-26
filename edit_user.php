<?php 

    @session_start();

    include "koneksi.php";

    if (@$_SESSION['admin']) { 
    	
    include 'header.php';     

?>



<div class="container">
        <div class="panel panel-success" style="padding-top: 100px">


        <div class="panel-body">
            <h3><span class="glyphicon glyphicon-briefcase"></span>  Edit User</h3>
<a class="btn" href="user.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id=mysqli_real_escape_string($koneksi, $_GET['id']);
$det=mysqli_query($koneksi, "select * from user where id='$id'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>					
	<form action="update_user.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" class="form-control" name="username" value="<?php echo $d['username'] ?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" class="form-control" name="pass" value="<?php echo $d['pass'] ?>"></td>
			</tr>
			<tr>
				<td>Level</td>
				<td>
					<select class="form-control" name="level">
						<option value="admin">admin</option>
						<option value="proxy">proxy</option>
					</select>
				</td>
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