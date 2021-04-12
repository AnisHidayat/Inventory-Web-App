<?php
//ini coding insert dengan menggunakan jquery, file ada di folder pages
$connect = mysqli_connect("localhost", "root", "", "db_inventory");
if(isset($_POST["qty_so"])){
	$qty_so = mysqli_real_escape_string($connect, $_POST["qty_so"]);
	$query = "INSERT INTO t_item_balance(qty_so) VALUES('$qty_so')";
	if(mysqli_query($connect, $query)){
	 echo 'Data Inserted';
	}
}
?>