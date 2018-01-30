<?php 

    @session_start();

    include "koneksi.php";

    if (@$_SESSION['admin']) {     
 ?>

<?php require_once 'header.php'; ?>
<style>  
    #ex4{ 
        border: 1px solid black;
        padding: 10px 10px 10px;
        margin-top: 10px;
        transition: background 2s;
        border-radius: 10px;
    } 
    #ex4:hover { 
        background: skyblue; 
    }           
</style>


<div class="container">
        <div class="panel panel-success" style="padding-top: 100px">

        

        <div class="panel-body">
<?php 
$id = $_SESSION['admin']; 

?>
            <center>
                <h2><small>Hai</small> <?php  echo $id; ?> <small>Selamat Datang di Halaman Administrator</small></h2>
            </center>

        
        </div>

        
        </div>




        <div class="panel panel-success">
            <div class="panel-heading">
                <form action="" method="get">
    <div class="input-group col-md-5 col-md-offset-7">
        
        
    <table>

        <tr>
            <td><label>Pilih Keduanya</label></td>
        </tr>
        <tr>

          <td>
            
            <select class="form-control" name="bulan" >

            <option>Bulan</option>
            <?php 
            $pil=mysqli_query($koneksi, "select distinct bulan from pemasukkan order by bulan desc");
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
            <select class="form-control" name="tahun" >

            <option>Tahun</option>
            <?php 
            $pil=mysqli_query($koneksi, "select distinct tahun from pemasukkan order by tahun desc");
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
<?php
$tahun2 = date('Y'); 
if(isset($_GET['bulan']) AND isset( $_GET['tahun'])){ ?>
<center><h1><label>Statistik Omset Proxy Bulan <?php echo $_GET['bulan']." ".$_GET['tahun']; ?></label></h1></center>
<?php    }else{ 
$bulan_angka = array(
                '01' => 'januari',
                '02' => 'FEBRUARI',
                '03' => 'MARET',
                '04' => 'APRIL',
                '05' => 'MEI',
                '06' => 'JUNI',
                '07' => 'JULI',
                '08' => 'AGUSTUS',
                '09' => 'SEPTEMBER',
                '10' => 'OKTOBER',
                '11' => 'NOVEMBER',
                '12' => 'DESEMBER',
        );
        $bulan_angka[date('m')];
        // $tahun = date('m');
        $bulan_kini = strtolower($bulan_angka[date('m')]); 


?>
<center><h1><label>Statistik Omset Proxy Bulan <?php echo $bulan_kini."".$tahun2; ?></label></h1></center>
<?php } ?>
<?php
// $id = $_SESSION['admin'];



if(isset($_GET['bulan']) AND isset( $_GET['tahun'])){
        $bulan=mysqli_real_escape_string($koneksi, $_GET['bulan']);
        $tahun=mysqli_real_escape_string($koneksi, $_GET['tahun']);
        $bulan_angka = array(
                '01' => 'januari',
                '02' => 'FEBRUARI',
                '03' => 'MARET',
                '04' => 'APRIL',
                '05' => 'MEI',
                '06' => 'JUNI',
                '07' => 'JULI',
                '08' => 'AGUSTUS',
                '09' => 'SEPTEMBER',
                '10' => 'OKTOBER',
                '11' => 'NOVEMBER',
                '12' => 'DESEMBER',
        );
        $bulan_angka[date('m')];
        // $tahun = date('m');
        $bulan_kini = strtolower($bulan_angka[date('m')]);    
        $bulan = mysqli_query($koneksi, "SELECT DISTINCT nama_proxy FROM pemasukkan WHERE tahun='$tahun' order by id_proxy asc");
        $omset = mysqli_query($koneksi, "SELECT SUM(income) as total FROM pemasukkan WHERE bulan='$bulan_kini' AND tahun='$tahun' group by nama_proxy asc");
    }else{

$bulan_angka = array(
                '01' => 'januari',
                '02' => 'FEBRUARI',
                '03' => 'MARET',
                '04' => 'APRIL',
                '05' => 'MEI',
                '06' => 'JUNI',
                '07' => 'JULI',
                '08' => 'AGUSTUS',
                '09' => 'SEPTEMBER',
                '10' => 'OKTOBER',
                '11' => 'NOVEMBER',
                '12' => 'DESEMBER',
        );
        $bulan_angka[date('m')];
        // $tahun = date('m');
        $bulan_kini = strtolower($bulan_angka[date('m')]);
         
        $bulan = mysqli_query($koneksi, "SELECT DISTINCT nama_proxy FROM pemasukkan WHERE tahun='$tahun2' order by id_proxy asc");
        $omset = mysqli_query($koneksi, "SELECT SUM(income) as total FROM pemasukkan WHERE bulan='$bulan_kini' AND tahun='$tahun2' group by nama_proxy asc");


    }


?>
            
            
        </div>
            <div class="panel-body">
                <div class="container">
            <canvas id="myChart" width="50" height="20"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($bulan)) { echo '"' . $b['nama_proxy'] . '",';}?>],
                    datasets: [{
                            label: 'Omset',
                            data: [<?php while ($p = mysqli_fetch_array($omset)) { echo '"' . $p['total'] . '",';}?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
            </div>
        </div>


     <?php 

$proxy = mysqli_query($koneksi, "SELECT * FROM proxy");


 ?>

<div class="">
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3>Laporan Finance</h3>
    </div>
    <div class="panel-body">
        <?php while($p=mysqli_fetch_assoc($proxy)):?>
        <div class="col-md-4">
            <div class="" id="ex4">
                <center><h3><a href="finance.php?id_proxy=<?php echo $p['id_proxy']; ?>" style="text-decoration: none;"><?php echo $p['nama_proxy']; ?></h3></a></center>
                <center><p><b><?php echo $p['cabang']; ?></b></p></center>
            </div>
        </div>
    <?php endwhile; ?>

        
        





        

    </div>
    <?php require_once 'footer.php'; ?>
</div>  
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
