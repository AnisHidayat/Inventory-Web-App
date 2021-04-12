<?php 
	// created by Anis Hidayat
	include ('../include/config.php');

	$id_barang = $_GET['id_barang'];
	$SQLexec = "DELETE FROM t_barang WHERE id_barang = '$id_barang'";
	$query = mysqli_query($conn, $SQLexec);
	
	if ($conn->affected_rows > 0) {
		echo "<script>alert('Data berhasil di Hapus');window.location = '../pages/barang.php?'</script>";
	}else{
		echo "<script>alert('Data gagal di Hapus');window.location = '../pages/barang.php'</script>";
	}

?>