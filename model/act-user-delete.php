<?php 
	// created by Anis Hidayat	
	include ('../include/config.php');

	$id_user = $_GET['id_user'];
	$SQLexec = mysqli_query($conn, "DELETE FROM t_user WHERE id_user = '$id_user'");
	
	if ($conn->affected_rows > 0) {
		echo "<script>alert('Data berhasil di Hapus');window.location = '../pages/user.php?'</script>";
	}else{
		echo "<script>alert('Data gagal di Hapus');window.location = '../pages/user.php'</script>";
	}

?>
