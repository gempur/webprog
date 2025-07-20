<?php
include 'koneksi.php';

// Memeriksa apakah ID produk telah diberikan
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data
    $sql = "DELETE FROM produk WHERE id_produk = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "ID produk tidak diberikan.";
}

$conn->close(); // Menutup koneksi
?>
