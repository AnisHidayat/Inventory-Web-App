<?php 
include '../include/sidebar.php';
?>

<script type="text/javascript" src="../bootstrap/js/style.js"></script>

<style type="text/css">
    
  /* Full-width input fields */

  span.psw {
    float: right;
    padding-top: 16px;
  }

  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 50%;
    top: 0;
    width: 50%; /* Full width */
    height: 50%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
  }

  /* Modal Content/Box */
  .modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
  }

  /* The Close Button (x) */
  .close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: red;
    cursor: pointer;
  }

  /* Add Zoom Animation */
  .animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
  }

  @-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
  }
    
  @keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
  }

  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
  }
</style>

<div>
   <h1>Products</h1>
    <a href="form-barang.php" class="btn btn-success">Add Product</a> 
  <!--  <a href="form-grup-barang.php" class="btn btn-info">Add Group Product</a>  -->
    <button onclick="document.getElementById('addGroup').style.display='block'" class="btn btn-info">Add Group Product</button> 
    <input style="width: 235px; height: 40px; float: right;" class="form-margin" autofocus="" type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari nama produk..." title="Ketikkan nama produk disini">

</div>

<div class="container" style="overflow-x: auto;">
  <!-- <table id="myTable" class="table table-hover"> -->
  <table class="table table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Product Id</th>
        <th>Product Id Principle</th>
        <th>Product Name</th>
        <th>Product Group</th>
        <th>UoM</th>
        <th>Alternate UoM</th>
        <th colspan="2"><center>Action</center></th>
      </tr>
    </thead>
    <?php
      include '../include/config.php';
   
      $halaman = 10;
      $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
      $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
      $result = mysqli_query($conn, "SELECT * FROM t_barang");
      $total = mysqli_num_rows($result);
      $pages = ceil($total/$halaman);
      $query = mysqli_query($conn,"SELECT * FROM t_barang LIMIT $mulai, $halaman")or die(mysqli_error);
      $no = $mulai+1;
      While($row=mysqli_fetch_array ($query)){
    ?>
    <tbody id="myTable">
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['id_barang']; ?></td>
        <td><?php echo $row['id_principle']; ?></td>
        <td><?php echo $row['nama_barang']; ?></td>
        <td><?php echo $row['nama_grup']; ?></td>
        <td><?php echo $row['satuan_kecil']; ?></td>
        <td><?php echo $row['satuan_besar']; ?></td>
        <td>
            <center><a href="barang-edit.php?id_barang=<?php echo $row['id_barang'];?>" data-toggle="tooltip" data-placement="right" title="Edit" class="btn btn-custon-rounded-three btn-primary"><i class="fa fa-pencil"></i></a>
            <a href="../model/act-barang-delete.php?id_barang=<?php echo $row['id_barang'];?>" onclick="return confirm('Yakin ingin hapus data?')" class="btn btn-custon-rounded-three btn-danger" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fa fa-trash"></i></a></center>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
   <div class="paginaton pagination-sm">
     Halaman &nbsp;<?php for ($i=1; $i<=$pages ; $i++){ ?>
        <a href="?halaman=<?php echo  $i;  ?>"><?php echo $i; ?> &nbsp; &nbsp;</a>
      <?php } 
      include '../include/config.php';
         $sql = mysqli_query($conn, "SELECT * FROM t_barang");
         $count = mysqli_num_rows($sql);
      ?>
        <p style="float: right;">Total : <?php echo $count; ?> products</p>
    </div>
</div>
 
<!-- Modal add product grup nih -->
<div id="addGroup" class="modal">
  <form class="modal-content animate" action="../model/act-grup-add.php" method="post">
  <!-- <form class="modal-content animate" action="proses-cari.php" method="post"> -->
    <div class="imgcontainer">
      <span onclick="document.getElementById('addGroup').style.display='none'" class="close" title="Close">&times;</span>
    </div>
    <div class="container">
      <label><h3> Add Product Group</h3></label><br/>
      <div class="row">
        <div class="col-75">
          <input type="text" name="txtNamaGrup" placeholder="Your group name..">
        </div>
        &nbsp;<input type="submit" value="Add">
      </div>
      <div style="overflow-x: auto; ">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Product Name Group</th>
              <th colspan="2"><center>Action</center></th>
            </tr>
          </thead>
          <?php
            include '../include/config.php';
         
            $no = 1;
            $query = mysqli_query($conn,"SELECT * FROM t_produk_grup")or die(mysqli_error);
            While($row=mysqli_fetch_array ($query)){
          ?>
          <tbody id="myTable">
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row['nama_grup']; ?></td>
              <td>
                <center>
                  <a href="../model/act-grup-delete.php?id_produk_grup=<?php echo $row['id_produk_grup'];?>" onclick="return confirm('Yakin ingin hapus data?')" class="btn btn-custon-rounded-three btn-danger" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fa fa-trash"></i></a>
                </center>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </form>
</div>

<?php include '../include/footer.php' ?>