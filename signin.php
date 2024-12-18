<?php 
// Menghubungkan ke database
include('db.php');

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk memeriksa apakah email dan password cocok
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Set session untuk user yang login
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Redirect berdasarkan role
            if ($user['role'] == 'admin') {
                header('Location: dashboardadmin.php');
            } else {
                header('Location: profil.php');
            }
            exit();
        } else {
            $message = 'Invalid email or password.';
        }
    } else {
        $message = 'User not found.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- Link CSS -->
    <link rel="stylesheet" href="asset/signin.css">
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h2 class="title">Sign In</h2>
            <p class="subtitle">Please login to your account</p>

            <?php if ($message): ?>
                <p style="color: red;"><?php echo htmlspecialchars($message); ?></p>
            <?php endif; ?>

            <form method="POST">
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <div class="options">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>

                <button type="submit" class="login-btn">Sign In</button>
            </form>

            <p class="signup-text">
                Don't have an account? 
                <a href="signup.php" class="signup-link">Sign Up</a>
            </p>
        </div>
    </div>
    <!-- Footer Section -->
    <footer class="footer">
        <p>&copy; 2024 TitipKos. Semua hak cipta dilindungi.</p>
    </footer>
</body>
</html>
