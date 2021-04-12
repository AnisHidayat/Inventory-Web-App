<?php 
	// created by Anis Hidayat
	include '../include/config.php';
	$id_gudang = $_POST['txtId'];
	$nama_gudang = $_POST['txtNama'];

	$cek1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_gudang WHERE nama_gudang = '$nama_gudang'"));
    $cek2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_gudang WHERE id_gudang = '$id_gudang'"));
    
    if ($cek1 > 0) {
		echo "<script>alert('Maaf... Data sudah ada');window.location = '../pages/form-gudang.php'</script>";
	}elseif ($cek2 > 0) {
		echo "<script>alert('Id gudang sudah digunakan !');window.location = '../pages/form-gudang.php'</script>";
	}else{
		$query = "INSERT INTO t_gudang (id_gudang, nama_gudang) VALUES ('$id_gudang', '$nama_gudang')";
		$exec = mysqli_query($conn, $query) or die (mysqli_error($conn));

		if ($conn->affected_rows > 0){
			echo "<script>alert('Data berhasil disimpan');window.location = '../pages/gudang.php'</script>";
		}else{
			echo "<script>alert('Data gagal disimpan');window.location = '../pages/form-gudang.php'</script>";
		}
	}

?>