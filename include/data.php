<?php 

include 'config.php';
// cari dan tampilkan data ke AutoComplete
	$searchTerm = $_GET['term'];
	$query = mysqli_query($conn, "SELECT * FROM t_produk_grup WHERE nama_grup LIKE '%".$searchTerm."%' ORDER BY nama_grup ASC");
	while ($row = $query->fetch_assoc()) {
	    $data[] = $row['nama_grup'];
	}
	echo json_encode($data);
?>
