<?php
session_start();
require_once 'db.php'; // Memanggil koneksi database

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $remember = isset($_POST['remember']);

    // Validasi input kosong
    if (empty($username) || empty($email) || empty($phone) || empty($password) || empty($confirm_password)) {
        $message = "Please fill in all fields.";
    } elseif ($password !== $confirm_password) {
        $message = "Passwords do not match.";
    } else {
        // Hash password untuk keamanan
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Query untuk menyimpan data user
        $stmt = $conn->prepare("INSERT INTO users (username, email, phone, password, role) VALUES (?, ?, ?, ?, ?)");
        $role = 'user'; // Default role
        $stmt->bind_param("sssss", $username, $email, $phone, $hashed_password, $role);

        if ($stmt->execute()) {
            // Simpan sesi pengguna setelah berhasil mendaftar
            $_SESSION['user_id'] = $conn->insert_id;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;

            // Set cookie jika pengguna memilih "Remember Me"
            if ($remember) {
                setcookie('user_id', $conn->insert_id, time() + (86400 * 30), "/");
                setcookie('role', $role, time() + (86400 * 30), "/");
            }

            // Redirect ke halaman dashboard setelah berhasil sign up
            header("Location: home.php");
            exit;
        } else {
            $message = "Sign up failed. Please try again.";
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="asset/signup.css"> 
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h2 class="title">Sign Up</h2>
            <p class="subtitle">Create your account</p>
            <?php if ($message) { echo "<div class='message error'>$message</div>"; } ?>
            <form method="POST">
                <!-- Input untuk username -->
                <div class="input-group">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <!-- Input untuk email -->
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <!-- Input untuk phone -->
                <div class="input-group">
                    <input type="text" name="phone" placeholder="Phone" required>
                </div>
                <!-- Input untuk password -->
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <!-- Input untuk konfirmasi password -->
                <div class="input-group">
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                </div>
                <!-- Checkbox untuk Remember Me -->
                <div class="options">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember Me</label>
                </div>
                <!-- Tombol Sign Up -->
                <button type="submit" class="login-btn">Sign Up</button>
            </form>
            <p class="signup-text">Already have an account? <a href="signin.php" class="signup-link">Log In</a></p>
        </div>
    </div>
    <!-- Footer Section -->
    <footer class="footer">
        <p>&copy; 2024 TitipKos. Semua hak cipta dilindungi.</p>
    </footer>
</body>
</html>
