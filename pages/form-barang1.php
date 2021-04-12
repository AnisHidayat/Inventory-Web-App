<?php 
include '../include/sidebar.php';
?>

<link href="../bootstrap/js/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="../bootstrap/js/jquery-ui.js"></script>

<script type="text/javascript">
  $(function(){
    var data = "../include/data.php";
    $("#auto-complete").autocomplete({
      source: data
    });
  });
</script>

<h1>Product Form</h1>

<div class="container">
  <form method="POST" action="../model/act-barang-add1.php">
    <div class="row">
      <div class="col-25">
        <label for="fname">Scan Using </label>
      </div>
      <div class="col-75">
       <a href="form-barang.php"><span class="fa fa-circle-o"></span> Product Id <br></a>
        <a href="form-barang1.php"><span class="fa fa-check-circle-o"></span> Principle Id <br></a>
      </div>
    </div>
    <!-- <div class="row">
      <div class="col-25">
        <label for="fname">Product Id</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="txtId" autofocus="" placeholder="Your Product Id..">
      </div>
    </div> -->
    <div class="row">
      <div class="col-25">
        <label for="fname">Product Id Principle</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" autocomplete="off" name="txtIdPrinciple" required="" placeholder="Your Id Principle..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Product Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="txtNama" autocomplete="off" required placeholder="Your Product Name..">
      </div>
    </div>
    <!-- <div class="row"> ini auto complete
      <div class="col-25">
        <label for="lname">Product Group</label>
      </div>
      <div class="col-75">
        <input type="text" id="auto-complete" name="txtGrup" placeholder="Your Group Name..">
      </div>
    </div> -->
    <div class="row">
      <div class="col-25">
        <label for="lname">Product Group</label>
      </div>
      <div class="col-75">
        <select style="height: 50" name="txtGrup" class="custom-select" required>
        <?php 
          include '../include/config.php';
          $query = mysqli_query($conn, "SELECT * FROM t_produk_grup");
          While($row = mysqli_fetch_array($query)) {
        ?>
          <option value="<?php echo $row['nama_grup'];?>"><?php echo $row['nama_grup'];?></option>
        <?php
          }
        ?>
      </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">UoM</label>
      </div>
      <div class="col-75">
        <select style="height: 50" name="txtSatuanKecil" class="custom-select">
        <?php 
          include '../include/config.php';
          $query = mysqli_query($conn, "SELECT * FROM t_satuan");
          While($row = mysqli_fetch_array($query)) {
        ?>
          <option value="<?php echo $row['satuan_kecil'];?>"><?php echo $row['satuan_kecil'];?></option>
        <?php
          }
        ?>
      </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Alternate UoM</label>
      </div>
      <div class="col-75">
        <select style="height: 50" name="txtSatuanBesar" class="custom-select">
        <?php 
          include '../include/config.php';
          $query = mysqli_query($conn, "SELECT * FROM t_satuan");
          While($row = mysqli_fetch_array($query)) {
        ?>
          <option value="<?php echo $row['satuan_besar'];?>"><?php echo $row['satuan_besar'];?></option>
        <?php
          }
        ?>
      </select>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>