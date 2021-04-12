<?php 
include '../include/sidebar.php';
?>

<div>
   <h1>Warehouses</h1>
   <a href="form-gudang.php" class="btn btn-success">Add Warehouse</a>  
</div>

<div class="container" style="overflow-x: auto;">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Warehouse Id</th>
        <th>Warehouse Name</th>
        <th colspan="2"><center>Action</center></th>
      </tr>
    </thead>
    <?php
      include '../include/config.php';
      $no = 1;
      $query="SELECT * FROM t_gudang";
      $hasil=mysqli_query($conn, $query);
      While($row=mysqli_fetch_array ($hasil)){
    ?>
    <tbody>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['id_gudang']; ?></td>
        <td><?php echo $row['nama_gudang']; ?></td>
        <td>
            <center><a href="gudang-edit.php?id_gudang=<?php echo $row['id_gudang'];?>" data-toggle="tooltip" data-placement="right" title="Edit" class="btn btn-custon-rounded-three btn-primary"><i class="fa fa-pencil"></i></a>
            <a href="../model/act-gudang-delete.php?id_gudang=<?php echo $row['id_gudang'];?>" onclick="return confirm('Yakin ingin hapus data?')" class="btn btn-custon-rounded-three btn-danger" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fa fa-trash"></i></a></center>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>

<?php include '../include/footer.php' ?>