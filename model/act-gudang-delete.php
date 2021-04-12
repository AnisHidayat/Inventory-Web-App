<?php 
	// created by Anis Hidayat
	include ('../include/config.php');
	$id_gudang = $_GET['id_gudang'];
	$SQLexec = mysqli_query($conn,  "DELETE FROM t_gudang WHERE id_gudang = '$id_gudang'");
	
	if ($conn->affected_rows > 0) {
		echo "<script>alert('Data berhasil di Hapus');window.location = '../pages/gudang.php?'</script>";
	}else{
		echo "<script>alert('Data gagal di Hapus');window.location = '../pages/gudang.php'</script>";
	}

?>
