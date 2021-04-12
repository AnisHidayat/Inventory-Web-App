<?php 
	// created by Anis Hidayat
	include '../include/config.php';
	$satuan_kecil = $_POST['txtSatuanKecil'];
	$satuan_besar = $_POST['txtSatuanBesar'];
	$qty = $_POST['txtQty'];

	$cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_satuan WHERE satuan_kecil = '$satuan_kecil' AND satuan_besar = '$satuan_besar' AND qty = '$qty'"));   
    if ($cek > 0) {
		echo "<script>alert('Maaf... Data sudah ada');window.location = '../pages/form-satuan.php'</script>";
	}else{
		$query = mysqli_query($conn, "INSERT INTO t_satuan (satuan_kecil, satuan_besar, qty) VALUES ('$satuan_kecil', '$satuan_besar', '$qty')") or die (mysqli_error($conn));

		if ($conn->affected_rows > 0){
			echo "<script>alert('Data berhasil disimpan');window.location = '../pages/satuan.php'</script>";
		}else{
			echo "<script>alert('Data gagal disimpan');window.location = '../pages/form-satuan.php'</script>";
		}
	}

?>