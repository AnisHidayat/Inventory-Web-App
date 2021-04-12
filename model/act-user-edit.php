<?php 
	// created by Anis Hidayat
	include '../include/config.php';

	$id_user = $_POST['txtId'];
	$nip = $_POST['txtNip'];
	$nama = $_POST['txtNama'];
	$user_name = $_POST['txtUserName'];
	$pass = $_POST['txtPass'];
	$oto = $_POST['txtOto'];

	$query = mysqli_query($conn, "UPDATE t_user SET id_user = '$id_user', nip = '$nip', nama = '$nama', pass = '$pass', user_name = '$user_name',  otorisasi = '$oto' WHERE id_user = '$id_user'") or die (mysqli_error($conn));

	if ($conn->affected_rows > 0) {
		echo "<script>alert('Data berhasil di Update');window.location = '../pages/user.php?'</script>";
	}else{
		echo "<script>alert('Data gagal di Update');window.location = '../pages/user-edit.php'</script>";
	}

?>