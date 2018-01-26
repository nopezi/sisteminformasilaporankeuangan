<?php 


@session_start();

    include "../koneksi.php";

    if (@$_SESSION['user']) { 
?>


<?php require_once 'header.php'; ?>


<div class="container">
	<div class="">
	<div class="panel panel-primary" style="padding-top: 100px">
	<div class="panel-heading">
	 <h3><span class="glyphicon glyphicon-briefcase"></span>Data Pengeluaran</h3>
	</div>	
	
	
	<div class="panel-body">
<?php
$id_proxy = $_SESSION['user'];

if (isset($id_proxy)) {

$id_brg=mysqli_real_escape_string($koneksi, $id_proxy);
$sql = "select * from keluar where id_keluar='$id_brg'";
$det=mysqli_query($koneksi, $sql)or die(mysqli_error());

$no =1;
if (isset($id_proxy)) {

    // die(print_r($d));
   
    
    ?>

<table class="table table-bordered table-hover table-responsive">
    <span><button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-pencil"></span>  Tambah Data</button></span>
    <thead>
        <tr>
            <th>No</th>
            <th>Id Keluar</th>
            <th>Nama Proxy</th>
            <th>Tanggal</th>
            <th>Detail Pengeluaran</th>
            <th>Jumlah Pengeluaran</th>         
            <th>Opsi</th>
        </tr>
    </thead>
    <?php  

            while($d=mysqli_fetch_assoc($det)) { ?>
    <tbody>

        <tr>

            <td><?php echo $no++ ?></td>
            <td><?php echo $d['id_keluar']; ?> </td>
            <td><?php echo $d['nama_proxy'] ?></td>
            <td><?php echo $d['tanggal'] ?></td>
            <td><?php echo $d['detail'] ?></td>
            <td>Rp.<?php echo number_format($d['jumlah']) ?>,-</td>
                                    
            <td>        
                <a href="edit_pengeluaran.php?id=<?php echo $d['id']; ?>" class="btn btn-warning">Edit</a>
                <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_pengeluaran.php?id=<?php echo $d['id']; ?>' }" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>


<?php  }else { ?>

<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-pencil"></span>  Tambah Data</button>
<br>
<br>
<center><b>Belum Ada Data</b></center>

<?php } 





}

?>










	</div>
	
<?php require_once 'footer.php'; ?>

	</div>
	</div>
</div>

<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Data Pengeluaran
                </div>
                <div class="modal-body">                
                    <form action="pengeluaran_act.php" method="post">
                        <div class="form-group">
                            <input name="id_keluar" type="text" class="form-control" id="id_keluar" autocomplete="off" value="<?php echo $_SESSION['user']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama proxy</label>
                            <input name="nama_proxy" type="text" class="form-control" id="nama_proxy" autocomplete="off">
                        </div>  
                                                          
                        <div class="form-group">
                            <label>Tanggal</label>
                            <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                            <input class="form-control" type="text" name="tanggal" readonly="readonly">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                            
                        </div>  
                        <div class="form-group">
                            <label>Detail Pengeluaran</label>
                            <input name="detail" type="text" class="form-control" placeholder="detail" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Jumlah</label>
                            <input name="jumlah" type="text" class="form-control" placeholder="jumlah" autocomplete="off">
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


       
                
        

    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
    <script>
    $(".input-group.date").datepicker({autoclose: true, todayHighlight: true});
    </script>   
</div>
<?php 
}else{
        header("location:index.php");
}
?>