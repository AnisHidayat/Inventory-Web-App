<?php 
include '../include/sidebar.php';
?>

<h1>User Form</h1>

<div class="container">
  <form method="POST" action="../model/act-user-add.php">
    <div class="row">
      <div class="col-25">
        <label for="fname">User Id</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="txtId" autofocus="" placeholder="Your User Id..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">NIP</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="txtNip" placeholder="Your NIP..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="txtNama" placeholder="Your Name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">User Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="txtUserName" placeholder="Your User Name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Password</label>
      </div>
      <div class="col-75">
        <input type="Password" style="height: 50px" id="lname" name="txtPass" placeholder=" Your Password..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Authorization</label>
      </div>
      <div class="col-75">
        <!-- <input type="text" id="lname" name="txtOto" placeholder="Your User Name.."> -->
        <select type="select" name="txtOto">
            <option value="user">User</option>
            <option value="admin">Admin</option>
            <option value="manajer">Manager</option>
        </select>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>