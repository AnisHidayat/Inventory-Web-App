<?php 
	// created by Anis Hidayat
	include '../include/config.php';
	date_default_timezone_set('Asia/jakarta');
	
	$tanggal      = date("Y-m-d");
	$jam          = date("H:i");
	$id_transaksi = $_POST['txtIdTransaksi'];
	$qty_in       = $_POST['txtQty'];
	$nama_barang  = $_POST['txtBarang'];
	$nama_gudang  = $_POST['txtGudang'];
	$nama_lokasi  = $_POST['txtLokasi'];
	$rak          = $_POST['txtRak'];
	$user         = $_POST['txtIdUser'];

	// cari id_barang
    $cari_id   = mysqli_query($conn, "SELECT id_barang FROM t_barang WHERE nama_barang = '$nama_barang'");
    $get_id    = mysqli_fetch_array($cari_id);
    $id_barang = $get_id['id_barang'];
	// cari id_principle
  	$cari_id1     = mysqli_query($conn, "SELECT id_principle FROM t_barang WHERE nama_barang = '$nama_barang'"); 
  	$get_id1      = mysqli_fetch_array($cari_id1);
    $id_principle = $get_id1['id_principle'];

    $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_item_balance WHERE nama_barang = '$nama_barang' AND nama_gudang = '$nama_gudang' AND nama_lokasi = '$nama_lokasi' AND rak = '$rak'"));
    $cek1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_item_balance WHERE id_transaksi = '$id_transaksi'"));
    $cek2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_barang WHERE nama_barang = '$nama_barang'"));

    if ($cek > 0) {
		echo "<script>alert('Maaf... Data sudah ada');window.location = '../pages/form-transaksi-new.php'</script>";
	}elseif ($cek1 > 0) {
		echo "<script>alert('Id Transaksi sudah digunakan !');window.location = '../pages/form-transaksi-new.php'</script>";
	}elseif ($cek2 > 0) {
		$query = mysqli_query($conn, "SELECT * FROM t_item_balance WHERE id_transaksi = '$id_transaksi'");
		$stok = mysqli_fetch_array($query);
	    $qty_awal = $stok['qty'];
	    //menghitung sisa stok
	    $total = $qty_awal + $qty_in;
	    //proses    
	    $in = mysqli_query($conn, "INSERT INTO t_item_balance (id_transaksi, id_barang, id_principle, nama_barang, nama_gudang, nama_lokasi, rak, qty) VALUES ('$id_transaksi', '$id_barang', '$id_principle', '$nama_barang', '$nama_gudang', '$nama_lokasi', '$rak', '$qty_in')") or die (mysqli_error($conn));
	    
	    $insert = mysqli_query($conn, "INSERT INTO t_history (id_barang, tanggal, jam, nama_gudang, nama_lokasi, rak, nama_barang, qty_awal, qty_in, qty_ahir, user) VALUES ('$id_barang', '$tanggal', '$jam', '$nama_gudang', '$nama_lokasi', '$rak', '$nama_barang', '$qty_awal', '$qty_in', '$total', '$user')") or die (mysqli_error($conn));

		if ($conn->affected_rows > 0){
			echo "<script>alert('Transaksi sukses');window.location = '../pages/transaksi.php'</script>";
		}else{
			echo "<script>alert('Transaksi gagal');window.location = '../pages/form-transaksi-new.php'</script>";
		}
	}else{
		echo "<script>alert('Nama barang tidak terdaftar !');window.location = '../pages/form-transaksi-new.php'</script>";
	}

?>

            