<?php 
	// created by Anis Hidayat
	include '../include/config.php';

	$id_user = $_POST['txtId'];
	$nip = $_POST['txtNip'];
	$nama = $_POST['txtNama'];
	$user_name = $_POST['txtUserName'];
	$pass = $_POST['txtPass'];
	$oto = $_POST['txtOto'];

	$cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_user WHERE nama = '$nama'"));
	$cek1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_user WHERE nip = '$nip'"));
    $cek2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_user WHERE id_user = '$id_user'"));
    
    if ($cek > 0) {
		echo "<script>alert('Maaf... nama sudah ada');window.location = '../pages/form-user.php'</script>";
	}elseif ($cek1 > 0) {
		echo "<script>alert('NIP sudah digunakan !');window.location = '../pages/form-user.php'</script>";
	}elseif ($cek2 > 0) {
		echo "<script>alert('Id User sudah digunakan !');window.location = '../pages/form-user.php'</script>";
	}else{
		$query = mysqli_query($conn, "INSERT INTO t_user (id_user, nip, nama, pass, user_name, otorisasi) VALUES ('$id_user', $nip, '$nama', '$pass', '$user_name', '$oto')") or die (mysqli_error($conn));

		if ($conn->affected_rows > 0){
			echo "<script>alert('Data berhasil disimpan');window.location = '../pages/user.php'</script>";
		}else{
			echo "<script>alert('Data gagal disimpan');window.location = '../pages/form-user.php'</script>";
		}
	}

?>