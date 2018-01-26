<?php 

include 'header.php';
@session_start();

    include "../koneksi.php";

    if (@$_SESSION['user']) { 
?>


<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
          </button>
       </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                 <li><a href="index.php">home</a></li>
                    
                    
                    <li><a href="pengeluaran.php" title="">Pengeluaran</a></li>
                    <li><a href="proxy.php" >Proxy</a></li>
                    <li><a href="finance.php" >Laporan Finance</a></li>

                    <li class=""><a href="../logout.php" class="dropdown-toggle">Keluar </a></li>
                </ul>
            </div>
    </div>
</div>


<div class="container">
	<div class="">
	<div class="panel panel-primary" style="padding-top: 100px">
	<div class="panel-heading">
	 <h3><span class="glyphicon glyphicon-briefcase"></span>Data Pengeluaran</h3>
	</div>	
	
	
	<div class="panel-body">
<?php
$id_proxy = $_SESSION['user'];
$id_brg=mysqli_real_escape_string($koneksi, $id_proxy);
$sql = "select * from keluar where id_keluar='$id_brg'";
$det=mysqli_query($koneksi, $sql)or die(mysqli_error());
$d = mysqli_fetch_assoc($det);
if ($d['id_keluar']==$id_proxy) {
	// die(print_r($d));
	?>
<table class="table">
        <tr>
            <td><b>Nama Proxy</b></td>
            <td><?php echo $d['tanggal'] ?></td>
        </tr>
        <tr>
            <td><b>Cabang Proxy</b></td>
            <td><?php echo $d['nama_proxy'] ?></td>
        </tr>
        <tr>
            <td><b>Email Proxy</b></td>
            <td><?php echo $d['detail'] ?></td>
        </tr>
        <tr>
            <td><b>Nomor Whatsapp</b></td>
            <td><?php echo $d['jumlah'] ?></td>
        </tr>
        
        <tr>
            <td></td>
            <td>
                <a href="edit_pengeluaran.php?id_proxy=<?php echo $d['id_proxy']; ?>" class="btn btn-warning">Edit</a>
            </td>
        </tr>
    </table>


<?php }else { ?>

<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-pencil"></span>  Tambah Data</button>
<br>
<br>
<center><b>Belum Ada Data</b></center>

<?php } ?>












	</div>
	
	<div class="panel-footer">
            &copy;Kahyangan Multimedia Finance <b><?php echo date('Y'); ?></b>
    </div>
	</div>
	</div>
</div>

<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Data Proxy
                </div>
                <div class="modal-body">                
                    <form action="proxy_act.php" method="post">
                        <div class="form-group">
                            <input name="id_proxy" type="hidden" class="form-control" id="id_proxy" autocomplete="off" value="<?php echo $_SESSION['user']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama proxy</label>
                            <input name="nama_proxy" type="text" class="form-control" id="nama_proxy" autocomplete="off">
                        </div>  
                        <div class="form-group">
                            <label>Cabang</label>                               
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

                        </div>                                  
                        <div class="form-group">
                            <label>Email Proxy</label>
                            <input name="email_proxy" type="text" class="form-control" placeholder="email_proxy" autocomplete="off">
                        </div>  
                        <div class="form-group">
                            <label>Nomor Whatsapp</label>
                            <input name="no_wa" type="text" class="form-control" placeholder="no_wa" autocomplete="off">
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
<?php 
}else{
        header("location:index.php");
}
?>