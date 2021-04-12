<?php 
	include '../include/config.php';
	// $qty_so = $_POST['txtSo'];
	$qty_so = $_POST['txtSo'] || 0;
	$id_transaksi = $_POST['txtIdTransaksi'];

	$query = mysqli_query($conn, "SELECT * FROM t_item_balance WHERE id_transaksi = '$id_transaksi'");
    $stok = mysqli_fetch_array($query);
    $qty_awal = $stok['qty'];
    //if (is_numeric($stok['qty']) && is_numeric($qty_so)) {
    echo $qty_so;
    	$selisih = $qty_awal - (int)$qty_so;
		$update = mysqli_query($conn, "UPDATE t_item_balance SET qty_so = '$qty_so', selisih = '$selisih' WHERE id_transaksi = '$id_transaksi'");
		if($update){
			echo 'Data berhasil disimpan!';
			echo $qty_awal; 
			// echo $selisih;
		}else{
			echo 'Gagal menyimpan data!';
		}
	// }else{
	// 	echo "error !";
	// }
?>