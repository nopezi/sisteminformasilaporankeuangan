<?php 

    @session_start();

    include "../koneksi.php";

    if (@$_SESSION['user']) {     
 ?>

<?php require_once 'header.php'; ?>



    <div class="container">
        <div class="panel panel-success" style="padding-top: 100px">

<?php 
    $id = $_SESSION['user']; 
    $user = mysqli_query($koneksi, "select * from user where id ='$id'");
    while($u = mysqli_fetch_assoc($user)) { ?>
        <div class="panel-body">
            <center>
                <h2><small>Hai</small> <?php echo $u['username'] ?> <small>Selamat Datang di Halaman Proxy</small></h2>
            </center>
        </div>
<?php } ?>
<?php require_once 'footer.php';  ?>
        
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
