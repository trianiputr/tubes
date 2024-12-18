<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TitipKos</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Link CSS -->
    <link rel="stylesheet" href="asset/contact.css">

    <style>
        /* Footer Section */
        .footer {
            background-color: #333;
            color: white;
            padding: 15px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }
        .footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <!-- Logo dan Navigasi -->
        <div class="logo-nav">
            <div class="logo">
                <img src="asset/Gambar2.png" alt="Logo" class="logo-img">
                <span class="logo-text">TitipKos</span>
            </div>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="service.php">Service</a></li>
                    <li><a href="about1.php">About</a></li>
                    <li><a href="#" class="active">Contact</a></li>
                </ul>
            </nav>
        </div>
        <!-- Foto Profil -->
        <div class="right-icons">
            <a href="#" id="profile-link">
                <img src="asset/Gambar4.png" alt="Profile" class="profile-img">
            </a>
        </div>

        <script>
            // Simulasi status login (true jika user login, false jika tidak login)
            const isLoggedIn = <?php echo isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] ? 'true' : 'false'; ?>;

            // Elemen link profil
            const profileLink = document.getElementById('profile-link');

            // Jika sudah login, arahkan ke halaman profil.php
            if (isLoggedIn) {
                profileLink.setAttribute('href', 'profil.php');
            } else {
                // Jika belum login, arahkan ke halaman signin.php saat diklik
                profileLink.addEventListener('click', (event) => {
                    event.preventDefault(); // Cegah aksi default
                    window.location.href = 'signin.php'; // Mengarahkan ke signin.php
                });
            }
        </script>
    </header>

    <!-- Informasi Kontak -->
    <section class="contact-section">
        <div class="contact-container">
            <h2 class="contact-title">E-MAIL</h2>
            <p class="contact-info">putryanihk@gmail.com</p>

            <h2 class="contact-title">PHONE</h2>
            <p class="contact-info">+62 85298975402</p>

            <h2 class="contact-title">SOCIALS</h2>
            <div class="contact-icons">
                <a href="https://web.facebook.com/siaman.jogja/?_rdc=1&_rdr" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/titipbarangkos/" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <p>&copy; 2024 TitipKos. Semua hak cipta dilindungi.</p>
    </footer>
</body>
</html>
