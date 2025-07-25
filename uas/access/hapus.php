<?php
include '../header.php';
$path .= '/access';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM user WHERE id = $id";
    if ($conn->query($query) === TRUE) {
        $message = "<div class='alert alert-success'>Akses berhasil dihapus!</div>";
        header("Location: " . $path);
        exit();
    } else {
        $message = "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
} else {
    $message = "<div class='alert alert-danger'>ID tidak ditemukan!</div>";
}
?>