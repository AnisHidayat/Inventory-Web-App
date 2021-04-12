<?php 
	// created by Anis Hidayat
	include ('../include/config.php');
	$id_satuan = $_GET['id_satuan'];
	$SQLexec = mysqli_query($conn, "DELETE FROM t_satuan WHERE id_satuan = '$id_satuan'") or die (mysqli_error($conn));
	
	if ($conn->affected_rows > 0) {
		echo "<script>alert('Data berhasil di Hapus');window.location = '../pages/satuan.php?'</script>";
	}else{
		echo "<script>alert('Data gagal di Hapus');window.location = '../pages/satuan.php'</script>";
	}

?>
