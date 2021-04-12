<?php 
include '../include/sidebar.php';
?>
<div>
   <h1>Users</h1>
   <a href="form-user.php" class="btn btn-success">Add User</a>  
</div>

<div class="container" style="overflow-x: auto;">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>User Id</th>
        <th>NIP</th>
        <th>Name</th>
        <th>User Name</th>
        <th>Otorisasi</th>
        <th colspan="2"><center>Action</center></th>
      </tr>
    </thead>
    <?php
      include '../include/config.php';
      $no = 1;
      $query="SELECT * FROM t_user";
      $hasil=mysqli_query($conn, $query);
      While($row=mysqli_fetch_array ($hasil)){
    ?>
    <tbody>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['id_user']; ?></td>
        <td><?php echo $row['nip']; ?></td>
        <td><?php echo $row['nama']; ?></td>
        <td><?php echo $row['user_name']; ?></td>
        <td><?php echo $row['otorisasi']; ?></td>
        <td>
            <center><a href="user-edit.php?id_user=<?php echo $row['id_user'];?>" data-toggle="tooltip" data-placement="right" title="Edit" class="btn btn-custon-rounded-three btn-primary"><i class="fa fa-pencil"></i></a>
            <a href="../model/act-user-delete.php?id_user=<?php echo $row['id_user'];?>" onclick="return confirm('Yakin ingin hapus data?')" class="btn btn-custon-rounded-three btn-danger" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fa fa-trash"></i></a></center>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>

<?php include '../include/footer.php' ?>