<?php 


@session_start();

    include "../koneksi.php";

    if (@$_SESSION['user']) { 
?>


<?php require_once 'header.php'; ?>


<div class="container-fluid">
    <div class="">
    <div class="panel panel-primary" style="padding-top: 100px">
    <div class="panel-heading">
     <h3><span class="glyphicon glyphicon-briefcase"></span>Data Pemasukkan</h3>
    </div>  
    
    
    <div class="panel-body">
<?php
$id_proxy = $_SESSION['user'];

if (isset($id_proxy)) {

$id_brg=mysqli_real_escape_string($koneksi, $id_proxy);
$sql = "select * from pemasukkan where id_proxy='$id_brg'";
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
    <?php  

            while($d=mysqli_fetch_assoc($det)) { ?>
    <tbody>

        <tr>

            <td><?php echo $no++ ?></td>
            <td><?php echo $d['tanggal'] ?></td>
            <td><?php echo $d['nama_pelanggan'] ?></td>
            <td><?php echo $d['paket'] ?></td>
            <td><?php echo $d['no_invoice'] ?></td>
            <td>Rp.<?php echo number_format($d['income']) ?>,-</td>
            <td>Rp.<?php echo number_format($d['share_office']) ?>,-</td>
            <td>
              <?php $share_proxy =  $d['income'] - $d['share_office']; ?>  
                Rp.<?php echo number_format($share_proxy); ?>,-
            </td>
                                    
            <td>        
                <a href="edit_pemasukkan.php?id_masuk=<?php echo $d['id_masuk']; ?>" class="btn btn-warning">Edit</a>
                <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_pemasukkan.php?id=<?php echo $d['id_masuk']; ?>' }" class="btn btn-danger">Hapus</a>
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
                    <form action="pemasukkan_act.php" method="post">
                        <div class="form-group">
                            <input name="id_proxy" type="text" class="form-control" id="id_proxy" autocomplete="off" value="<?php echo $_SESSION['user']; ?>">
                        </div> 
                                                          
                        <div class="form-group">
                            <label>Tanggal</label>
                            <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                            <input class="form-control" type="text" name="tanggal" readonly="readonly">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <input name="nama_pelanggan" type="text" class="form-control" id="nama_pelanggan" autocomplete="off">
                        </div> 

                        <div class="form-group">
                            <label>Paket</label>
                            <input name="paket" type="text" class="form-control" placeholder="paket" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Nomor Invoice</label>
                            <input name="no_invoice" type="text" class="form-control" placeholder="no_invoice" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Income</label>
                            <input name="income" type="text" class="form-control" placeholder="income" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Share Office</label>
                            <input name="share_office" type="text" class="form-control" placeholder="share_office" autocomplete="off">
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
        header("location:../index.php");
}
?>