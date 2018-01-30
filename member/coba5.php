<?php 

    @session_start();

    include "../koneksi.php";

    if (@$_SESSION['user']) {     
 ?>

<?php require_once 'header.php'; ?>



<div class="container">
        <div class="panel panel-success" style="padding-top: 100px">

        

        <div class="panel-body">
            <?php 
    $id = $_SESSION['user']; 
    $user = mysqli_query($koneksi, "select * from user where id ='$id'");
    while($u = mysqli_fetch_assoc($user)) { ?>
            <center>
                <h2><small>Hai</small> <?php echo $u['username'] ?> <small>Selamat Datang di Halaman Proxy</small></h2>
            </center>
    <?php } ?>
        
        </div>

        
        </div>
<?php
$id = $_SESSION['user'];
$tahun = date('Y');
$bulan_bulan = "januari";

$bulan       = mysqli_query($koneksi, "SELECT DISTINCT bulan FROM pemasukkan WHERE tahun='$tahun' AND id_proxy='$id' order by id_proxy asc");
$omset = mysqli_query($koneksi, "SELECT SUM(income) as total FROM pemasukkan WHERE tahun='$tahun' AND id_proxy='$id' GROUP by bulan asc");
?>
        <div class="panel panel-success">
            <div class="panel-heading">
            <center><h1><label>Statistik Omset Proxy Perbulan</label></h1></center>
            
        </div>
            <div class="panel-body">
                <div class="container">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($bulan)) { echo '"' . $b['bulan'] . '",';}?>],
                    datasets: [{
                            label: '# of Votes',
                            data: [<?php while ($p = mysqli_fetch_array($omset)) { echo '"' . $p['total'] . '",';}?>],
                            backgroundColor: [
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
                                'rgba(255, 159, 64, 1)'
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



<script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
}else{
        header("location:../index.php");
}
?>
