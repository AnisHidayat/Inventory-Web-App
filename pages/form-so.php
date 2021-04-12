<?php 
  include '../include/config.php';
  include '../include/sidebar.php';
?>
<div>
   <h1>Stock Opname</h1>
   <a href="so.php" class="btn btn-success"><span class="fa fa-reply" data-toggle="tooltip" data-placement="right" title="Kembali"></span></a>
</div><br/>

<?php 
  include '../include/config.php';
  if(isset($_POST['txtGudang'])){
    $cari = $_POST['txtGudang'];
    $cari1 = $_POST['txtLokasi'];
    $cari2 = $_POST['txtRak'];
    $cari3 = $_POST['txtProduk'];
    echo "<p>Hasil pencarian : ".$cari.", ".$cari1.", ".$cari2.", ".$cari3."</p>";
  }
?>

<div>
  
  <?php 
  if(isset($_POST['txtGudang'])){
    $cari  = $_POST['txtGudang'];
    $cari1 = $_POST['txtLokasi'];
    $cari2 = $_POST['txtRak'];
    $cari3 = $_POST['txtProduk'];
    
    $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_item_balance WHERE nama_gudang = '$cari' AND nama_lokasi = '$cari1' AND rak = '$cari2' AND id_barang = '$cari3'"));  
    if ($cek > 0) {
      $data = mysqli_query($conn, "SELECT * FROM t_item_balance WHERE nama_gudang LIKE '%".$cari."%' AND nama_lokasi LIKE '%".$cari1."%' AND rak LIKE '%".$cari2."%' AND id_barang LIKE '%".$cari3."%'"); ?>
      <form id="myForm" method="POST" action="../model/act-so.php">
        <div style="overflow-x: auto;">
          <table class="table table-hover table-bordered">
            <tr>
              <th>No</th>
              <th>Id Barang</th>
              <th>Nama Gudang</th>
              <th>Nama Lokasi</th>
              <th>Rak</th>
              <th>Nama Barang</th>
              <th>Qty Akhir</th>
              <th>SO</th>
              <th>Selisih</th>
              <th>Input SO</th>
              <th>Simpan</th>
            </tr> 
          <?php
            $no = 1;
            while($d = mysqli_fetch_array($data)){
            ?>

            <span id="result"></span>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $d['id_barang']; ?></td>
              <td><?php echo $d['nama_gudang']; ?></td>
              <td><?php echo $d['nama_lokasi']; ?></td>
              <td><?php echo $d['rak']; ?></td>
              <td><?php echo $d['nama_barang']; ?></td>
              <td><?php echo $d['qty']; ?></td>
              <td><?php echo $d['qty_so']; ?></td>
              <td><?php echo $d['selisih']; ?></td>
              <td><input type="text" style="width: 100px; height: 33px" name="txtSo"></td>
              <input type="hidden" name="txtIdTransaksi" value="<?php echo $d['id_transaksi']; ?>">
              <!-- <td> <center><a href="form-so.php?id_transaksi=<?php echo $d['id_transaksi'];?>" data-toggle="tooltip" data-placement="right" title="Simpan" class="btn btn-custon-rounded-three btn-warning" style="color:#fff"><i class="fa fa-save"></i></a></center> </td> -->
              <td><button id="sub" type="submit" class="btn btn-custon-rounded-three btn-warning fa fa-save"></button></td>
            </tr>
            <?php } ?>
          </table>
        </div>
      </form>
    <?php  
    }elseif (empty($cari2 && $cari3)){
      $data = mysqli_query($conn, "SELECT * FROM t_item_balance WHERE nama_gudang LIKE '%".$cari."%' AND nama_lokasi LIKE '%".$cari1."%'"); ?>
      <form id="myForm" method="POST" action="../model/act-so.php">
        <div style="overflow-x: auto;">
          <table class="table table-hover table-bordered">
            <tr>
              <th>No</th>
              <th>Id Barang</th>
              <th>Nama Gudang</th>
              <th>Nama Lokasi</th>
              <th>Rak</th>
              <th>Nama Barang</th>
              <th>Qty Akhir</th>
              <th>SO</th>
              <th>Selisih</th>
              <th>Input SO</th>
              <th>Simpan</th>
            </tr> 
          <?php
            $no = 1;
            while($d = mysqli_fetch_array($data)){
            ?>

            <span id="result"></span>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $d['id_barang']; ?></td>
              <td><?php echo $d['nama_gudang']; ?></td>
              <td><?php echo $d['nama_lokasi']; ?></td>
              <td><?php echo $d['rak']; ?></td>
              <td><?php echo $d['nama_barang']; ?></td>
              <td><?php echo $d['qty']; ?></td>
              <td><?php echo $d['qty_so']; ?></td>
              <td><?php echo $d['selisih']; ?></td>
              <td><input type="text" style="width: 100px; height: 33px" name="txtSo"></td>
              <input type="hidden" name="txtIdTransaksi" value="<?php echo $d['id_transaksi']; ?>">
              <!-- <td> <center><a href="form-so.php?id_transaksi=<?php echo $d['id_transaksi'];?>" data-toggle="tooltip" data-placement="right" title="Simpan" class="btn btn-custon-rounded-three btn-warning" style="color:#fff"><i class="fa fa-save"></i></a></center> </td> -->
              <td><button id="sub" type="submit" class="btn btn-custon-rounded-three btn-warning fa fa-save"></button></td>
            </tr>
            <?php } ?>
          </table>
        </div>
      </form>
      <?php
      }else{
         echo "<script>alert('Tidak ada data');window.location = 'so.php'</script>";
        }   
      }
  ?>
</div> 

<script type="text/javascript">
  $("#sub").click(function() {
  $.post($("#myForm").attr("action"), $("#myForm :input").serializeArray(), function(info) { $("#result").html(info); });
  clearInput();
  });

  $("#myForm").submit(function(){
    return false;
  });

  function clearInput(){
    $("#myForm :input").each(function(){
      $(this).val('');
    });
  };
</script>