<?php 
  include '../include/sidebar.php';
  include '../include/config.php';
  $SQLexec = "SELECT * FROM t_item_balance WHERE id_transaksi = '$_GET[id_transaksi]'";
  $query = mysqli_query($conn, $SQLexec) or die ("query salah");
  $row = mysqli_fetch_array($query);

  // $SQLexec1 = "SELECT t_barang.nama_barang, t_gudang.nama_gudang, t_lokasi.nama_lokasi
  // FROM t_lokasi INNER JOIN (t_barang INNER JOIN (t_gudang INNER JOIN t_item_balance ON t_gudang.id_gudang = t_item_balance.id_gudang) ON t_barang.id_barang = t_item_balance.id_barang) ON t_lokasi.id_lokasi = t_item_balance.id_lokasi";
  // $query1 = mysqli_query($conn, $SQLexec1) or die ("query salah");
  // $row1 = mysqli_fetch_array($query1);
?>

<h1>Transaction Out</h1>

<div class="container">
  <form method="POST" action="../model/act-transaksi-out.php">
    <input type="hidden" name="txtIdUser" value="<?= $_SESSION['user_name'] ?>" readonly>
    <div class="row">
      <div class="col-25">
        <label for="lname">Transaction Id</label>
      </div>
      <div class="col-75">
        <input type="text" name="txtIdTransaksi" value="<?php echo $row['id_transaksi'];?>" readonly required placeholder="Your Transaction Id..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Product Id</label>
      </div>
      <div class="col-75">
        <input type="hidden" name="txtIdBarang" value="<?= $row['id_barang'] ?>">
        <input type="text" name="txtBarang" value="<?php echo $row['nama_barang'];?>" readonly placeholder="Your Product Id..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Warehouse</label>
      </div>
       <div class="col-75">
        <input type="text" name="txtGudang" value="<?php echo $row['nama_gudang'];?>" readonly placeholder="Your Product Id..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Location</label>
      </div>
       <div class="col-75">
        <input type="text" name="txtLokasi" value="<?php echo $row['nama_lokasi'];?>" readonly placeholder="Your Product Id..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Rack</label>
      </div>
      <div class="col-75">
        <input type="text" name="txtRak" value="<?php echo $row['rak'];?>" readonly placeholder="Your Product Id..">
      </div>
    </div>
     <div class="row">
      <div class="col-25">
        <label for="lname">Qty</label>
      </div>
      <div class="col-75">
        <input style="height: 50px" type="number" min="0" required name="txtQty" autofocus autocomplete="off" placeholder="Your Quantity..">
      </div>
    </div>
    <div class="row">
      <input type="submit" name="Submit" value="Submit"/>
    </div>
  </form>
</div>