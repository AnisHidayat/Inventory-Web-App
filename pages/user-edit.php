<?php 
	  include '../include/sidebar.php';
    include '../include/config.php';

    $SQLexec = "SELECT * FROM t_user WHERE id_user = '$_GET[id_user]'";
    $query = mysqli_query($conn, $SQLexec) or die ("query salah");
    $row = mysqli_fetch_array($query);
?>

<h1>User Form (Edit)</h1>

<div class="container">
  <form method="POST" action="../model/act-user-edit.php">
    <div class="row">
      <div class="col-25">
        <label for="fname">User Id</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="txtId" value="<?php echo $row['id_user'];?>" readonly="">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">NIP</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="txtNip" value="<?php echo $row['nip'];?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="txtNama" value="<?php echo $row['nama'];?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">User Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="txtUserName" value="<?php echo $row['user_name'];?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Password</label>
      </div>
      <div class="col-75">
        <input type="Password" style="height: 50px" id="lname" name="txtPass" value="<?php echo $row['pass'];?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Authorization</label>
      </div>
      <div class="col-75">
        <select type="select" name="txtOto">
            <option value="user">User</option>
            <option value="admin">Admin</option>
            <option value="manajer">Manager</option>
        </select>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Update">
    </div>
  </form>
</div>