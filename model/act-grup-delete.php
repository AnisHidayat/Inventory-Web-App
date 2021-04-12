<?php 
	// created by Anis Hidayat
	include ('../include/config.php');

	$id_produk_grup = $_GET['id_produk_grup'];
	$SQLexec = mysqli_query($conn, "DELETE FROM t_produk_grup WHERE id_produk_grup = '$id_produk_grup'");
	if ($conn->affected_rows > 0) {
		echo "<script>alert('Data berhasil di Hapus');window.location = '../pages/barang.php?'</script>";
	}else{
		echo "<script>alert('Data gagal di Hapus');window.location = '../pages/barang.php'</script>";
	}

?>