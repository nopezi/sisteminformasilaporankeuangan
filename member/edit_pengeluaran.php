<?php 


@session_start();

    include "../koneksi.php";

    if (@$_SESSION['user']) { 
?>
<?php require_once 'header.php'; ?>

<div class="container">
	<div class="panel panel-primary" style="padding-top: 100px">
		<div class="panel-body">
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Pengeluaran</h3>
<a class="btn" href="proxy.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_keluar=mysqli_real_escape_string($koneksi, $_GET['id_keluar']);
$det=mysqli_query($koneksi, "select * from keluar where id_keluar='$id_keluar'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>                  
    <form action="update_pengeluaran.php" method="post">
        <table class="table table-hover table-bordered">
            <tr>
                <td></td>
                <td><input type="hidden" name="id_keluar" value="<?php echo $d['id_keluar'] ?>"></td>
            </tr>
            
            <tr>
                <td>Tanggal</td>
                <td>
                	<!-- <input id="tanggal" type="text" class="form-control" name="tanggal" value="<?php echo $d['tanggal'] ?>"> -->
                	<div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                       <input class="form-control" type="text" name="tanggal" readonly="readonly" id="tanggal" class="form-control" value="<?php echo $d['tanggal'] ?>">
                       <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                </td>
            </tr>

            <tr>
                <td>Nama Proxy</td>
                <td><input type="text" class="form-control" name="nama_proxy" value=" <?php echo $d['nama_proxy']; ?> "></td>
            </tr>

            <tr>
                <td>Detail Pengeluaran</td>
                <td><input type="text" class="form-control" name="detail" value="<?php echo $d['detail'] ?>"></td>
            </tr>

            <tr>
                <td>Jumlah</td>
                <td><input type="text" class="form-control" name="jumlah" value="<?php echo $d['jumlah'] ?>"></td>
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


<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>
<script> $(".input-group.date").datepicker({autoclose: true, todayHighlight: true}); </script>   

		
</div>

<?php require_once 'footer.php'; ?>
	
</div>
	</div>
</div>


<?php 
}else{
        header("location:index.php");
}
?>