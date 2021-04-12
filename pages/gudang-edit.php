<?php 
    include '../include/sidebar.php';
    include '../include/config.php';

    $SQLexec = "SELECT * FROM t_gudang WHERE id_gudang = '$_GET[id_gudang]'";
    $query = mysqli_query($conn, $SQLexec) or die ("query salah");
    $row = mysqli_fetch_array($query);
?>

<h1>Warehouse Form (Edit)</h1>

<div class="container">
  <form method="POST" action="../model/act-gudang-edit.php">
    <div class="row">
      <div class="col-25">
        <label for="fname">Warehouse Id</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="txtId" value="<?php echo $row['id_gudang'];?>" readonly="">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Warehouse Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="txtNama" value="<?php echo $row['nama_gudang'];?>" >
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Update">
    </div>
  </form>
</div>