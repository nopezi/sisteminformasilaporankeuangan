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
$id_proxy = $_SESSION['user'];
$id_brg=mysqli_real_escape_string($koneksi, $id_proxy);
$sql = "select * from user where id='$id_brg'";
$det=mysqli_query($koneksi, $sql)or die(mysql_error());
$d = mysqli_fetch_assoc($det);
if ($d['id']==$id_proxy) {
    // die(print_r($d));

    ?>


    <table class="table">
        <tr>
            <td><b>Username</b></td>
            <td><?php echo $d['username'] ?></td>
        </tr>
        <tr>
            <td><b>Password</b></td>
            <td>
                <input class="form-control" type="password" value="<?php echo $d['pass'] ?>" disabled>
            </td>
        </tr>

        
        <tr>
            <td></td>
            <td><a href="edit_user.php?id=<?php echo $d['id']; ?>" class="btn btn-warning">Edit</a></td>
        </tr>
</table>

<?php }else { ?>

<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-pencil"></span>  Tambah Data</button>

<?php } ?>

</div>

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
