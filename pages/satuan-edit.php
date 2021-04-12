<?php 
	  include '../include/sidebar.php';
    include '../include/config.php';

    $SQLexec = "SELECT * FROM t_satuan WHERE id_satuan = '$_GET[id_satuan]'";
    $query = mysqli_query($conn, $SQLexec) or die ("query salah");
    $row = mysqli_fetch_array($query);
?>

<h1>Units Form (Edit)</h1>

<div class="container">
  <form method="POST" action="../model/act-satuan-edit.php">
    <div class="row">
      <div class="col-25">
        <label for="fname">Unit Id</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="txtId" value="<?php echo $row['id_satuan'];?>" readonly="">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Small Unit</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="txtSatuanKecil" value="<?php echo $row['satuan_kecil'];?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Big Unit</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="txtSatuanBesar" value="<?php echo $row['satuan_besar'];?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Qty</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="txtQty" value="<?php echo $row['qty'];?>">
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Update">
    </div>
  </form>
</div>