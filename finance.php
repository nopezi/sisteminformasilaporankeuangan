<?php 


    @session_start();

    include "koneksi.php";

    if (@$_SESSION['admin']) {
        

 ?>

<?php include 'header.php'; ?>

<style type="text/css" media="screen">

/** 
Css validasi
**/
.error{color:red;}
label.error {margin-top:6px;}
input.error {border-color:red;}
</style>

<script>
    $("#form-registrasi").validate();
</script>

<div class="container-fluid">
<div class="panel panel-success" style="padding-top: 50px">


<div class="panel-body">
 <?php
 $id_proxy=mysqli_real_escape_string($koneksi, $_GET['id_proxy']); 
 $nama_proxy = mysqli_query($koneksi, "SELECT distinct nama_proxy from pemasukkan where id_proxy='$id_proxy'");
 while ($n=mysqli_fetch_array($nama_proxy)) {
     
 
  ?>
<h3><span class="glyphicon glyphicon-briefcase"></span>Data Pemasukkan <b><?php  echo $n['nama_proxy']; }?></b></h3>
<!-- <span><button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-pencil"></span>  Tambah Data</button></span> -->

<form action="" method="get">
    <div class="input-group col-md-5 col-md-offset-7">
        
        
    <table>

        <tr>
            <td><label>Pilih Keduanya</label></td>
        </tr>
        <tr>

          <td>
          	<input class="form-control" type="hidden" name="id_proxy" value="<?php echo $id_proxy; ?>">
            <select class="form-control" name="bulan" >

            <option>Bulan</option>
            <?php 
            $pil=mysqli_query($koneksi, "select distinct bulan from pemasukkan where id_proxy='$id_proxy'");
            while($p=mysqli_fetch_array($pil)){
                ?>
                <option><?php echo $p['bulan'] ?></option>
                <?php
            }
            ?>          
            </select>
        
            </td>
            <td width="20"> <b>-><b> </td>
            <td>
                    <select type="text" name="tahun" class="form-control">
            <option>Tahun</option>
            <?php 
            $pil=mysqli_query($koneksi, "select distinct tahun from pemasukkan where id_proxy='$id_proxy'");
            while($p=mysqli_fetch_array($pil)){
                ?>
                <option><?php echo $p['tahun'] ?></option>
                <?php
            }
            ?>          
        </select>
                </td>

                <td>
                <input type="submit" class="btn btn-primary" value="ok" onchange="this.form.submit()">
                </td>
            </tr>
        </table>
    </div>

</form>
<br/>
<!-- <?php 
if(isset($_GET['bulan']) AND isset( $_GET['tahun'])){
    $bulan=mysqli_real_escape_string($koneksi, $_GET['bulan']);
    $tahun=mysqli_real_escape_string($koneksi, $_GET['tahun']);
    $tg="lap_pengeluaran.php?bulan='$bulan'&tahun='$tahun'";
?>

<a style="margin-bottom:10px" href="<?php echo $tg ?>" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>

<?php
}else{
    $tg="lap_pengeluaran.php";
}
?> -->



<br/>
<?php 
if(isset($_GET['bulan']) AND isset( $_GET['tahun'])){ ?>
<a class='btn' href='finance.php?id_proxy=<?php echo $id_proxy ?>'><span class='glyphicon glyphicon-arrow-left'></span>  Kembali</a>
<?php   
    echo "<h4> Data Pengeluaran Proxy : <a style='color:blue'> ". $_GET['bulan']."-".$_GET['tahun']."</a></h4>";
}
?>

        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#example').DataTable();
            } );
        </script>

<table id="example" class="display" cellspacing="0">

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
    <tbody>
        <?php 
      	  
    	if(isset($id_proxy) AND isset($_GET['bulan']) AND isset( $_GET['tahun'])){
        $nama_proxy=mysqli_real_escape_string($koneksi, $id_proxy);
        $bulan=mysqli_real_escape_string($koneksi, $_GET['bulan']);
        $tahun=mysqli_real_escape_string($koneksi, $_GET['tahun']);
        $brg=mysqli_query($koneksi, "select * from pemasukkan where 
            id_proxy='$id_proxy' AND bulan='$bulan' AND tahun='$tahun' order by nama_proxy,bulan,tahun desc");
    }else{
        $brg=mysqli_query($koneksi, "select * from pemasukkan where id_proxy=$id_proxy");
    }
    $no=1;
    while($b=mysqli_fetch_array($brg)){ ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td>
                <?php echo $b['tanggal'] ?>-<?php echo $b['bulan'] ?>-<?php echo $b['tahun'] ?>
            </td>
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
                <a href="edit_pemasukkan.php?id_masuk=<?php echo $b['id_masuk']; ?>" class="btn btn-warning">Edit</a>
                <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_pemasukkan.php?id_masuk=<?php echo $b['id_masuk']; ?>' }" class="btn btn-danger">Hapus</a>
            </td>
        </tr>

        

        <?php 
    }
    ?>
    </tbody>

    
    <tr>
        <th colspan="5">Total</th>
        
        <?php 
        if(isset($id_proxy) AND isset($_GET['bulan']) AND isset($_GET['tahun'])){
        $nama_proxy=mysqli_real_escape_string($koneksi, $id_proxy);
        $bulan=mysqli_real_escape_string($koneksi, $_GET['bulan']);
        $tahun=mysqli_real_escape_string($koneksi, $_GET['tahun']);
            $x=mysqli_query($koneksi, "select sum(income) as total from pemasukkan where id_proxy='$nama_proxy' AND bulan='$bulan' AND tahun='$tahun'");  
            $xx=mysqli_fetch_array($x);         
            echo "<th><b> Rp.". number_format($xx['total']).",-</b></th>";
        }else{

        }

        ?>

        <?php 
        if(isset($id_proxy) AND isset($_GET['bulan']) AND isset($_GET['tahun'])){
        $nama_proxy=mysqli_real_escape_string($koneksi, $id_proxy);
        $bulan=mysqli_real_escape_string($koneksi, $_GET['bulan']);
        $tahun=mysqli_real_escape_string($koneksi, $_GET['tahun']);
            $x=mysqli_query($koneksi, "select sum(share_office) as total from pemasukkan where id_proxy='$nama_proxy' AND bulan='$bulan' AND tahun='$tahun'");  
            $xx=mysqli_fetch_array($x);         
            echo "<th><b> Rp.". number_format($xx['total']).",-</b></th>";
        }else{

        }

        ?>

        <?php 
        if(isset($id_proxy) AND isset($_GET['bulan']) AND isset($_GET['tahun'])){
        $nama_proxy=mysqli_real_escape_string($koneksi, $id_proxy);
        $bulan=mysqli_real_escape_string($koneksi, $_GET['bulan']);
        $tahun=mysqli_real_escape_string($koneksi, $_GET['tahun']);
            $x=mysqli_query($koneksi, "select sum(share_proxy) as total from pemasukkan where id_proxy='$nama_proxy' AND bulan='$bulan' AND tahun='$tahun'");  
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


        
</div>
</div>

<!-- DATA PENGELUARAN -->

<div class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3><span class="glyphicon glyphicon-briefcase"></span>Data Pengeluaran</h3>

        </div>

        <div class="panel-body">
           <!--  <span><button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal2" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-pencil"></span>  Tambah Data</button></span> -->

<script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#example2').DataTable();
            } );
        </script>
<table id="example2" class="display" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Detail Pengeluaran</th>
            <th>Jumlah Pengeluaran</th>         
            <th>Opsi</th>
        </tr>
    </thead>

    
    
    <tbody>
<?php 
        
    if(isset($id_proxy) AND isset($_GET['bulan']) AND isset( $_GET['tahun'])){
        $nama_proxy=mysqli_real_escape_string($koneksi, $id_proxy);
        $bulan=mysqli_real_escape_string($koneksi, $_GET['bulan']);
        $tahun=mysqli_real_escape_string($koneksi, $_GET['tahun']);
        $brg=mysqli_query($koneksi, "select * from keluar where 
            id_proxy='$nama_proxy' AND bulan='$bulan' AND tahun='$tahun' order by nama_proxy,bulan,tahun desc");
    }else{
        $brg=mysqli_query($koneksi, "select * from keluar where id_proxy=$id_proxy");
    }
    $no=1;
    while($b=mysqli_fetch_array($brg)){ ?>      
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $b['tanggal'] ?>-<?php echo $b['bulan'] ?>-<?php echo $b['tahun'] ?></td>
            <td><?php echo $b['detail'] ?></td>
            <td>Rp.<?php echo number_format($b['jumlah']) ?>,-</td>
                                    
            <td>        
                <a href="edit_pengeluaran.php?id_keluar=<?php echo $b['id_keluar']; ?>" class="btn btn-warning">Edit</a>
                <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_pengeluaran.php?id_keluar=<?php echo $b['id_keluar']; ?>' }" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>

    <tr>
        <th colspan="3">Total</th>
        
        <?php 
        if(isset($id_proxy) AND isset($_GET['bulan']) AND isset($_GET['tahun'])){
        $nama_proxy=mysqli_real_escape_string($koneksi, $id_proxy);
        $bulan=mysqli_real_escape_string($koneksi, $_GET['bulan']);
        $tahun=mysqli_real_escape_string($koneksi, $_GET['tahun']);
            $x=mysqli_query($koneksi, "select sum(jumlah) as total from keluar where id_proxy='$nama_proxy' AND bulan='$bulan' AND tahun='$tahun'");  
            $xx=mysqli_fetch_array($x);         
            echo "<th><b> Rp.". number_format($xx['total']).",-</b></th>";
        }else{

        }

        ?>
    </tr>
</table>
<script type="text/javascript">
    // For demo to fit into DataTables site builder...
    $('#example2')
        .removeClass( 'display' )
        .addClass('table table-striped table-bordered table-hover');
</script>
        </div>

        <?php require_once 'footer.php'; ?>

    </div>
</div>


<!-- DATA FINANCE -->

<div class="container">
    <div class="panel panel-success">
    <div class="panel-heading">
        <h3><span class="glyphicon glyphicon-briefcase"></span>Data Finance</h3>
    </div>

    <div class="panel-body">
    


    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Omset Bulanan</th>
                <th>Share Personal Proxy</th>
                <th>Share Office</th>
                <th>Shadaqah</th>
                <th>Share Office After Shadaqah</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    <?php 
        if(isset($id_proxy) AND isset($_GET['bulan']) AND isset($_GET['tahun'])){
        $nama_proxy=mysqli_real_escape_string($koneksi, $id_proxy);
        $bulan=mysqli_real_escape_string($koneksi, $_GET['bulan']);
        $tahun=mysqli_real_escape_string($koneksi, $_GET['tahun']);
            $x=mysqli_query($koneksi, "select sum(income) as total from pemasukkan where id_proxy='$nama_proxy' AND bulan='$bulan' AND tahun='$tahun'");  
            $xx=mysqli_fetch_array($x);         
            ?>
            Rp.<?php echo number_format($xx['total']); ?>,-
<?php  }else{ } ?>
                </td>
                <td>
                    <?php 
        if(isset($id_proxy) AND isset($_GET['bulan']) AND isset($_GET['tahun'])){
        $nama_proxy=mysqli_real_escape_string($koneksi, $id_proxy);
        $bulan=mysqli_real_escape_string($koneksi, $_GET['bulan']);
        $tahun=mysqli_real_escape_string($koneksi, $_GET['tahun']);
            $x=mysqli_query($koneksi, "select sum(share_proxy) as total from pemasukkan where id_proxy='$nama_proxy' AND bulan='$bulan' AND tahun='$tahun'");  
            $xx=mysqli_fetch_array($x);         
            ?>
            Rp.<?php echo number_format($xx['total']); ?>,-
<?php  }else{ } ?>
                </td>
                
        <?php 
        if(isset($id_proxy) AND isset($_GET['bulan']) AND isset($_GET['tahun'])){
        $nama_proxy=mysqli_real_escape_string($koneksi, $id_proxy);
        $bulan=mysqli_real_escape_string($koneksi, $_GET['bulan']);
        $tahun=mysqli_real_escape_string($koneksi, $_GET['tahun']);
            $x=mysqli_query($koneksi, "select sum(share_office) as total from pemasukkan where id_proxy='$nama_proxy' AND bulan='$bulan' AND tahun='$tahun'");
            $x2=mysqli_query($koneksi, "select sum(jumlah) as total from keluar where id_proxy='$nama_proxy' AND bulan='$bulan' AND tahun='$tahun'");  
            $xx2=mysqli_fetch_array($x);
            $share = $xx2['total'];
            $xx3=mysqli_fetch_array($x2);
            $share2 = $xx3['total'];
            $share_office = $share - $share2;
            $shadaqah = $share_office * 0.05;
            $after_shadaqah = $share_office - $shadaqah;         
            ?>
           <td>Rp.<?php echo number_format($share_office); ?>,-</td>
           <td>Rp.<?php echo number_format($shadaqah); ?>,-</td>
           <td>Rp.<?php echo number_format($after_shadaqah); ?>,-</td>

<?php  } ?>
                <td></td>
            </tr>
        </tbody>
    </table>

    </div>

    </div>
</div>


<!-- MODAL PEMASUKKAN -->

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
                            <input name="id_proxy" type="hidden" class="form-control" id="id_proxy" autocomplete="off" value="<?php echo $_SESSION['user']; ?>">
                        </div> 
                                                          
                        <div class="form-group">
                            <table>
                                <thead>
                                    <tr>
                                        <th><label>Tanggal</label></th>
                                        <th><label>Bulan</label></th>
                                        <th>Tahun</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                            <div class="input-group date " data-date="" data-date-format="dd">
                            <input class="form-control" type="text" name="tanggal" placeholder="masukkan tanggal" readonly="readonly" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div></td>
                            <td>
                            <select class="form-control" name="bulan" required>
                                <option value="januari">januari</option>
                                <option value="februari">februari</option>
                                <option value="maret">maret</option>
                                <option value="april">april</option>
                                <option value="mei">mei</option>
                                <option value="juni">juni</option>
                                <option value="juli">juli</option>
                                <option value="agustus">agustus</option>
                                <option value="september">september</option>
                                <option value="oktober">oktober</option>
                                <option value="november">november</option>
                                <option value="desember">desember</option>
                            </select></td>

                            <td>
                                <input name="tahun" type="text" class="form-control" placeholder="tahun" id="tahun" autocomplete="off" required>
                            </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                                                                           
                        
                            
                        </div>



                        <div class="form-group">
                           
                    <?php $brg=mysqli_query($koneksi, "select * from proxy where id_proxy=$id_proxy");
                        while($b=mysqli_fetch_array($brg)){ ?>
                <input name="nama_proxy" type="hidden" class="form-control" id="nama_proxy" autocomplete="off" value="<?php echo $b['nama_proxy'] ?>">
                        </div> 
                              <?php } ?>
                        <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <input name="nama_pelanggan" type="text" class="form-control" placeholder="nama pelanggan" id="nama_pelanggan" autocomplete="off" required>
                        </div> 

                        <div class="form-group">
                            <label>Paket</label>
                            <input name="paket" type="text" class="form-control" placeholder="paket" autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label>Nomor Invoice</label>
                            <input name="no_invoice" type="text" class="form-control" placeholder="no_invoice" autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label>Income</label>
                            <input name="income" type="text" class="form-control" placeholder="income" autocomplete="off" id="txt1" onkeyup="sum();" required>
                        </div>

                        <div class="form-group">
                            <label>Share Office</label>
                            <input name="share_office" type="text" class="form-control" placeholder="share_office" autocomplete="off" id="txt2" onkeyup="sum();" required>
                        </div>

                        <div class="form-group">
                            <label>Share Proxy</label>
                            <input name="share_proxy" type="text" class="form-control" placeholder="share_proxy" autocomplete="off" id="txt3" required>
                        </div>
                        <script>
function sum() {
      var txtFirstNumberValue = document.getElementById('txt1').value;
      var txtSecondNumberValue = document.getElementById('txt2').value;
      var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('txt3').value = result;
      }
}
</script>                                                                  
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

<!-- MODAL PENGELUARAN -->

<div id="myModal2" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Data Pengeluaran
                </div>
                <div class="modal-body">                
                    <form action="pengeluaran_act.php" method="post">
                        <div class="form-group">
                            <input name="id_proxy" type="hidden" class="form-control" id="id_proxy" autocomplete="off" value="<?php echo $_SESSION['user']; ?>">
                        </div>
                         
                                                          
                        <div class="form-group">
                            <table>
                                <thead>
                                    <tr>
                                        <th><label>Tanggal</label></th>
                                        <th><label>Bulan</label></th>
                                        <th>Tahun</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                            <div class="input-group date " data-date="" data-date-format="dd">
                            <input class="form-control" type="text" name="tanggal" placeholder="masukkan tanggal" readonly="readonly" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div></td>
                            <td>
                            <select class="form-control" name="bulan" required>
                                <option value="januari">januari</option>
                                <option value="februari">februari</option>
                                <option value="maret">maret</option>
                                <option value="april">april</option>
                                <option value="mei">mei</option>
                                <option value="juni">juni</option>
                                <option value="juli">juli</option>
                                <option value="agustus">agustus</option>
                                <option value="september">september</option>
                                <option value="oktober">oktober</option>
                                <option value="november">november</option>
                                <option value="desember">desember</option>
                            </select></td>

                            <td>
                                <input name="tahun" type="text" class="form-control" placeholder="tahun" id="tahun" autocomplete="off" required>
                            </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                                                                           
                        
                            
                        </div>


<?php $brg=mysqli_query($koneksi, "select * from proxy where id_proxy=$id_proxy");
    while($b=mysqli_fetch_array($brg)){ ?>

 
                        <div class="form-group">
                            
                            <input name="nama_proxy" type="hidden" class="form-control" placeholder="nama proxy" autocomplete="off" value="<?php echo $b['nama_proxy'] ?>">
                        </div>
<?php } ?>
                        <div class="form-group">
                            <label>Detail Pengeluaran</label>
                            <input name="detail" type="text" class="form-control" placeholder="detail" autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label>Jumlah</label>
                            <input name="jumlah" type="text" class="form-control" placeholder="jumlah" autocomplete="off" required>
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

</body>
</html>

<?php 
}else{
        header("location:index.php");
}
?>
