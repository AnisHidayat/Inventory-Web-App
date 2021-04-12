<?php 
  include '../include/sidebar.php';
?>

<link href="../bootstrap/js/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="../bootstrap/js/jquery-ui.js"></script>

<script type="text/javascript">
  $(function(){
    var data = "../include/data-barang.php";
    $("#auto-complete").autocomplete({
      source: data
    });
  });
</script>

<h1>New Transaction</h1>

<div class="container">
  <form method="POST" action="../model/act-transaksi-new.php">
    <input type="hidden" name="txtIdUser" value="<?= $_SESSION['user_name'] ?>" readonly>
    <div class="row">
      <div class="col-25">
        <label for="lname">Transaction Id</label>
      </div>
      <div class="col-75">
        <input type="text" name="txtIdTransaksi" autocomplete="off" autofocus="" required="" placeholder="Your Transaction Id..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Warehouse</label>
      </div>
       <div class="col-75">
        <select style="height: 50" name="txtGudang" class="custom-select" required="">
    			<?php 
    				include '../include/config.php';
    				$query = "SELECT * FROM t_gudang";
    				$result = mysqli_query($conn, $query);
    				While($row = mysqli_fetch_array($result)) {
    			?>
    				<option value="<?php echo $row['nama_gudang'];?>"><?php echo $row['nama_gudang'];?></option>
    			<?php
    				}
    			?>
    		</select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Location</label>
      </div>
       <div class="col-75">
        <select style="height: 50" name="txtLokasi" class="custom-select">
    			<?php 
    				include '../include/config.php';
    				$query = "SELECT * FROM t_lokasi";
    				$result = mysqli_query($conn, $query);
    				While($row = mysqli_fetch_array($result)) {
    			?>
    				<option value="<?php echo $row['nama_lokasi'];?>"><?php echo $row['nama_lokasi'];?></option>
    			<?php
    				}
    			?>
    		</select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Rack</label>
      </div>
      <div class="col-75">
        <input type="text" name="txtRak" placeholder="Your Rack..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Product </label>
      </div>
      <div class="col-75">
        <input type="text" id="auto-complete" name="txtBarang" autocomplete="off" required placeholder="Your Product name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Qty</label>
      </div>
      <div class="col-75">
        <input style="height: 50px" type="number" min="0" required name="txtQty" autocomplete="off" placeholder="Your Quantity..">
      </div>
    </div>
    <div class="row">
      <input type="submit" name="Submit" value="Submit"/>
    </div>
  </form>
</div>