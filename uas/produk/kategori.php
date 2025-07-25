<?php
include '../header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_kategori = $_POST['nama_kategori'];
    $deskripsi = $_POST['deskripsi'];

    // Validasi input
    if (empty($nama_kategori) || empty($deskripsi)) {
        echo "<div class='alert alert-danger'>Semua field harus diisi!</div>";
    } else {
        // Simpan data ke database
        $query = "INSERT INTO kategori (nama_kategori, deskripsi) VALUES ('$nama_kategori', '$deskripsi')";
        if ($conn->query($query) === TRUE) {
            $message = "<div class='alert alert-success'>Kategori berhasil ditambahkan!</div>";
        } else {
            $message = "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
        }
    }
}
?>
<div class="container mt-4">
    <?php if (isset($message)) echo $message; ?>
    <h2>Tambah Kategori</h2>
    <form action="kategori.php" method="POST">
        <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
<div class="container mt-4">
    <h2>Daftar Kategori</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM kategori";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nama_kategori'] . "</td>";
                echo "<td>" . $row['deskripsi'] . "</td>";
                echo "<td><a href='edit_kategori.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a> 
                          <a href='hapus_kategori.php?id=" . $row['id'] . "' class='btn btn-danger'>Hapus</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include '../footer.php';
?>