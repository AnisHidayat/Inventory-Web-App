<?php 
	// created by Anis Hidayat
	include '../include/config.php';

	date_default_timezone_set('Asia/jakarta');
	$tanggal      = date("Y-m-d");
	$jam          = date("H:i");
	$id_transaksi = $_POST['txtIdTransaksi'];
	$id_barang    = $_POST['txtIdBarang'];
	$qty_out      = $_POST['txtQty'];
	$nama_barang  = $_POST['txtBarang'];
	$nama_gudang  = $_POST['txtGudang'];
	$nama_lokasi  = $_POST['txtLokasi'];
	$rak          = $_POST['txtRak'];
	$user         = $_POST['txtIdUser'];

	$cek_stok     = mysqli_query($conn, "SELECT * FROM t_item_balance where id_transaksi='$id_transaksi'");
	$res_cek_stok = mysqli_fetch_array($cek_stok);
	$stok_barang  = $res_cek_stok['qty'];

	if($stok_barang < $qty_out){
		echo "<script>alert('Maaf Stok Barang tidak mencukupi, Mohon cek Stok Barang yang tersedia dan coba kembali');window.location = '../pages/transaksi.php'</script>";
	}else{
	    $query = mysqli_query($conn, "SELECT * FROM t_item_balance WHERE id_transaksi = '$id_transaksi'");
	    $stok = mysqli_fetch_array($query);
	    $qty_awal = $stok['qty'];
	    //menghitung sisa stok

	    $total = $qty_awal - $qty_out;

	    $upstok= mysqli_query($conn, "UPDATE t_item_balance SET qty = '$total' WHERE id_transaksi = '$id_transaksi'");
	    
	    //proses    
	    $insert = mysqli_query($conn, "INSERT INTO t_history (id_barang, tanggal, jam, nama_gudang, nama_lokasi, rak, nama_barang, qty_awal, qty_out, qty_ahir, user) VALUES ('$id_barang', '$tanggal', '$jam', '$nama_gudang', '$nama_lokasi', '$rak', '$nama_barang', '$qty_awal', '$qty_out', '$total', '$user')");
	    
		if ($conn->affected_rows > 0){
			echo "<script>alert('Transaksi sukses');window.location = '../pages/transaksi.php'</script>";
		}else{
			echo "<script>alert('Transaksi gagal');window.location = '../pages/form-transaksi-out.php'</script>";
		}
	}

?>