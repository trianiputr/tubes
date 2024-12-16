<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Link CSS -->
    <link rel="stylesheet" href="asset/signin.css">
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="form-wrapper">
                <h2 class="title">Sign In</h2>
                <p class="subtitle">Baru bergabung? Daftar untuk solusi penyimpanan yang aman!</p>

                <!-- Input Form -->
                <form>
                    <div class="input-group">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="Your email address" required>
                    </div>

                    <div class="input-group">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Enter your password" required>
                    </div>

                    <div class="options">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                        <a href="#" class="forgot-password">Forget your password?</a>
                    </div>

                    <button type="submit" class="login-btn">Log In</button>
                </form>

                <p class="signup-text">Belum punya akun? <a href="signup.php" class="signup-link">Sign Up</a></p>
            </div>
        </div>
    </div>
</body>
</html>
