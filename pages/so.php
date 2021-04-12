<?php 
include '../include/sidebar.php';
?>

<link href="../bootstrap/js/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="../bootstrap/js/jquery-ui.js"></script>

<script type="text/javascript">
  $(function(){ //ini untuk auto complete memanggil nama rak, tapi ga jadi
    var data = "../include/data-rak.php";
    $("#auto-complete").autocomplete({
      source: data
    });
  });
</script>
<h1>Stock Opname</h1>

<div class="container">
  <form method="POST" action="form-so.php">
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
        <select style="height: 50" name="txtLokasi" class="custom-select" required="">
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
        <input type="text" name="txtRak" placeholder="Rack name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Product</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="txtProduk" placeholder="Product id..">
      </div>
    </div>
    <div class="row">
      <button type="submit" class="btn btn-info">Search</button>
    </div>
  </form>
</div><br/>
