<?php
session_start();
include 'koneksi.php';
include 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point of Sales</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Point of Sales</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo $path; ?>/index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $path; ?>/produk">Produk</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $path; ?>/transaksi">Transaksi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $path; ?>/laporan">Laporan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $path; ?>/access"> Pengaturan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $path; ?>/logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container mt-4 text-center">
    <h1><?php echo $nama_pos; ?></h1>
    <p>Address: <?php echo $alamat_pos; ?><br>
    Phone: <?php echo $telepon_pos; ?></p>
</div>
<script>
    $(document).ready(function() {
        $('.alert').delay(3000).fadeOut('slow');
    });
</script>
