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
<?php
// $id = $_SESSION['admin'];

function buulan($buulan){
    switch ($buulan) {
        case 1: $buulan="januari";
            break;
        case 2: $buulan="februari";
            break;    
        case 3: $buulan="maret";
            break;
        case 4: $buulan="april";
            break;
        case 5: $buulan="mei";
            break;
        case 6: $buulan="juni";
            break;
        case 7: $buulan="juli";
            break;
        case 8: $buulan="agustus";
            break;
        case 9: $buulan="september";
            break;
        case 10: $buulan="oktober";
            break;
        case 11: $buulan="november";
            break;
        case 12: $buulan="desember";
            break;                                    

    }
 return $buulan;   
}

$tahun = date('Y');
$bulan_angka = date('m');
$bulan_sekarang = buulan($bulan_angka);
$bulan       = mysqli_query($koneksi, "SELECT DISTINCT nama_proxy FROM pemasukkan WHERE tahun='$tahun' order by id_proxy asc");
$omset = mysqli_query($koneksi, "SELECT SUM(income) as total FROM pemasukkan WHERE bulan='$bulan_sekarang' AND tahun='$tahun' group by nama_proxy asc");
?>
        <div class="panel panel-success">
            <div class="panel-heading">
            <center><h1><label>Statistik Omset Proxy Bulan <?php echo $bulan_sekarang; ?></label></h1></center>
            
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
