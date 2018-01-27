<?php 

include 'header.php';
    @session_start();

    include "koneksi.php";

    if (@$_SESSION['admin']) {     
 ?>

<div class="container-fluid">
<div class="panel panel-success" style="padding-top: 100px">


<div class="panel-body">
 
<h3><span class="glyphicon glyphicon-briefcase"></span>Data Pemasukkan</h3>

<form action="" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
		<select type="submit" name="nama_proxy" class="form-control" onchange="this.form.submit()">
			<option>Pilih Nama ..</option>
			<?php 
			$pil=mysqli_query($koneksi, "select distinct nama_proxy from pemasukkan order by nama_proxy desc");
			while($p=mysqli_fetch_array($pil)){
				?>
				<option><?php echo $p['nama_proxy'] ?></option>
				<?php
			}
			?>			
		</select>
	</div>

</form>
<br/>
<?php 
if(isset($_GET['nama_proxy'])){
	$nama_proxy=mysqli_real_escape_string($koneksi, $_GET['nama_proxy']);
	$tg="lap_pengeluaran.php?nama_proxy='$nama_proxy'";
	?><a style="margin-bottom:10px" href="<?php echo $tg ?>" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a><?php
}else{
	$tg="lap_pengeluaran.php";
}
?>

<br/>
<?php 
if(isset($_GET['nama_proxy'])){
	echo "<a class='btn' href='pengeluaran.php'><span class='glyphicon glyphicon-arrow-left'></span>  Kembali</a>";
	echo "<h4> Data Pengeluaran Proxy : <a style='color:blue'> ". $_GET['nama_proxy']."</a></h4>";
}
?>
<script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').DataTable();
			} );
		</script>
		
<table id="example" class="display" cellspacing="0">
	<thead>
		<tr>
            <th>No</th>
            <th>Nama proxy</th>
            <th>Tanggal</th>
            <th>Nama Pelanggan</th>
            <th>Paket</th>
            <th>Nomor Invoice</th>
            <th>Income</th>
            <th>Share Office</th>
            <th>Share Proxy</th>         
            <th>Opsi</th>
	</tr>
	</thead>
	<tbody>
		<?php 
	if(isset($_GET['nama_proxy'])){
		$nama_proxy=mysqli_real_escape_string($koneksi, $_GET['nama_proxy']);
		$brg=mysqli_query($koneksi, "select * from pemasukkan where nama_proxy like '$nama_proxy' order by nama_proxy desc");
	}else{
		$brg=mysqli_query($koneksi, "select * from pemasukkan order by nama_proxy desc");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['nama_proxy'] ?></td>
			<td><?php echo $b['tanggal'] ?></td>
			<td><?php echo $b['nama_pelanggan'] ?></td>
            <td><?php echo $b['paket'] ?></td>
            <td><?php echo $b['no_invoice'] ?></td>
            <td>Rp.<?php echo number_format($b['income']) ?>,-</td>
            <td>Rp.<?php echo number_format($b['share_office']) ?>,-</td>
            <td>
              <?php $share_proxy =  $b['income'] - $b['share_office']; ?>  
                Rp.<?php echo number_format($share_proxy); ?>,-
            </td>
                                    
            <td>        
                <a href="edit_pemasukkan.php?id_masuk=<?php echo $d['id_masuk']; ?>" class="btn btn-warning">Edit</a>
                <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_pemasukkan.php?id=<?php echo $d['id_masuk']; ?>' }" class="btn btn-danger">Hapus</a>
            </td>
		</tr>

		

		<?php 
	}
	?>
	</tbody>

	
	<tr>
		<th colspan="6">Total</th>
		
		<?php 
		if(isset($_GET['nama_proxy'])){
			$nama_proxy=mysqli_real_escape_string($koneksi, $_GET['nama_proxy']);
			$x=mysqli_query($koneksi, "select sum(income) as total from pemasukkan where nama_proxy='$nama_proxy'");	
			$xx=mysqli_fetch_array($x);			
			echo "<th><b> Rp.". number_format($xx['total']).",-</b></th>";
		}else{

		}

		?>

		<?php 
		if(isset($_GET['nama_proxy'])){
			$nama_proxy=mysqli_real_escape_string($koneksi, $_GET['nama_proxy']);
			$x=mysqli_query($koneksi, "select sum(share_office) as total from pemasukkan where nama_proxy='$nama_proxy'");	
			$xx=mysqli_fetch_array($x);			
			echo "<th><b> Rp.". number_format($xx['total']).",-</b></th>";
		}else{

		}

		?>

		<?php 
		if(isset($_GET['nama_proxy'])){
			$nama_proxy=mysqli_real_escape_string($koneksi, $_GET['nama_proxy']);
			$x=mysqli_query($koneksi, "select sum($share_proxy) as total from pemasukkan where nama_proxy='$nama_proxy'");	
			$xx=mysqli_fetch_array($x);			
			echo "<th><b> Rp.". number_format($xx['total']).",-</b></th>";
		}else{

		}

		?>
	</tr>
	
</table>

<script type="text/javascript">
	// For demo to fit into DataTables site builder...
	$('#example')
		.removeClass( 'display' )
		.addClass('table table-striped table-bordered table-hover');
</script>


</div>

<?php require_once 'footer.php'; ?>
        
</div>
</div>

<script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>

</body>
</html>

<?php 
}else{
        header("location:index.php");
}
?>
