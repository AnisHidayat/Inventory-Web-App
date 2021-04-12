<?php 

include 'config.php';
// cari dan tampilkan data barang ke AutoComplete
	$searchTerm = $_GET['term'];
	$query = mysqli_query($conn, "SELECT * FROM t_history WHERE rak LIKE '%".$searchTerm."%' ORDER BY rak ASC");
	while ($row = $query->fetch_assoc()) {
	    $data[] = $row['rak'];
	}
	echo json_encode($data);

?>
