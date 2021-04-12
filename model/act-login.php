<?php 
// created by Anis Hidayat
session_start();
include "../include/config.php";

$user_name = $_POST ['txtUserName'];
$psw = $_POST ['txtPass'];
$op = $_GET['op'];
	if ($op == "in") {
		$cek = mysqli_query($conn, "SELECT * FROM t_user WHERE user_name = '$user_name' AND pass = '$psw'");
		if (mysqli_num_rows($cek) === 1) {
			$cek2 = mysqli_fetch_array($cek);
			$_SESSION['id_user'] = $cek2['id_user'];
			$_SESSION['user_name'] = $cek2['user_name'];
			$_SESSION['otorisasi'] = $cek2['otorisasi'];
			// if ($cek2 ['otorisasi'] == "admin") {
			// 	header("location:../pages/home.php");
			// }else if ($cek2['otorisasi'] == "user") {
			// 	header("location:../pages/home.php");
			// }
			echo "<script>alert('Login berhasil .');window.location = '../pages/home.php?'</script>";
			
		}else{
			echo "<script>alert('Maaf... Username atau Password anda salah.');window.location = '../index.php?'</script>";
		}
	}else if ($op == "out") {
		unset($_SESSION['user_name']);
		unset($_SESSION['otorisasi']);
		header("location:../index.php");
	}
?>