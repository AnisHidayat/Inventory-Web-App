<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "db_inventory");
$columns = array('nama_gudang', 'nama_lokasi', 'rak', 'nama_barang', 'qty', 'qty_so', 'selisih');

$query = "SELECT * FROM t_item_balance";

if(isset($_POST["search"]["value"])){
 $query .= '
 WHERE nama_gudang LIKE "%'.$_POST["search"]["value"].'%" 
 OR nama_lokasi LIKE "%'.$_POST["search"]["value"].'%" 
 OR rak LIKE "%'.$_POST["search"]["value"].'%" 
 OR id_barang LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"])){
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
 $query1 .= 'ORDER BY '.$columns[$_POST['order1']['0']['column']].' '.$_POST['order1']['0']['dir'].' ';
 $query2 .= 'ORDER BY '.$columns[$_POST['order2']['0']['column']].' '.$_POST['order2']['0']['dir'].' ';
 $query3 .= 'ORDER BY '.$columns[$_POST['order3']['0']['column']].' '.$_POST['order3']['0']['dir'].' ';
}else{
 $query .= 'ORDER BY id_transaksi ASC ';
}

$query4 = '';

if($_POST["length"] != -1){
 $query4 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query4);

$data = array();

while($row = mysqli_fetch_array($result)){
 $sub_array = array();
 $sub_array[] = '<div class="update" readonly data-id="'.$row["id_transaksi"].'" data-column="id_transaksi">' . $row["id_transaksi"] . '</div>';
 $sub_array[] = '<div class="update" readonly data-id="'.$row["id_transaksi"].'" data-column="id_barang">' . $row["id_barang"] . '</div>';
 $sub_array[] = '<div class="update" data-id="'.$row["id_transaksi"].'" data-column="nama_gudang">' . $row["nama_gudang"] . '</div>';
 $sub_array[] = '<div class="update" data-id="'.$row["id_transaksi"].'" data-column="nama_lokasi">' . $row["nama_lokasi"] . '</div>';
 $sub_array[] = '<div class="update" data-id="'.$row["id_transaksi"].'" data-column="rak">' . $row["rak"] . '</div>';
 $sub_array[] = '<div class="update" data-id="'.$row["id_transaksi"].'" data-column="nama_barang">' . $row["nama_barang"] . '</div>';
 $sub_array[] = '<center><div class="update" data-id="'.$row["id_transaksi"].'" data-column="qty">' . $row["qty"] . '</div></center>';
 $sub_array[] = '<center><div contenteditable class="update" data-id="'.$row["id_transaksi"].'" data-column="qty_so">' . $row["qty_so"] . '</div></center>';
 $sub_array[] = '<center><div class="update" data-id="'.$row["id_transaksi"].'" data-column="selisih">' . $row["selisih"] . '</div></center>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id_transaksi"].'">Delete</button>';
 $data[] = $sub_array;
}

function get_all_data($connect){
 $query = "SELECT * FROM t_item_balance";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>