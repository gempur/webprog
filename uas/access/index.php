<?php
include '../header.php';
$path .= '/access';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Validasi input
    if (empty($username) || empty($role) || empty($password)) {
        echo "<div class='alert alert-danger'>Semua field harus diisi!</div>";
    } else {
        // Simpan data ke database
        $query = "INSERT INTO user (username, role, password) VALUES ('$username', '$role', md5('$password'))";
        if ($conn->query($query) === TRUE) {
            $message = "<div class='alert alert-success'>Akses berhasil ditambahkan!</div>";
        } else {
            $message = "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
        }
    }
}
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h2>Daftar Akses</h2>
            <a href="<?php echo $path; ?>/tambah.php" class="btn btn-primary mb-3">Tambah Akses</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                        <th>Meta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM user";
                    $result = $conn->query($query);
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['role'] . "</td>";
                        echo "<td><a href='".$path ."/edit.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a> 
                                  <a href='".$path ."/hapus.php?id=" . $row['id'] . "' class='btn btn-danger' id='hapus' >Hapus</a></td>";
                        echo "<td>";
                        echo "<small>Created at: " . $row['created_at'] . "</small>";
                        echo "<br><small>Updated at: " . $row['updated_at'] . "</small>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll('#hapus').forEach(function(link) {
        link.addEventListener('click', function(e) {
            if (!confirm('Apakah Anda yakin ingin menghapus akses ini?')) {
                e.preventDefault();
            }
        });
    });
</script>
<?php
include '../footer.php';
?>