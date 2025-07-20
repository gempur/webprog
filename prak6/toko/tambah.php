<?php
$main_title = "Data Barang Toko"; // Judul halaman
include 'head.php'; // Menyertakan file head.php

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok']; 
    // Query untuk menambahkan data
    $sql = "INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama', $harga, $stok)";
    if ($conn->query($sql) === TRUE) {
        // header("Location: index.php");
        // exit();
    } else {
        echo "Error adding record: " . $conn->error;
    }

} 

$conn->close(); // Menutup koneksi
?>
<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light"><?php echo $main_title; ?></h1>
    </div>
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
   
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" required>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Barang</button>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <table class="table table-striped">
        <caption>Daftar Barang</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $sql = "SELECT id_produk, nama_produk, harga, stok FROM produk";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Loop untuk menampilkan setiap baris data
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id_produk'] . "</td>";
                    echo "<td>" . $row['nama_produk'] . "</td>";
                    echo "<td>" . $row['harga'] . "</td>";
                    echo "<td>" . $row['stok'] . "</td>";
                    echo "<td>
                            <a href='edit.php?id=" . $row['id_produk'] . "'>Edit</a> | 
                            <a href='hapus.php?id=" . $row['id_produk'] . "' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data produk.</td></tr>";
            }
            
            ?>
        </tbody>
    </table>
<script>
    document.querySelectorAll('a[href^="hapus.php"]').forEach(link => {
        link.addEventListener('click', function(event) {
            if (!confirm('Yakin ingin menghapus?')) {
                event.preventDefault();
            }
        });
    });
</script>
