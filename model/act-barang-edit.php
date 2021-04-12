<?php 
	// created by Anis Hidayat
	include ('../include/config.php'); // coding ori udah oke

	$id_barang = $_POST['txtProductId'];
	$id_principle = $_POST['txtPrincipleId']; 
	$nama = $_POST['txtNama'];
	$nama_grup = $_POST['txtGrup'];
	$satuan_kecil = $_POST['txtSatuanKecil'];
	$satuan_besar = $_POST['txtSatuanBesar'];

	$cek  = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_produk_grup WHERE nama_grup = '$nama_grup'"));
    $cek1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_satuan WHERE satuan_kecil = '$satuan_kecil'"));
    $cek2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_satuan WHERE satuan_besar = '$satuan_besar'"));

    if ($cek != 1) {
		echo "<script>alert('Gagal mengubah data. Karena nama produk grup belum dipilih');window.location = '../pages/barang.php'</script>";
	}elseif ($cek1 != 1) {
		echo "<script>alert('Gagal mengubah data. Karena satuan kecil belum dipilih');window.location = '../pages/barang.php'</script>";
	}elseif ($cek2 != 1) {
		echo "<script>alert('Gagal mengubah data. Karena satuan besar belum dipilih');window.location = '../pages/barang.php'</script>";
	}else{
	$SQLexec = mysqli_query($conn, "UPDATE t_barang SET id_barang = '$id_barang', id_principle = '$id_principle', nama_barang = '$nama', nama_grup = '$nama_grup', satuan_kecil = '$satuan_kecil', satuan_besar = '$satuan_besar' WHERE id_barang = '$id_barang'") or die (mysqli_error($conn));
		if ($conn->affected_rows > 0) {
			echo "<script>alert('Data berhasil di Update');window.location = '../pages/barang.php?'</script>";
		}else{
			echo "<script>alert('Tidak ada perubahan data');window.location = '../pages/barang.php'</script>";
		}
	}
?>
  
