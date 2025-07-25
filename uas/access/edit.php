<?php 
include '../header.php';
$path .= '/access';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM user WHERE id = $id";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $role = $row['role'];
        $password = $row['password'];
    } else {
        $message = "<div class='alert alert-danger'>User tidak ditemukan!</div>";
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'], $_POST['role'], $_POST['password'])) {
    $id = $_GET['id'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = $_POST['password'];
      
    // Validasi input
    if (empty($username) || empty($role) || empty($password)) {
        $message = "<div class='alert alert-danger'>Semua field harus diisi!</div>";
    } else {
        // Update data ke database
        $query = "UPDATE user SET username='$username', role='$role', password=md5('$password') WHERE id=$id";
        if ($conn->query($query) === TRUE) {
            $message = "<div class='alert alert-success'>Akses berhasil diperbarui!</div>";
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
                    <h2>Edit Akses</h2>
                </div>
                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>" method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo isset($username) ? $username : ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="">Pilih Role</option>
                                <option value="1" <?php echo (isset($role) && $role == '1') ? 'selected' : ''; ?>>Admin</option>
                                <option value="2" <?php echo (isset($role) && $role == '2') ? 'selected' : ''; ?>>Cashier</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
<?php
include '../footer.php';
?>