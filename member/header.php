

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan Finance Kahyangan multimedia</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
  <script type="text/javascript" src="../assets/js/jquery.js"></script>
  <script type="text/javascript" src="../assets/js/jquery.js"></script>
  <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
  <script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>
  <script src="../js/Chart.bundle.js"></script>  

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>

  <script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
		

</head>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
          </button>
       </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <!-- <li><a href="pengeluaran.php">Pengeluaran</a></li>
                <li><a href="pemasukkan.php">Pemasukkan</a></li> -->
                <li><a href="proxy.php" >Proxy</a></li>
                
                <li><a href="finance.php" >Laporan Finance</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
              <li class="dropdown navbar-right">
                <?php require_once '../koneksi.php';
                $id = $_SESSION['user']; 
                $user = mysqli_query($koneksi, "select * from user where id ='$id'");
                while($u = mysqli_fetch_assoc($user)) {
                     
                  ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hai <?php echo $u['username'] ?> <span class="caret"></span></a>
                <ul class="dropdown-menu navbar-right" role="menu">
                <li><a href="user.php">Edit Login Proxy</a></li>
                <li class=""><a href="../logout.php" class="dropdown-toggle">Keluar </a></li>
                </ul>
                <?php } ?>
                </li>
            </ul>
            </div>
    </div>
</div>