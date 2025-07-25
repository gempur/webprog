<?php
$host = "localhost";
$user = "gempr"; 
$password = "A1234321a!"; 
$database = "point_of_sales";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>