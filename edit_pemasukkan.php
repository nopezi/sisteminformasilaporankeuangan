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
$id=mysqli_real_escape_string($koneksi, $_GET['id_masuk']);
$det=mysqli_query($koneksi, "select * from pemasukkan where id_masuk='$id'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?> 

<a class="btn" href="finance.php?id_proxy=<?php echo $d['id_proxy'] ?>"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>                 
    <form id="form-registrasi" action="update_pemasukkan.php" method="post" class="panel panel-primary form-horizontal">
        <table class="table table-hover table-bordered">
            <tr>
                <td></td>
                <td><input type="hidden" name="id_masuk" value="<?php echo $d['id_masuk'] ?>"></td>
                <td><input type="hidden" name="id_proxy" value="<?php echo $d['id_proxy'] ?>">
                    <input type="hidden" class="form-control" name="nama_proxy" value="<?php echo $d['nama_proxy'] ?>" required></td>

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
                </td>
            </tr>

            <tr>
                <td>Nama Pelanggan</td>
                <td><input type="text" class="form-control" name="nama_pelanggan" value="<?php echo $d['nama_pelanggan'] ?>" required></td>
            </tr>

            <tr>
                <td>Paket</td>
                <td><input type="text" class="form-control" name="paket" value="<?php echo $d['paket'] ?>" required></td>
            </tr>

            <tr>
                <td>Nomor Invoice</td>
                <td><input type="text" class="form-control" name="no_invoice" value="<?php echo $d['no_invoice'] ?>" required></td>
            </tr>

            <tr>
                <td>Income</td>
                <td><input type="text" class="form-control" name="income" value="<?php echo $d['income'] ?>" id="txt1" onkeyup="sum();"  required></td>
            </tr>

            <tr>
                <td>Share Office</td>
                <td><input type="text" class="form-control" name="share_office" value="<?php echo $d['share_office'] ?>" id="txt2" onkeyup="sum();" required></td>
            </tr>

            <tr>
                <td>Share Proxy</td>
                <td><input name="share_proxy" type="text" class="form-control" placeholder="share_proxy" autocomplete="off" value="<?php echo $d['share_proxy'] ?>" id="txt3" required></td>
            </tr>

            <tr>
                <td>Keterangan dan Lain-Lain</td>
                <td>
                    <textarea name="lain" class="form-control" placeholder="isi Jika ada Keterangan lain jika tidak kosongkan saja"><?php echo $d['lain'] ?></textarea>
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

<script type="text/javascript">
    function validasi() {
        var tanggal = document.getElementById("tanggal").value;
        var nama_pelanggan = document.getElementById("nama_pelanggan").value;
        var paket = document.getElementById("paket").value;
        var no_invoice = document.getElementById("no_invoice").value;
        var income = document.getElementById("income").value;
        var share_office = document.getElementById("share_office").value;
        if (tanggal != "" && nama_pelanggan != "" && paket!="" && no_invoice !="" && income != "") {
            return true;
        }else{
            alert('Anda harus mengisi data dengan lengkap !');
        }
    }
</script>

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