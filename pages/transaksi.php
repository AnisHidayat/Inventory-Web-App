<?php 
  include '../include/sidebar.php';
?>

<div>
  <h1>Transaction</h1>
  <a href="form-transaksi-new.php" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Transaction In">New Transaction</a>  
  <div style="float: right">
  <input style="width: 235px; height: 40px;" class="form-margin" autofocus="" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search here..." title="Ketikkan pencarian disini">
      <button class="btn btn-info" onclick="document.getElementById('productId').style.display='block'">Product Id</button>
      <button style="color: #fff" class="btn btn-warning" onclick="document.getElementById('pricipleId').style.display='block'">Principle Id</button>
  </div>
</div>

<div class="container" style="overflow-x: auto;">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Transaction ID</th>
        <th>Warehouse</th>
        <th>Location</th>
        <th>Rack</th>
        <th>Product</th>
        <th>Qty</th>
        <th colspan="2"><center>Action</center></th>
      </tr>
    </thead>
    <?php
      include '../include/config.php';
      
      $halaman = 10;
      $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
      $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
      $result = mysqli_query($conn, "SELECT * FROM t_item_balance ORDER BY id_transaksi ASC");
      $total = mysqli_num_rows($result);
      $pages = ceil($total/$halaman);            
      $query = mysqli_query($conn,"SELECT * FROM t_item_balance LIMIT $mulai, $halaman")or die(mysqli_error);
      $no = $mulai+1;

      // diabawah ini adalah referensi coding join tabel, pilih salah 1 juka diperlukan

      // udah bener
      // $SQLexec = mysqli_query($conn, "SELECT t_barang.nama_barang, t_gudang.nama_gudang, t_lokasi.nama_lokasi
      // FROM t_lokasi INNER JOIN (t_barang INNER JOIN (t_gudang INNER JOIN t_item_balance ON t_gudang.id_gudang = t_item_balance.id_gudang) ON t_barang.id_barang = t_item_balance.id_barang) ON t_lokasi.id_lokasi = t_item_balance.id_lokasi") or die(mysqli_error);

      //udah bener
      // $SQLexec=mysqli_query($conn, "SELECT t_barang.nama_barang, t_gudang.nama_gudang, t_lokasi.nama_lokasi FROM t_item_balance
      // JOIN t_barang ON t_item_balance.id_barang = t_barang.id_barang
      // JOIN t_gudang ON t_item_balance.id_gudang = t_gudang.id_gudang
      // JOIN t_lokasi ON t_item_balance.id_lokasi = t_lokasi.id_lokasi");
      //   if($SQLexec === FALSE){
      //     die(mysqli_error($conn));
      //   }

      //$row1 = mysqli_fetch_array($SQLexec);
      While($row=mysqli_fetch_array ($query)){
    ?>
    <tbody id="myTable">
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['id_transaksi']; ?></td>
        <td><?php echo $row['nama_gudang']; ?></td>
        <td><?php echo $row['nama_lokasi']; ?></td>
        <td><?php echo $row['rak']; ?></td>
        <td><?php echo $row['nama_barang']; ?></td>
        <td><?php echo $row['qty']; ?></td>
        <td>
          <center>
            <a href="form-transaksi-in.php?id_transaksi=<?php echo $row['id_transaksi'];?>" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Transaction In"><span class=" fa fa-plus"></a>  
            <a href="form-transaksi-out.php?id_transaksi=<?php echo $row['id_transaksi'];?>" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Transaction Out"><span class=" fa fa-minus"></span></a>
          </center>
        </td>
      </tr>
    <?php } ?>
    </tbody>
    </table>          
  <div>
   Halaman &nbsp;<?php for ($i=1; $i<=$pages ; $i++){ ?>
      <a href="?halaman=<?php echo  $i;  ?>"><?php echo $i; ?> &nbsp; &nbsp;</a>
    <?php } 
       include '../include/config.php';
       $sql = mysqli_query($conn, "SELECT * FROM t_item_balance");
       $count = mysqli_num_rows($sql);
    ?>
      <p style="float: right;">Total : <?php echo $count; ?> transaksi</p>
  </div>
</div>

<!-- Modal search product id -->
<div id="productId" class="modal">
  <span onclick="document.getElementById('productId').style.display='none'" class="close" title="Close Search">&times;</span>
  <!-- Modal Content -->
  <form class="modal-content animate" method="post" action="cari.php">
    <div class="container">
      <input type="text" placeholder="Masukan Product Id" name="txtCari" required>
      <button class="btn btn-info" type="submit"><span class="fa fa-search"></span> Search</button>
    </div>
  </form>
</div>

<!-- Modal search priciple id-->
<div id="pricipleId" class="modal">
  <span onclick="document.getElementById('pricipleId').style.display='none'" class="close" title="Close Search">&times;</span>
  <!-- Modal Content -->
  <form class="modal-content animate" method="post" action="cari.php">
    <div class="container">
      <input type="text" placeholder="Masukan Principle Id" name="txtCari" required>
      <button style="color: #fff" class="btn btn-warning" type="submit"><span class="fa fa-search"></span> Search</button>
    </div>
  </form>
</div>

<?php include '../include/footer.php' ?>