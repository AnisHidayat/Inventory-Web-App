<?php 
include '../include/sidebar.php';
?>

<h1>Location Form</h1>

<div class="container">
  <form method="POST" action="../model/act-lokasi-add.php">
    <div class="row">
      <div class="col-25">
        <label for="fname">Location Id</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="txtId" autofocus="" placeholder="Your Product Id..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Location Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="txtNama" placeholder="Your Product Name..">
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>