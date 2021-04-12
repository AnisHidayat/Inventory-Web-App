<?php 
	// created by Anis Hidayat
	include ('../include/config.php');
	$id_lokasi = $_POST['txtId'];
	$nama = $_POST['txtNama'];

	$SQLexec = mysqli_query($conn, "UPDATE t_lokasi SET id_lokasi = '$id_lokasi', nama_lokasi = '$nama' WHERE id_lokasi = '$id_lokasi'") or die (mysqli_error($conn));
	
	if ($conn->affected_rows > 0) {
		echo "<script>alert('Data berhasil di Update');window.location = '../pages/lokasi.php?'</script>";
	}else{
		echo "<script>alert('Data gagal di Update');window.location = '../pages/lokasi-edit.php'</script>";
	}

?>
