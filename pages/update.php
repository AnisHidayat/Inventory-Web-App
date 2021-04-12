<?php 
	include '../include/config.php';
	if(isset($_POST["id"])){
		$value  = mysqli_real_escape_string($conn, $_POST["value"]);

		$cek_stok = mysqli_query($conn, "SELECT * FROM t_item_balance WHERE id_transaksi = '".$_POST["id"]."'");
	    $stok = mysqli_fetch_array($cek_stok);
	    $qty_awal = $stok['qty'];

	    //menghitung sisa stok
	    $total = $qty_awal - $value;
		$query  = "UPDATE t_item_balance SET ".$_POST["column_name"]."='".$value."', selisih = '$total' WHERE id_transaksi = '".$_POST["id"]."'";
		if(mysqli_query($conn, $query)){
		 echo 'Data Updated';
		}
	}
?>