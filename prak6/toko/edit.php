<?php
$main_title = "Edit Barang"; // Judul halaman
include 'head.php'; // Menyertakan file head.php

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    // Query untuk menambahkan data
    $sql = "UPDATE produk SET nama_produk='$nama', harga=$harga, stok=$stok WHERE id_produk = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error editing record: " . $conn->error;
    }
} else {
    // Jika form belum disubmit, ambil data produk berdasarkan ID
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM produk WHERE id_produk = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nama = $row['nama_produk'];
            $harga = $row['harga'];
            $stok = $row['stok'];
        } else {
            echo "Produk tidak ditemukan.";
            exit();
        }
    } else {
        echo "ID produk tidak diberikan.";
        exit();
    }
}
$conn->close(); // Menutup koneksi
?>
<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light"><?php echo $main_title; ?></h1>
        <p class="lead text-body-secondary"><?php echo htmlspecialchars($nama); ?></p>
    </div>
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($nama); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="<?php echo htmlspecialchars($harga); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="<?php echo htmlspecialchars($stok); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

