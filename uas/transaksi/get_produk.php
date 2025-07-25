<?php
include '../koneksi.php';
$param = isset($_GET['term']) ? $_GET['term'] : '';

$query = "SELECT * FROM master_barang WHERE nama_barang LIKE ? ORDER BY nama_barang ASC";
$stmt = $conn->prepare($query);
$search_param = '%' . $param . '%';
$stmt->bind_param("s", $search_param);
$stmt->execute();
$result = $stmt->get_result();

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

header('Content-Type: application/json');
echo json_encode($products);
