<?php
session_start();
require_once 'db.php'; // Koneksi database

// Pastikan pengguna login
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

$user_id = $_SESSION['user_id']; // Ambil ID dari sesi login
$result = $conn->query("SELECT * FROM users WHERE id = $user_id");
$user = $result->fetch_assoc();

// Proses upload foto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload'])) {
    if (!empty($_FILES['profile_picture']['name'])) {
        $target_dir = "uploads/";

        // Buat folder jika belum ada
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        // Atur nama file unik
        $file_name = time() . "_" . basename($_FILES['profile_picture']['name']);
        $target_file = $target_dir . $file_name;

        // Upload file
        if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file)) {
            // Update foto profil di database
            $conn->query("UPDATE users SET profile_picture = '$target_file' WHERE id = $user_id");
            header("Location: " . $_SERVER['PHP_SELF']); // Reload halaman
            exit();
        } else {
            echo "Gagal mengupload foto.";
        }
    }
}

// Proses hapus foto
if (isset($_POST['delete_picture'])) {
    // Menghapus foto profil dari database
    $conn->query("UPDATE users SET profile_picture = NULL WHERE id = $user_id");

    // Menghapus file foto dari direktori server jika ada
    if (file_exists($user['profile_picture']) && $user['profile_picture'] != 'uploads/default.jpg') {
        unlink($user['profile_picture']);
    }

    // Redirect untuk memperbarui tampilan
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Proses update profil
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $conn->query("UPDATE users SET username = '$username', email = '$email', phone = '$phone' WHERE id = $user_id");
    header("Location: " . $_SERVER['PHP_SELF']); // Reload halaman
    exit();
}

// Proses logout
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar TitipKos</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Reset dan Font */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        /* Header dan Navbar */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 30px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .logo-nav {
            display: flex;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo-img {
            width: 25px;
            height: 25px;
            margin-right: 8px;
        }

        .logo-text {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
            margin-right: 20px;
        }

        nav ul {
            display: flex;
            list-style: none;
            margin-left: 20px;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s ease, border-bottom 0.3s ease;
            padding-bottom: 5px;
            border-bottom: 2px solid transparent;
        }

        nav ul li a:hover, nav ul li a.active {
            color: #007bff;
            border-bottom: 2px solid #007bff;
        }

        .right-icons {
            display: flex;
            align-items: center;
        }

        .icon {
            margin-right: 15px;
            font-size: 1.2rem;
            color: #333;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .icon:hover {
            color: #007bff;
        }

        .profile-img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
        }

        /* Profil Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .profile-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 500px;
            text-align: center;
        }

        h2 {
            color: #007bff;
            margin-bottom: 15px;
        }

        .profile-picture {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .profile-picture img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #007bff;
        }

        form {
            margin: 10px 0;
        }

        label {
            display: block;
            text-align: left;
            font-weight: bold;
            margin: 10px 0 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        button.delete-btn {
            background-color: #dc3545;
        }

        button.delete-btn:hover {
            background-color: #c82333;
        }

        .logout-btn {
            background-color: #6c757d;
        }

        .logout-btn:hover {
            background-color: #5a6268;
        }
    </style>

</head>
<body>
    <!-- Header dan Navbar -->
    <header>
        <div class="logo-nav">
            <div class="logo">
                <img src="asset/Gambar2.png" alt="Logo" class="logo-img">
                <span class="logo-text">TitipKos</span>
            </div>
            <nav>
                <ul>
                    <li><a href="home.php" class="active">Home</a></li>
                    <li><a href="service.php">Service</a></li>
                    <li><a href="about1.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
        
        <!-- Ikon Notifikasi, Search, dan Foto Profil -->
        <div class="right-icons">
            <i class="fas fa-search icon"></i>
            <i class="fas fa-bell icon"></i>
            <!-- Periksa jika foto profil ada, jika tidak tampilkan gambar default -->
            <img src="<?php echo $user['profile_picture'] && file_exists($user['profile_picture']) ? htmlspecialchars($user['profile_picture']) : 'asset/Gambar4.png'; ?>" alt="Profile" class="profile-img">
        </div>

    </header>

    <div class="profile-container">
        <h2>User Profile</h2>

        <!-- Foto Profil -->
        <div class="profile-picture">
            <?php if ($user['profile_picture'] && file_exists($user['profile_picture'])): ?>
                <img src="<?php echo htmlspecialchars($user['profile_picture']); ?>" alt="Profile Picture">
            <?php else: ?>
                <img src="uploads/default.jpg" alt="Default Profile Picture">
            <?php endif; ?>
        </div>

        <!-- Form Upload Foto -->
        <form method="POST" enctype="multipart/form-data">
            <label>Change Profile Picture:</label>
            <input type="file" name="profile_picture" required>
            <button type="submit" name="upload">Upload</button>
            <button type="button" class="delete-btn" onclick="confirmDelete()">Delete Profile Picture</button>
        </form>

        <!-- Script untuk konfirmasi penghapusan -->
        <script>
            function confirmDelete() {
                var confirmation = confirm("Apakah Anda yakin ingin menghapus foto profil Anda?");
                if (confirmation) {
                    // Jika Ya, submit form untuk menghapus foto
                    var form = document.createElement('form');
                    form.method = 'POST';
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'delete_picture';
                    form.appendChild(input);
                    document.body.appendChild(form);
                    form.submit();
                }
            }
        </script>

        <!-- Form Update Profil -->
        <form method="POST">
            <label>Username:</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
            
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            
            <label>Phone:</label>
            <input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
            
            <button type="submit" name="update_profile">Update Profile</button>
        </form>

        <!-- Tombol Logout -->
        <form method="POST">
            <button type="submit" name="logout" class="logout-btn">Logout</button>
        </form>
    </div>
    <!-- Footer Section -->
    <footer class="footer">
        <p>&copy; 2024 TitipKos. Semua hak cipta dilindungi.</p>
    </footer>

</body>
</html>
