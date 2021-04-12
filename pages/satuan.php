<?php 
include '../include/sidebar.php';
?>

<div>
   <h1>Units</h1>
   <a href="form-satuan.php" class="btn btn-success">Add Unit</a>  
</div>

<div class="container" style="overflow-x: auto;">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>No</th>
        <!-- <th>Unit Id</th> -->
        <th>UoM</th>
        <th>Alternate UoM</th>
        <th>Qty</th>
        <th colspan="2"><center>Action</center></th>
      </tr>
    </thead>
    <?php
      include '../include/config.php';
      $no = 1;
      $query="SELECT * FROM t_satuan";
      $hasil=mysqli_query($conn, $query);
      While($row=mysqli_fetch_array ($hasil)){
    ?>
    <tbody>
      <tr>
        <td><?php echo $no++; ?></td>
        <!-- <td><?php echo $row['id_satuan']; ?></td> -->
        <td><?php echo $row['satuan_kecil']; ?></td>
        <td><?php echo $row['satuan_besar']; ?></td>
        <td><?php echo $row['qty']; ?></td>
        <td>
            <center><a href="satuan-edit.php?id_satuan=<?php echo $row['id_satuan'];?>" data-toggle="tooltip" data-placement="right" title="Edit" class="btn btn-custon-rounded-three btn-primary"><i class="fa fa-pencil"></i></a>
            <a href="../model/act-satuan-delete.php?id_satuan=<?php echo $row['id_satuan'];?>" onclick="return confirm('Yakin ingin hapus data?')" class="btn btn-custon-rounded-three btn-danger" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fa fa-trash"></i></a></center>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>

<?php include '../include/footer.php' ?>