<?php 
include '../include/sidebar.php';
?>

<div>
   <h1>Locations</h1>
   <a href="form-lokasi.php" class="btn btn-success">Add Location</a>  
</div>

<div class="container" style="overflow-x: auto;">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Location Id</th>
        <th>Location Name</th>
        <th colspan="2"><center>Action</center></th>
      </tr>
    </thead>
    <?php
      include '../include/config.php';
      $no = 1;
      $query="SELECT * FROM t_lokasi";
      $hasil=mysqli_query($conn, $query);
      While($row=mysqli_fetch_array ($hasil)){
    ?>
    <tbody>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['id_lokasi']; ?></td>
        <td><?php echo $row['nama_lokasi']; ?></td>
        <td>
            <center><a href="lokasi-edit.php?id_lokasi=<?php echo $row['id_lokasi'];?>" data-toggle="tooltip" data-placement="right" title="Edit" class="btn btn-custon-rounded-three btn-primary"><i class="fa fa-pencil"></i></a>
            <a href="../model/act-lokasi-delete.php?id_lokasi=<?php echo $row['id_lokasi'];?>" onclick="return confirm('Yakin ingin hapus data?')" class="btn btn-custon-rounded-three btn-danger" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fa fa-trash"></i></a></center>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>

<?php include '../include/footer.php' ?>