<?php 
include '../header.php';
$path .= '/produk';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Validasi input
    if (empty($nama_barang) || empty($harga) || empty($stok)) {
        echo "<div class='alert alert-danger'>Semua field harus diisi!</div>";
    } else {
        // Update data ke database
        $query = "UPDATE master_barang SET nama_barang='$nama_barang', harga='$harga', stok='$stok' WHERE id=$id";
        if ($conn->query($query) === TRUE) {
            echo "<div class='alert alert-success'>Produk berhasil diperbarui!</div>";
            header("Location: ./index.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
        }
    }
}
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <?php 
            $_GET['id'] = isset($_GET['id']) ? $_GET['id'] : '';

            $record = null;
            if ($_GET['id']) {
                $query = "SELECT * FROM master_barang WHERE id = " . intval($_GET['id']);
                $result = $conn->query($query);
                $record = $result->fetch_assoc();
            }
            ?>
            <h2>Edit Produk</h2>
            <form action="<?php echo $path; ?>/edit.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $record['nama_barang']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $record['harga']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="<?php echo $record['stok']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>