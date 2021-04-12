<?php 
include '../include/sidebar.php';
?>

<h1>Warehouse Form</h1>

<div class="container">
  <form method="POST" action="../model/act-gudang-add.php">
    <div class="row">
      <div class="col-25">
        <label for="fname">Warehouse Id</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="txtId" required autofocus="" placeholder="Your Warehouse Id..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Warehouse Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="txtNama" required placeholder="Your Warehouse Name..">
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>