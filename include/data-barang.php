<?php 

include 'config.php';
// cari dan tampilkan data barang ke AutoComplete
	$searchTerm = $_GET['term'];
	$query = mysqli_query($conn, "SELECT * FROM t_barang WHERE nama_barang LIKE '%".$searchTerm."%' ORDER BY nama_barang ASC");
	while ($d = $query->fetch_assoc()) {
	    $data[] = $d['nama_barang'];
	}
	echo json_encode($data);

?>
