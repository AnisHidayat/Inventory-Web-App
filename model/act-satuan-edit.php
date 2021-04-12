<?php 
	// created by Anis Hidayat
	include '../include/config.php';

	$id_satuan = $_POST['txtId'];
	$satuan_kecil = $_POST['txtSatuanKecil'];
	$satuan_besar = $_POST['txtSatuanBesar'];
	$qty = $_POST['txtQty'];

	$query = mysqli_query($conn, "UPDATE t_satuan SET id_satuan = '$id_satuan', satuan_kecil = '$satuan_kecil', satuan_besar = '$satuan_besar', qty = $qty WHERE id_satuan = '$id_satuan'") or die (mysqli_error($conn));


	if ($conn->affected_rows > 0) {
		echo "<script>alert('Data berhasil di Update');window.location = '../pages/satuan.php?'</script>";
	}else{
		echo "<script>alert('Data gagal di Update');window.location = '../pages/satuan-edit.php'</script>";
	}

?>
