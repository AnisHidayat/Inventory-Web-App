<?php 
	// created by Anis Hidayat
	include '../include/config.php';

	$id_lokasi = $_POST['txtId'];
	$nama_lokasi = $_POST['txtNama'];

	$cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_lokasi WHERE nama_lokasi = '$nama_lokasi'"));
    $cek2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_lokasi WHERE id_lokasi = '$id_lokasi'"));
    
    if ($cek > 0) {
		echo "<script>alert('Maaf... Data sudah ada');window.location = '../pages/form-lokasi.php'</script>";
	}elseif ($cek2 > 0) {
		echo "<script>alert('Id gudang sudah digunakan !');window.location = '../pages/form-lokasi.php'</script>";
	}else{
		$query = "INSERT INTO t_lokasi (id_lokasi, nama_lokasi) VALUES ('$id_lokasi', '$nama_lokasi')";
		$exec = mysqli_query($conn, $query) or die (mysqli_error($conn));

		if ($conn->affected_rows > 0){
			echo "<script>alert('Data berhasil disimpan');window.location = '../pages/lokasi.php'</script>";
		}else{
			echo "<script>alert('Data gagal disimpan');window.location = '../pages/form-lokasi.php'</script>";
		}
	}

?>