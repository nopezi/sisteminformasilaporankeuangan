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
<a class="btn" href="pengeluaran.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id=mysqli_real_escape_string($koneksi, $_GET['id_masuk']);
$det=mysqli_query($koneksi, "select * from pemasukkan where id_masuk='$id'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>                  
    <form action="update_pemasukkan.php" method="post">
        <table class="table table-hover table-bordered">
            <tr>
                <td></td>
                <td><input type="hidden" name="id_masuk" value="<?php echo $d['id_masuk'] ?>"></td>
                <td><input type="hidden" name="id_proxy" value="<?php echo $d['id_proxy'] ?>"></td>
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
                <td>Nama Pelanggan</td>
                <td><input type="text" class="form-control" name="nama_pelanggan" value=" <?php echo $d['nama_pelanggan']; ?> "></td>
            </tr>

            <tr>
                <td>Paket</td>
                <td><input type="text" class="form-control" name="paket" value="<?php echo $d['paket'] ?>"></td>
            </tr>

            <tr>
                <td>Nomor Invoice</td>
                <td><input type="text" class="form-control" name="no_invoice" value="<?php echo $d['no_invoice'] ?>"></td>
            </tr>

            <tr>
                <td>Income</td>
                <td><input type="text" class="form-control" name="income" value="<?php echo $d['income'] ?>"></td>
            </tr>

            <tr>
                <td>Share Office</td>
                <td><input type="text" class="form-control" name="share_office" value="<?php echo $d['share_office'] ?>"></td>
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
        header("location:../index.php");
}
?>