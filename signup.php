<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Link CSS -->
    <link rel="stylesheet" href="asset/signup.css">
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="form-wrapper">
                <h2 class="title">Sign Up</h2>
                <p class="subtitle">Buat akun Anda untuk solusi penyimpanan yang aman!</p>

                <!-- Input Form -->
                <form>
                    <!-- Username -->
                    <div class="input-group">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Your username" required>
                    </div>

                    <!-- Email -->
                    <div class="input-group">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="Your email address" required>
                    </div>

                    <!-- Phone Number -->
                    <div class="input-group">
                        <i class="fa-solid fa-phone"></i>
                        <input type="tel" placeholder="Your phone number" required>
                    </div>

                    <!-- Password -->
                    <div class="input-group">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Enter your password" required>
                    </div>

                    <!-- Confirm Password -->
                    <div class="input-group">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Confirm your password" required>
                    </div>

                    <!-- Remember Me -->
                    <div class="options">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="login-btn">Sign Up</button>
                </form>

                <p class="signup-text">Sudah punya akun? <a href="signin.php" class="signup-link">Sign In</a></p>
            </div>
        </div>
    </div>
</body>
</html>
