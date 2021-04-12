<?php 

include '../include/config.php';

	//kode id otomatis dengan tanggal
	
	$today = date("Ymd"); //untuk mengambil tahun, tanggal dan bulan Hari INI

    //cari id terakhir ditanggal hari ini
    $query1 = "SELECT max(id) as maxID FROM t_item_balance WHERE id LIKE '$today%'";
    $hasil = mysql_query($query1);
    $data = mysql_fetch_array($hasil);
    $idMax = $data['maxID'];

    //setelah membaca id terakhir, lanjut mencari nomor urut id dari id terakhir
    $NoUrut = (int) substr($idMax, 8, 4);
    $NoUrut++; //nomor urut +1
   
    //setelah ketemu id terakhir lanjut membuat id baru dengan format sbb:
    $NewID = $today .sprintf('%04s', $NoUrut);
	//$today nanti jadinya misal 20160526 .sprintf('%04s', $NoUrut) urutan id di tanggal hari ini

   
    //proses simpan data id dengan id yg baru ke database
    $query2 = "INSERT INTO id_unik (id,nama) VALUES ('$NewID','$nama')";
    $hasil2 = mysql_query($query2);
	//****

	date_default_timezone_set('Asia/jakarta');
	$tanggal      = date("Y-m-d");
	$jam          = date("H:i");
	$id_transaksi = $_POST['txtIdtransaksi'];
	$qty_in       = $_POST['txtQty'];
	$nama_barang  = $_POST['txtBarang'];
	$nama_gudang  = $_POST['txtGudang'];
	$nama_lokasi  = $_POST['txtLokasi'];
	$rak          = $_POST['txtRak'];
	$user         = $_POST['txtIdUser'];

    $query = mysqli_query($conn, "SELECT * FROM t_item_balance WHERE id_transaksi = '$id_transaksi'");
    $stok = mysqli_fetch_array($query);
    $qty_awal = $stok['qty'];
    //menghitung sisa stok
    $total = $qty_awal + $qty_in;

    $upstok= mysqli_query($conn, "UPDATE t_item_balance SET qty='$total' WHERE id_transaksi = '$id_transaksi'");
    
    //proses    
    $insert = mysqli_query($conn, "INSERT INTO t_history (tanggal, jam, nama_gudang, nama_lokasi, rak, nama_barang, qty_awal, qty_in, qty_ahir, user) VALUES ('$tanggal', '$jam', '$nama_gudang', '$nama_lokasi', '$rak', '$nama_barang', '$qty_awal', '$qty_in', '$total', '$user')") or die (mysqli_error($conn));
    
	if ($conn->affected_rows > 0){
		echo "<script>alert('Transaksi sukses');window.location = '../pages/transaksi.php'</script>";
	}else{
		echo "<script>alert('Transaksi gagal');window.location = '../pages/form-transaksi.php'</script>";
	}
?>
