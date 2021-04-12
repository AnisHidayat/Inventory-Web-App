<?php 
include '../include/sidebar.php';
?>

<h1>Units Form</h1>

<div class="container">
  <form method="POST" action="../model/act-satuan-add.php">
    <!-- <div class="row">
      <div class="col-25">
        <label for="fname">Unit Id</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="txtId" autofocus="" placeholder="Your Unit Id..">
      </div>
    </div> -->
    <div class="row">
      <div class="col-25">
        <label for="lname">UoM</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="txtSatuanKecil" placeholder="Your Small Unit Name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Alternate UoM</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="txtSatuanBesar" placeholder="Your Big Unit Name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Qty</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="txtQty" placeholder="Your Unit Name..">
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>