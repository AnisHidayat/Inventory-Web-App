<?php 
include '../include/sidebar.php';
?>
<style type="text/css">
    
  /* Full-width input fields */
  input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }

  span.psw {
    float: right;
    padding-top: 16px;
  }

  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
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
    .cancelbtn {
       width: 100%;
    }
  }
</style>
<div>
   <h1>History Data</h1> 
</div>
<div class="container" style="overflow-x: auto;">
  <button onclick="document.getElementById('search').style.display='block'" class="btn btn-primary">Advanced Search</button>
  <input style="width: 235px; height: 40px; float: right;" class="form-margin" autofocus="" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search here..." title="Ketikkan pencarian disini">

  <table class="table table-hover">
      <tr>
        <th>No</th>
        <th style="width: 270px">Date</th>
        <th>Time</th>
        <th>Warehouse</th>
        <th>Location</th>
        <th>Rack</th>
        <th style="width: 305px">Product</th>
        <th>Initial Qty</th>
        <th>Qty In</th>
        <th>Qty Out</th>
        <th>Qty Balance</th>
        <th>User</th>
        <!-- <th colspan="2"><center>Action</center></th> -->
      </tr>
    </thead>
    <?php
      include '../include/config.php';
     
      $halaman = 10;
      $page    = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
      $mulai   = ($page>1) ? ($page * $halaman) - $halaman : 0;
      $result  = mysqli_query($conn, "SELECT * FROM t_history");
      $total   = mysqli_num_rows($result);
      $pages   = ceil($total/$halaman);
      $query   = mysqli_query($conn,"SELECT * FROM t_history ORDER BY tanggal DESC LIMIT $mulai, $halaman ")or die(mysqli_error($conn));
      $no = $mulai+1;

      // $SQLexec = mysqli_query($conn, "SELECT t_barang.nama_barang, t_gudang.nama_gudang, t_lokasi.nama_lokasi, t_user.user_name
      // FROM t_user JOIN (t_barang JOIN (t_gudang JOIN (t_lokasi JOIN t_history ON t_lokasi.id_lokasi = t_history.id_lokasi) ON t_gudang.id_gudang = t_history.id_gudang) ON t_barang.id_barang = t_history.id_barang) ON t_user.id_user = t_history.id_user");

      //$row1 = mysqli_fetch_array($SQLexec);
      While($row = mysqli_fetch_array($query)){
    ?>
    <tbody id="myTable">
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['tanggal']; ?></td>
        <td><?php echo $row['jam']; ?></td>
        <td><?php echo $row['nama_gudang']; ?></td>
        <td><?php echo $row['nama_lokasi']; ?></td>
        <td><?php echo $row['rak']; ?></td>
        <td><?php echo $row['nama_barang']; ?></td>
        <td><?php echo $row['qty_awal']; ?></td>
        <td><?php echo $row['qty_in']; ?></td>
        <td><?php echo $row['qty_out']; ?></td>
        <td><?php echo $row['qty_ahir']; ?></td>
        <td><?php echo $row['user']; ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
    <div class="">
     Halaman &nbsp;<?php for ($i=1; $i<=$pages; $i++){ ?>
        <a href="?halaman=<?php echo  $i;  ?>"><?php echo $i; ?> &nbsp; &nbsp;</a>
      <?php } 
         include '../include/config.php';
         $sql = mysqli_query($conn, "SELECT * FROM t_history");
         $count = mysqli_num_rows($sql);
      ?>
        <p style="float: right;">Total : <?php echo $count; ?> History data</p>
    </div>
</div>

<div id="search" class="modal">
  <form class="modal-content animate" action="advanced-search.php" method="get">
  <!-- <form class="modal-content animate" action="proses-cari.php" method="post"> -->
    <div class="imgcontainer">
      <span onclick="document.getElementById('search').style.display='none'" class="close" title="Close">&times;</span>
    </div>
    <div class="container">
      <label><h3>Search</h3></label><br/>
      <div class="row">
        <div class="col-25">
          <label for="lname">Warehaouse Name</label>
        </div>
        <div class="col-75">
          <select style="height: 50" name="txtNamaGudang" class="custom-select">
          <?php 
            include '../include/config.php';
            $query = mysqli_query($conn, "SELECT * FROM t_gudang");
            While($row = mysqli_fetch_array($query)) {
          ?>
            <option value="<?php echo $row['nama_gudang'];?>"><?php echo $row['nama_gudang'];?></option>
          <?php
            }
          ?>
        </select>
        </div>
      </div>
       <div class="row">
        <div class="col-25">
          <label for="lname">Location Name</label>
        </div>
        <div class="col-75">
          <select style="height: 50" name="txtNamaLokasi" class="custom-select">
            <?php
              include '../include/config.php';
              $query = mysqli_query($conn, "SELECT * FROM t_lokasi");
              While($row = mysqli_fetch_array($query)) { ?>
                <option value="<?php echo $row['nama_lokasi'];?>"><?php echo $row['nama_lokasi']; ?></option>
              <?php } ?>
          </select>
        </div>
      </div>
       <div class="row">
        <div class="col-25">
          <label for="lname">Rack</label>
        </div>
        <div class="col-75">
          <input type="text" name="txtNamaRak" placeholder="Your Rack..">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Product Id</label>
        </div>
        <div class="col-75">
          <input type="text" name="txtIdBarang" placeholder="Your Product Id..">
        </div>
      <input type="submit" value="Cari">
      </div>
    </div>
  </form>
</div>

<script type="text/javascript">
  // script cari berdasarkan nama
//   function myFunction() {
//   var input, filter, table, tr, td, i, txtValue;
//   input = document.getElementById("myInput");
//   filter = input.value.toUpperCase();
//   table = document.getElementById("myTable");
//   tr = table.getElementsByTagName("tr");
//   for (i = 0; i < tr.length; i++) {
//     td = tr[i].getElementsByTagName("td")[6];
//     if (td) {
//       txtValue = td.textContent || td.innerText;
//       if (txtValue.toUpperCase().indexOf(filter) > -1) {
//         tr[i].style.display = "";
//       } else {
//         tr[i].style.display = "none";
//       }
//     }       
//   }
// }

  // script cari berdasarkan apapun di tabel
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

// panggil modal search
var modal = document.getElementById('search');

// saat user melakukan klik di area manapun, tutup modal search
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<?php include '../include/footer.php' ?>