<?php 


@session_start();

    include "koneksi.php";

    if (@$_SESSION['admin']) { 
?>
<?php require_once 'header.php'; ?>
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
<div class="container">
    <div class="panel panel-primary" style="padding-top: 100px">
        <div class="panel-body">
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Pengeluaran</h3>


<?php
$id_keluar=mysqli_real_escape_string($koneksi, $_GET['id_keluar']);
$det=mysqli_query($koneksi, "select * from keluar where id_keluar='$id_keluar'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>                  
<a class="btn" href="finance.php?id_proxy=<?php echo $d['id_proxy'] ?>"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>  
    <form action="update_pengeluaran.php" method="post">
        <table class="table table-hover table-bordered">
            <tr>
                <td></td>
                <td><input type="hidden" name="id_keluar" value="<?php echo $d['id_keluar'] ?>"></td>
                <td><input type="hidden" name="id_proxy" value="<?php echo $d['id_proxy'] ?>"></td>
            </tr>
            
            <tr>
                <td>Tanggal</td>
                <td><table>
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
                            <input class="form-control" type="text" name="tanggal" placeholder="masukkan tanggal" readonly="readonly" value="<?php echo $d['tanggal'] ?>" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                            </td>

                            <td>
                            <select class="form-control" name="bulan" required>
                                <option><?php echo $d['bulan'] ?></option>
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
                            </select>
                            </td>

                            <td>
                                <input name="tahun" type="text" class="form-control" placeholder="tahun" id="tahun" autocomplete="off" value="<?php echo $d['tahun'] ?>" required>
                            </td>
            </tr>
                    </tbody>
                </table>
            </tr>
            <tr>
                
                <td><input type="hidden" class="form-control" name="nama_proxy" value="<?php echo $d['nama_proxy']; ?>"></td>
            </tr>

            <tr>
                <td>Detail Pengeluaran</td>
                <td><input type="text" class="form-control" name="detail" value="<?php echo $d['detail'] ?>" required></td>
            </tr>

            <tr>
                <td>Jumlah</td>
                <td><input type="text" class="form-control" name="jumlah" value="<?php echo $d['jumlah'] ?>" required></td>
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