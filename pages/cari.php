<?php 
	include '../include/config.php';
 	include '../include/sidebar.php';
?>

<div> <!-- Coding ini udah oke -->
   <h1>Search Result</h1> 
   <?php 
      if(isset($_POST['txtCari'])){
        $cari = $_POST['txtCari'];
        echo "<p>".$cari."</p>";
      }
    ?>
</div>
<div class="container">
  <div style="overflow-x: auto;">
    <table class="table table-hover">
      <tr>
        <th>No</th>
        <!-- <th>Transaction Id</th> -->
        <th>Product</th>
        <th>Warehouse</th>
        <th>Location</th>
        <th>Rack</th>
        <th>Qty</th>
      </tr>
      <?php 
        $cari = $_POST['txtCari'];
        $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_item_balance WHERE id_barang = '$cari' OR id_principle = '$cari'"));  
        if ($cek > 0) {
          $data = mysqli_query($conn, "SELECT * FROM t_item_balance WHERE id_barang LIKE '%".$cari."%' OR id_principle LIKE '%".$cari."%'");
        }else{
          echo "<script>alert('Data yang dicari tidak ada');window.location = '../pages/transaksi.php'</script>";
        }

        $no = 1;
        while($d = mysqli_fetch_array($data)){
      ?>
      <tbody id="myTable">
        <tr>
          <td><?php echo $no++; ?></td>
          <!-- <td><?php echo $d['id_barang']; ?></td> -->
          <td><?php echo $d['nama_barang']; ?></td>
          <td><?php echo $d['nama_gudang']; ?></td>
          <td><?php echo $d['nama_lokasi']; ?></td>
          <td><?php echo $d['rak']; ?></td>
          <td><?php echo $d['qty']; ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    <!-- <a href="javascript:history.go(-1)" title="Return to the previous page">&laquo; Go back</a> -->
    <a href="transaksi.php" class="btn btn-success"><span class="fa fa-reply" data-toggle="tooltip" data-placement="right" title="Kembali"></span></a>
  </div>
</div>
