<form action="contoh-cari.php" method="get">
	<label>Cari :</label><br/>
	<label>Nama Gudang :</label><input type="text" name="txtNamaGudang"><br/>
	<label>nama Lokasi :</label><input type="text" name="txtNamaLokasi"><br/>
	<label>Nama Rak :</label><input type="text" name="txtNamaRak"><br/>
	<label>Nama Barang :</label><input type="text" name="txtNamaBarang"><br/>
	<input type="submit" value="Cari">
</form>
 
<?php 
include '../include/config.php';
if(isset($_GET['txtNamaGudang'])){
	$cari = $_GET['txtNamaGudang'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
 
<table border="1">
	<tr>
		<th>No</th>
		<th>Tanggal</th>
		<th>Jam</th>
		<th>Nama Gudang</th>
		<th>Nama Lokasi</th>
		<th>Rak</th>
		<th>Nama Barang</th>
		<th>Qty Awal</th>
		<th>Qty In</th>
		<th>Qty Out</th>
		<th>Qty Ahir</th>
		<th>User</th>
	</tr>
	<?php 
	if(isset($_GET['txtNamaGudang'])){
		$cari = $_GET['txtNamaGudang'];
		$cari1 = $_GET['txtNamaLokasi'];
		$cari2 = $_GET['txtNamaRak'];
		$cari3 = $_GET['txtNamaBarang'];
		
		$cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM t_history WHERE nama_gudang = '$cari' AND nama_lokasi = '$cari1' AND rak = '$cari2' AND nama_barang = '$cari3'"));	
		if ($cek > 0) {
			$data = mysqli_query($conn, "SELECT * FROM t_history WHERE nama_gudang LIKE '%".$cari."%' AND nama_lokasi LIKE '%".$cari1."%' AND rak LIKE '%".$cari2."%' AND nama_barang LIKE '%".$cari3."%'");
		}else{
			 echo "<script>alert('Data tidak ditemukan');window.location = '../pages/history.php'</script>";
		}		
	}else{
		$data = mysqli_query($conn, "SELECT * FROM t_history");	
		//echo "<script>alert('Data tidak ditemukan');window.location = '../pages/history.php'</script>";	
	}
	$no = 1;
	while($d = mysqli_fetch_array($data)){
	?>

	<tr>
		<td><?php echo $no++; ?></td>
        <td><?php echo $d['tanggal']; ?></td>
        <td><?php echo $d['jam']; ?></td>
		<td><?php echo $d['nama_gudang']; ?></td>
		<td><?php echo $d['nama_lokasi']; ?></td>
		<td><?php echo $d['rak']; ?></td>
		<td><?php echo $d['nama_barang']; ?></td>
		<td><?php echo $d['qty_awal']; ?></td>
        <td><?php echo $d['qty_in']; ?></td>
        <td><?php echo $d['qty_out']; ?></td>
        <td><?php echo $d['qty_ahir']; ?></td>
        <td><?php echo $d['user']; ?></td>
	</tr>
	<?php } ?>
</table>