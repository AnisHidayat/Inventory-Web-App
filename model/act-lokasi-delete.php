<?php 
	// created by Anis Hidayat
	include ('../include/config.php');

	$id_lokasi = $_GET['id_lokasi'];
	$SQLexec = mysqli_query($conn, "DELETE FROM t_lokasi WHERE id_lokasi = '$id_lokasi'");

	if ($conn->affected_rows > 0) {
		echo "<script>alert('Data berhasil di Hapus');window.location = '../pages/lokasi.php?'</script>";
	}else{
		echo "<script>alert('Data gagal di Hapus');window.location = '../pages/lokasi.php'</script>";
	}

?>
