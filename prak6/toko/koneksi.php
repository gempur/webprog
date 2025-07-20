<?php
$servername = "localhost"; 
$username = "gempr"; 
$password = "A1234321a!"; 
$dbname = "db_toko"; 

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}