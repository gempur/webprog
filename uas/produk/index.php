<?php
include '../header.php';
$path .= '/produk';
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h2>Daftar Produk</h2>
            <a href="<?php echo $path; ?>/tambah.php" class="btn btn-primary mb-3">Tambah Produk</a>
            <a href="<?php echo $path; ?>/kategori.php" class="btn btn-primary mb-3">Kategori</a>
            <table class="table table-bordered" id="produkTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Produk</th>
                        <th>Barcode</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok</th>
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
                        echo "<td>" . $row['barcode'] . "</td>";
                        echo "<td>" . $row['kategori'] . "</td>";
                        echo "<td>" . $row['deskripsi'] . "</td>";
                        echo "<td>" . number_format($row['harga'], 0, ',', '.') . "</td>";
                        echo "<td>" . $row['stok'] . "</td>";
                        echo "<td><a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a> 
                                  <a href='hapus_produk.php?id=" . $row['id'] . "' class='btn btn-danger'>Hapus</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#produkTable').DataTable();
    });
</script>
<?php
include '../footer.php';
?>