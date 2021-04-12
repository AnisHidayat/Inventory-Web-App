<?php 
	include '../include/config.php';
 	include '../include/sidebar.php';
?>

<!-- <div> Coding ini udah oke
   <h1>Search Result</h1> 
</div>
<div class="container">
  <div style="overflow-x: auto;">
    <table class="table table-hover">
      <tr>
        <th>No</th>
        <th>Transaction Id</th>
        <th>Product</th>
        <th>Warehouse</th>
        <th>Location</th>
        <th>Rack</th>
        <th>Qty</th>
      </tr> -->
      <?php 
        // $cari = $_POST['txtProductId'];
        // $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_item_balance WHERE id_barang = '$cari'"));  
        // if ($cek > 0) {
        //   $bata = mysqli_query($conn, "SELECT * FROM t_item_balance WHERE id_barang LIKE '%".$cari."%' ");
        // }else{
        //   echo "<script>alert('Data tidak ditemukan');window.location = '../pages/transaksi.php'</script>";
        // }

        // $no = 1;
        // while($b = mysqli_fetch_array($bata)){
      ?>
      <!-- <tbody id="myTable">
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $b['id_barang']; ?></td>
          <td><?php echo $b['nama_barang']; ?></td>
          <td><?php echo $b['nama_gudang']; ?></td>
          <td><?php echo $b['nama_lokasi']; ?></td>
          <td><?php echo $b['rak']; ?></td>
          <td><?php echo $b['qty']; ?></td>
        </tr>
      <?php 
      //} ?>
      </tbody>
    </table>
  </div>
</div> -->

<div>
   <h1>Search Result</h1> 
</div>
<div class="container">
  <div style="overflow-x: auto;">
    
    <?php 
      $cari1 = $_POST['txtProductId'];
      $cek1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_item_balance WHERE id_barang = '$cari1'"));  
      if (!empty($cari1)) { 
        if ($cek1 > 0) {
          $id_barang = mysqli_query($conn, "SELECT * FROM t_item_balance WHERE id_barang LIKE '%".$cari1."%' ");
          $no = 1; ?>
          <table class="table table-hover">
            <tr>
              <th>No</th>
              <th>Product Id</th>
              <th>Product Name</th>
              <th>Warehouse</th>
              <th>Location</th>
              <th>Rack</th>
              <th>Qty</th>
            </tr>
            <?php while($b = mysqli_fetch_array($id_barang)){ ?>
            <tbody id="myTable">
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $b['id_barang']; ?></td>
                <td><?php echo $b['nama_barang']; ?></td>
                <td><?php echo $b['nama_gudang']; ?></td>
                <td><?php echo $b['nama_lokasi']; ?></td>
                <td><?php echo $b['rak']; ?></td>
                <td><?php echo $b['qty']; ?></td>
              </tr>
          <?php } ?>
            </tbody>
          </table>
        <?php 
        }else{
          echo "<script>alert('Data tidak ditemukan');window.location = '../pages/transaksi.php'</script>";
        } 
      }else{
        $cari2 = $_POST['txtPrincipleId'];
        $cek2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_item_balance WHERE id_principle = '$cari2'"));  
        if ($cek2 > 0) {
          $id_principle = mysqli_query($conn, "SELECT * FROM t_item_balance WHERE id_principle LIKE '%".$cari2."%' ");
          $no = 1; ?>
          <table class="table table-hover">
            <tr>
              <th>No</th>
              <th>Principle Id</th>
              <th>Product Name</th>
              <th>Warehouse</th>
              <th>Location</th>
              <th>Rack</th>
              <th>Qty</th>
            </tr>
          <?php while($p = mysqli_fetch_array($id_principle)){ ?>
            <tbody id="myTable">
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $p['id_principle']; ?></td>
                <td><?php echo $p['nama_barang']; ?></td>
                <td><?php echo $p['nama_gudang']; ?></td>
                <td><?php echo $p['nama_lokasi']; ?></td>
                <td><?php echo $p['rak']; ?></td>
                <td><?php echo $p['qty']; ?></td>
              </tr>
          <?php } ?>
            </tbody>
          </table>
        <?php 
        }else{
          echo "<script>alert('Data tidak ditemukan');window.location = '../pages/transaksi.php'</script>";
        } 
      } ?>

  </div>
</div>