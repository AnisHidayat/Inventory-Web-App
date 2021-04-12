<?php 
	  include '../include/sidebar.php';
    include '../include/config.php';

    $SQLexec = "SELECT * FROM t_lokasi WHERE id_lokasi = '$_GET[id_lokasi]'";
    $query = mysqli_query($conn, $SQLexec) or die ("query salah");
    $row = mysqli_fetch_array($query);
?>

<h1>Location Form (Edit)</h1>

<div class="container">
  <form method="POST" action="../model/act-lokasi-edit.php">
    <div class="row">
      <div class="col-25">
        <label for="fname">Location Id</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="txtId" value="<?php echo $row['id_lokasi'];?>" readonly="">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Location Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="txtNama" value="<?php echo $row['nama_lokasi'];?>">
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Update">
    </div>
  </form>
</div>