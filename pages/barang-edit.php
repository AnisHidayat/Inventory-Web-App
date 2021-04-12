<?php 
  include '../include/sidebar.php';
  include '../include/config.php';

  $SQLexec =  mysqli_query($conn, "SELECT * FROM t_barang WHERE id_barang = '$_GET[id_barang]'") or die ("query salah");
  $row = mysqli_fetch_array($SQLexec);
?>

<link href="../bootstrap/js/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="../bootstrap/js/jquery-ui.js"></script>

<script type="text/javascript"> //ini untuk autocomplete
  $(function(){
    var data = "../include/data.php";
    $("#auto-complete").autocomplete({
      source: data
    });
  });
</script>

<h1>Product Form (Edit)</h1>

<div class="container">
  <!-- <form method="POST" action="barang-edit.php"> -->
  <form method="POST" action="../model/act-barang-edit.php" name="validasi_form" onsubmit="return validasi_input(this)">

    <div class="row">
      <div class="col-25">
        <label for="fname">Scan by</label>
      </div>
      <div class="col-75">
        <p style="color: blue; margin-top: 15px"><?php echo $row['scan'];?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Product Id</label>
      </div>
      <div class="col-75">
        <input type="text" id="id_barang" name="txtProductId" onchange="checkPass()" value="<?php echo $row['id_barang'];?>" readonly>
        <!-- <input type="text" id="id_barang" name="txtProductId" value=""> -->
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Product Id Principle</label>
      </div>
      <div class="col-75">
        <input type="text" id="id_principle" name="txtPrincipleId" onchange="checkPass()" value="<?php echo $row['id_principle'];?>"> 
        <!-- <input type="text" id="id_principle" name="txtPrincipleId" value=""> -->
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Product Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="txtNama" value="<?php echo $row['nama_barang'];?>" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Product Group</label>
      </div>
      <div class="col-75">
        <!-- <input type="text" id="auto-complete" name="txtGroup" value="<?php echo $row['nama_grup'];?>"> -->
        <select style="height: 50" name="txtGrup" class="custom-select" required>
          <option>-- Choose product group --</option>
          <?php
            $sqlris = mysqli_query($conn, "SELECT * FROM t_produk_grup");
            while($row = mysqli_fetch_array($sqlris)){
              echo "<option value='$row[nama_grup]'>$row[nama_grup]</option>\n";
            }
          ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">UoM</label>
      </div>
      <div class="col-75">
       <select style="height: 50" name="txtSatuanKecil" class="custom-select" required>
        <option>-- Choose UoM --</option>
          <?php
            $sqlris = mysqli_query($conn, "SELECT * FROM t_satuan");
            while($row = mysqli_fetch_array($sqlris)){
              echo "<option value='$row[satuan_kecil]'>$row[satuan_kecil]</option>\n";
            }
          ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Big Unit</label>
      </div>
      <div class="col-75">
        <select style="height: 50" name="txtSatuanBesar" class="custom-select" required>
          <option>-- Choose big unit --</option>
          <?php
            $sqlris = mysqli_query($conn, "SELECT * FROM t_satuan");
            while($row = mysqli_fetch_array($sqlris)){
              echo "<option value='$row[satuan_besar]'>$row[satuan_besar]</option>\n";
            }
          ?>
        </select>
      </div>
    </div>
    <div class="row">
      <input type="submit" name="edit_process" value="update"> 
    </div>
  </form>
</div>
 

<script type="text/javascript">
 //membuat validasi input id barang dan id principle (pencocokan)
 function checkPass() {

    //mengambil object dan dimasukan ke variabel 
    var idBarang = document.getElementById('id_barang');
    var idPrinciple = document.getElementById('id_principle');
    //mengambil object dan dimasukan ke variabel 
    var message = document.getElementById('pesan');
    //inisialisasi warna didalam variabel
    var warnabenar = "#79d279";
    var warnasalah = "#99ddff";
    //membandingkan 2 variabel
    if(idBarang.value != idPrinciple.value){
        //ini ketika id tidak sama
        //ubah warna 
        document.validasi_form.edit_process;
        alert("Id Product berbeda dengan Id Principle.");
        idPrinciple.style.backgroundColor = warnasalah;
        message.style.color = warnasalah;
    }else{
        //ketika id sama 
        //ubah warna  
        //memeberi peringatanya bahwa benar
        document.validasi_form.edit_process.disabled=false;
        idPrinciple.style.backgroundColor = warnabenar;
        message.style.color = warnabenar;
        message.innerHTML = ""
    }
}

</script>