<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="shortcut icon" type="image/x-icon" href="../assets/images/barindo.ico">
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="../include/sidebar-04/css/style.css">
<link rel="stylesheet" href="../bootstrap/css/custom.css">

<!-- botstrap yg dilokal ga bisa. jadi pake link ini -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  

<?php 
  session_start();
  if (!isset($_SESSION['user_name'])) {
      echo "<script>alert('Anda belum login !');window.location = '../index.php?'</script>";
    }
?>

<div class="wrapper d-flex align-items-stretch">
	<nav id="sidebar">

		<div class="custom-menu">
			<button type="button" id="sidebarCollapse" class="btn btn-primary">
        <i class="fa fa-bars"></i>
        <span class="sr-only">Toggle Menu</span>
      </button>
    </div>
		<h1><a href="" class="logo">BSA Inventory</a></h1> 
    <ul class="list-unstyled components mb-5">
      <li class="active">
        <a href="home.php"><span class="fa fa-home mr-3"></span> Homepage</a>
      </li>
      <li>
          <a href="barang.php"><span class="fa fa-th mr-3"></span> Product</a>
      </li>
      <li>
        <a href="gudang.php"><span class="fa fa-database mr-3"></span> Warehouse</a>
      </li>
      <li>
        <a href="lokasi.php"><span class="fa fa-map-marker mr-3"></span> Location</a>
      </li>
      <li>
        <a href="satuan.php"><span class="fa fa-tags mr-3"></span> Unit</a>
      </li>
      <li>
        <a href="user.php"><span class="fa fa-users mr-3"></span> User</a>
      </li>
      <li>
        <a href="transaksi.php"><span class="fa fa-handshake-o mr-3"></span> Transaction</a>
      </li>
      <li>
        <a href="coba-so.php"><span class="fa fa-calculator mr-3"></span> Stock Opname</a>
      </li>
      <li>
        <a href="history.php"><span class="fa fa-balance-scale mr-3"></span> Balance</a>
      </li>
    </ul>
      <!-- <button type="button" class="btn btn-primary" data-placement="right" title="Logout" data-toggle="modal" data-target="#logout"><span class="fa fa-power-off"></span>
      </button> -->

      <a href="../logout.php?" onclick="return confirm('Yakin ingin keluar?')" class="btn btn-primary" data-placement="right" title="Logout"><span class="fa fa-power-off"></span></a>
      
	</nav>

    <!-- Page Content  -->
  <div id="content" class="p-4 p-md-5 pt-5">
  <p style="text-align: right; float: right;">
    <?php
      date_default_timezone_set('Asia/Jakarta');
     
      $a = date ("H");
      if (($a>=1) && ($a<=10)){
        echo "<b> Hallo, good morning <i>".$_SESSION['user_name']."</i>";
      }else if(($a>10) && ($a<=14)){
        echo "<b> Hai, good afternoon <i>".$_SESSION['user_name']."</i>";
      }else if (($a>14) && ($a<=18)){
        echo "<b> Hallo, good evening <i>".$_SESSION['user_name']."</i>";
      }else { 
        echo " <b> Good night <i>".$_SESSION['user_name']."</i>";
      }
      
    ?>
 
<!-- The Modal Logout -->
  <div class="modal fade" id="logout">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Konfirmasi</h4>
          <button type="button" class="close" data-dismiss="modal">x</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <p>Yakin ingin keluar?</p>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <a href="../logout.php" data-toggle="tooltip modal" data-target="#In" data-placement="bottom" title="Add Qty" class="btn btn-info">Ok</a>
        </div>

      </div>
    </div>
  </div>

<script type="text/javascript" src="../include/sidebar-04/js/jquery.min.js"></script>
<script type="text/javascript" src="../include/sidebar-04/js/popper.js"></script>
<script type="text/javascript" src="../include/sidebar-04/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../include/sidebar-04/js/main.js"></script>
<script type="text/javascript" src="../bootstrap/js/style.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
 