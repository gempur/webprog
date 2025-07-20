<?php
include 'koneksi.php'; // Menyertakan file koneksi.php
$default_main_title = "Greatest Online Store"; // Judul halaman utama
?>
<!DOCTYPE html>
<html>

<head>
    <title><?php if (isset($main_title)) { echo $main_title; } else { echo $default_main_title; } ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <main>
    <div class="container">
        <?php include 'nav.php'; ?>
        <div class="content">
            