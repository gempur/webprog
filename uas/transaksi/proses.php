<?php

use PhpMyAdmin\Header;

session_start();
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    print_r($_POST);
    $nota_no = uniqid('TRX-');
    $tanggal = date('Y-m-d H:i:s');
    $kasir_id = $_SESSION['id'];


    for ($i = 0; $i < count($_POST['item']); $i++) {
        $item = $_POST['item'][$i];
        if (is_string($item)) {
            $item = json_decode($item, true);
        }
        $nama_produk = $item['nama_produk'];
        $id_produk = $item['id_produk'];
        $harga = $item['harga'];
        $jumlah = $item['jumlah'];
        $total = $item['total'];

        echo "Processing item: $nama_produk, ID: $id_produk, Harga: $harga, Jumlah: $jumlah, Total: $total, Nota: $nota_no, Tanggal: $tanggal\n";
        $query = "INSERT INTO transaksi_penjualan (nota_no, tanggal_transaksi, kasir_id, harga, id_barang, jumlah, total_harga) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssss", $nota_no, $tanggal, $kasir_id, $harga, $id_produk, $jumlah, $total);
        if (!$stmt->execute()) {
            echo "Error inserting item: " . $stmt->error . "\n";
            continue;
        } else {
            echo "Item inserted successfully: $nama_produk\n";
            $stmt->close();
            $update_query = "UPDATE master_barang SET stok = stok - ? WHERE id = ?";
            $update_stmt = $conn->prepare($update_query);
            $update_stmt->bind_param("is", $jumlah, $id_produk);
            if (!$update_stmt->execute()) {
                echo "Error updating stock for $nama_produk: " . $update_stmt->error . "\n";
            } else {
                echo "Stock updated successfully for $nama_produk\n";
            }
            $update_stmt->close();

            header("Location: index.php?success=1");
            exit();
        }
    }

}