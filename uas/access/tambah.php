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
            header("Location: " . $path);
            exit();
        } else {
            $message = "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
        }
    }
}
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php
            if (isset($message)) echo $message;
            ?>
            <div class="card">
                <div class="card-header">
                    <h2>Tambah Akses</h2>
                </div>
                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="">Pilih Role</option>
                                <option value="1">Admin</option>
                                <option value="2">Cashier</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../footer.php';
?><div 