<?php 

include 'header.php';
    @session_start();

    include "koneksi.php";

    if (@$_SESSION['admin']) {     
 ?>

<div class="container-fluid">
<div class="panel panel-success" style="padding-top: 100px">


<div class="panel-body">
 




</div>

<?php require_once 'footer.php'; ?>
        
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