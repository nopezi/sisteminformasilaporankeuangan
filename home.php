<?php 

include 'header.php';
    @session_start();

    include "koneksi.php";

    if (@$_SESSION['admin']) {     
 ?>


    <div class="container">
        <div class="panel panel-success" style="padding-top: 100px">


        <div class="panel-body">
            <h2><marquee>Selamat Datang <?php echo $_SESSION['admin']; ?> </marquee></h2>
        </div>

        <div class="panel-footer">
            &copy;Kahyangan Multimedia Finance <b><?php echo date('Y'); ?></b>
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
