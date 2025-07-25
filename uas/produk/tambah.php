<?php
include '../header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];

    // Validasi input
    if (empty($nama_produk) || empty($harga) || empty($stok) || empty($kategori)) {
        echo "<div class='alert alert-danger'>Semua field harus diisi!</div>";
    } else {
        // Simpan data ke database
        $query = "INSERT INTO master_barang (nama_barang, harga, stok, kategori) VALUES ('$nama_produk', '$harga', '$stok', '$kategori')";
        if ($conn->query($query) === TRUE) {
            $message = "<div class='alert alert-success'>Produk berhasil ditambahkan!</div>";
        } else {
            $message = "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
        }
    }
}
?>
<div class="container mt-4">
    <?php if (isset($message)) echo $message; ?>
    <h2>Tambah Produk</h2>
    <form action="tambah.php" method="POST">
        <div class="form-group">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
        </div>
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select class="form-control" id="kategori" name="kategori" required>
                <?php
                $query = "SELECT * FROM kategori";
                $result = $conn->query($query);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['nama_kategori'] . "'>" . $row['nama_kategori'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
        </div>
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
<div class="container mt-4">
    <h2>Daftar Produk</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM master_barang";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nama_barang'] . "</td>";
                echo "<td>" . number_format($row['harga'], 0, ',', '.') . "</td>";
                echo "<td>" . $row['stok'] . "</td>";
                echo "<td>" . $row['kategori'] . "</td>";
                echo "<td><a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a> 
                          <a href='hapus_produk.php?id=" . $row['id'] . "' class='btn btn-danger'>Hapus</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include '../footer.php';
?>