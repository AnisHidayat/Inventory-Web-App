<?php
	// created by Anis Hidayat
	include '../include/config.php';
	$nama_grup = $_POST['txtNamaGrup'];

    $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_produk_grup WHERE nama_grup = '$nama_grup'"));
    if ($cek > 0) {
		echo "<script>alert('Maaf... Data sudah ada');window.location = '../pages/barang.php'</script>";
	}else{		
	    $insert = mysqli_query($conn, "INSERT INTO t_produk_grup (nama_grup) VALUES ('$nama_grup')") or die (mysqli_error($conn));
		if ($conn->affected_rows > 0){
			echo "<script>alert('Data berhasil ditambahkan');window.location = '../pages/barang.php'</script>";
		}else{
			echo "<script>alert('Data gagal ditambahkan');window.location = '../pages/barang.php'</script>";
		}
	}

?>