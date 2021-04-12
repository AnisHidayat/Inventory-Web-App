<?php 
	// created by Anis Hidayat
	include ('../include/config.php');
	$id_gudang = $_POST['txtId'];
	$nama = $_POST['txtNama'];

	$SQLexec = mysqli_query($conn, "UPDATE t_gudang SET id_gudang = '$id_gudang', nama_gudang = '$nama' WHERE id_gudang = '$id_gudang'") or die (mysqli_error($conn));

	if ($conn->affected_rows > 0) {
		echo "<script>alert('Data berhasil di Update');window.location = '../pages/gudang.php?'</script>";
	}else{
		echo "<script>alert('Data gagal di Update');window.location = '../pages/gudang-edit.php'</script>";
	}

?>
