<?php 
    @session_start();

    include "koneksi.php";

    if (@$_SESSION['admin']) {

    include 'header.php';   

?>




<!-- end Menu Navbar -->



<body>

<div class="container">
<div class="panel panel-success" style="padding-top: 100px">

<div class="panel-body">
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Pengeluaran</h3>
<a class="btn" href="pengeluaran.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_keluar=mysqli_real_escape_string($koneksi, $_GET['id_keluar']);
$det=mysqli_query($koneksi, "select * from keluar where id_keluar='$id_keluar'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>                  
    <form action="update_pengeluaran.php" method="post">
        <table class="table table-hover ">
            <tr>
                <td></td>
                <td><input type="hidden" name="id_keluar" value="<?php echo $d['id_keluar'] ?>"></td>
                <td><input type="hidden" name="id_proxy" value="<?php echo $d['id_proxy'] ?>"></td>
            </tr>
            
            <tr>
                <td>Tanggal</td>
                <td><input id="tanggal" type="text" class="form-control" name="tanggal" value="<?php echo $d['tanggal'] ?>"></td>
            </tr>

            <tr>
                <td>Nama Proxy</td>
                <td><input id="nama_proxy" type="text" class="form-control" name="nama_proxy" value="<?php echo $d['nama_proxy'] ?>"></td>
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




		
</div>

<?php require_once 'footer.php'; ?>	
</div>
</div>


</body>


<script src="jquery/jquery-1.8.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
            $(document).ready(function () {
                $('#tanggal').datepicker({
                 //merubah format tanggal datepicker ke dd-mm-yyyy
                    format: "yyyy/mm/dd",
                    //aktifkan kode dibawah untuk melihat perbedaanya, disable baris perintah diatasa
                    //format: "dd-mm-yyyy",
                    autoclose: true
                });
            });
</script>

</html>

<?php 
}else{
        header("location:index.php");
}
?>