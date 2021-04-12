<?php 
	include '../include/config.php';
  include '../include/sidebar.php';
?>
<!-- coding ini udah oke. ceri berdasarkan seluruh filed(gudang, lokasi, rak, barang) di history.php -->
<div>
<!--    <h1>Search Result</h1> 
</div>
<div class="container">
  <div style="overflow-x: auto;">
    <table class="table table-hover">
      <tr>
        <th>No</th>
        <th>Date</th>
        <th>Time</th>
        <th>Warehouse</th>
        <th>Location</th>
        <th>Rack</th>
        <th>Product</th>
        <th>Initial Qty</th>
        <th>Qty In</th>
        <th>Qty Out</th>
        <th>Qty Balance</th>
        <th>User</th>
      </tr> -->
      <?php 
        // if(isset($_GET['txtNamaGudang'])){
        //   $cari = $_GET['txtNamaGudang'];
        //   $cari1 = $_GET['txtNamaLokasi'];
        //   $cari2 = $_GET['txtNamaRak'];
        //   $cari3 = $_GET['txtIdBarang'];
         
        //   $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_history WHERE nama_gudang = '$cari' AND nama_lokasi = '$cari1' AND rak = '$cari2' AND id_barang = '$cari3'"));  
        //   if ($cek > 0) {
        //     $data = mysqli_query($conn, "SELECT * FROM t_history WHERE nama_gudang LIKE '%".$cari."%' AND nama_lokasi LIKE '%".$cari1."%' AND rak LIKE '%".$cari2."%' AND id_barang LIKE '%".$cari3."%'");
        //   }else{
        //      echo "<script>alert('Data tidak ditemukan');window.location = '../pages/history.php'</script>";
        //   }
        // }else{
        //   echo "";
        // }
        // $no = 1;
        // while($d = mysqli_fetch_array($data)){
      ?>
      <!-- <tbody id="myTable">
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $d['tanggal']; ?></td>
          <td><?php echo $d['jam']; ?></td>
          <td><?php echo $d['nama_gudang']; ?></td>
          <td><?php echo $d['nama_lokasi']; ?></td>
          <td><?php echo $d['rak']; ?></td>
          <td><?php echo $d['nama_barang']; ?></td>
          <td><?php echo $d['qty_awal']; ?></td>
          <td><?php echo $d['qty_in']; ?></td>
          <td><?php echo $d['qty_out']; ?></td>
          <td><?php echo $d['qty_ahir']; ?></td>
          <td><?php echo $d['user']; ?></td>
        </tr>
        <?php 
          //} ?>
      </tbody>
    </table>
  </div>
</div> -->


<div> <!-- coding cari jika produk id dan nama rak kosong -->
   <h1>Search Result</h1> 
</div>
<?php 
include '../include/config.php';
  if(isset($_GET['txtNamaGudang'])){
    $cari = $_GET['txtNamaGudang'];
    $cari1 = $_GET['txtNamaLokasi'];
    $cari2 = $_GET['txtNamaRak'];
    $cari3 = $_GET['txtIdBarang'];
    echo "<p>".$cari.", ".$cari1.", ".$cari2.", ".$cari3."</p>";
  }
?>
<div class="container">
  <div style="overflow-x: auto;">
    <table class="table table-hover">
      <tr>
        <th>No</th>
        <th>Date</th>
        <th>Time</th>
        <th>Warehouse</th>
        <th>Location</th>
        <th>Rack</th>
        <th>Product</th>
        <th>Initial Qty</th>
        <th>Qty In</th>
        <th>Qty Out</th>
        <th>Qty Balance</th>
        <th>User</th>
      </tr>
      <?php 
        if(isset($_GET['txtNamaGudang'])){
          $cari = $_GET['txtNamaGudang'];
          $cari1 = $_GET['txtNamaLokasi'];
          $cari2 = $_GET['txtNamaRak'];
          $cari3 = $_GET['txtIdBarang'];
         
          $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_history WHERE nama_gudang = '$cari' AND nama_lokasi = '$cari1' AND rak = '$cari2' AND id_barang = '$cari3'"));  
          if ($cek > 0) {
            $data = mysqli_query($conn, "SELECT * FROM t_history WHERE nama_gudang LIKE '%".$cari."%' AND nama_lokasi LIKE '%".$cari1."%' AND rak LIKE '%".$cari2."%' AND id_barang LIKE '%".$cari3."%'");
          }elseif (empty($cari2 && $cari3)){
            $data = mysqli_query($conn, "SELECT * FROM t_history WHERE nama_gudang LIKE '%".$cari."%' AND nama_lokasi LIKE '%".$cari1."%'");
          }else{
            echo "<script>alert('Data tidak ditemukan');window.location = '../pages/history.php'</script>";
          }
        }else{
          echo "<script>alert('Data tidak ditemukan');window.location = '../pages/history.php'</script>";
        }
        $no = 1;
        while($d = mysqli_fetch_array($data)){
      ?>
      <tbody id="myTable">
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $d['tanggal']; ?></td>
          <td><?php echo $d['jam']; ?></td>
          <td><?php echo $d['nama_gudang']; ?></td>
          <td><?php echo $d['nama_lokasi']; ?></td>
          <td><?php echo $d['rak']; ?></td>
          <td><?php echo $d['nama_barang']; ?></td>
          <td><?php echo $d['qty_awal']; ?></td>
          <td><?php echo $d['qty_in']; ?></td>
          <td><?php echo $d['qty_out']; ?></td>
          <td><?php echo $d['qty_ahir']; ?></td>
          <td><?php echo $d['user']; ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <a href="history.php" class="btn btn-success"><span class="fa fa-reply" data-toggle="tooltip" data-placement="right" title="Kembali"></span></a>
  </div>
</div>