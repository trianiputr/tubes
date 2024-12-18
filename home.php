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
    <link rel="stylesheet" href="asset/home.css">
    <style>
        /* Hero Section */
        .hero {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.8)), url('asset/Gambar6.png') no-repeat center center;
            background-size: cover;
            background-color: #333; /* Fallback jika gambar tidak muncul */
            color: #fff;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .hero-content h1 {
            font-size: 3rem;
            font-weight: 700;
            text-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .btn-get-started {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-get-started:hover {
            background-color: #0056b3;
            transform: scale(1.05);
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
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="service.php">Service</a></li>
                    <li><a href="about1.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
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
    
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to TitipKos</h1>
            <p>Your trusted partner in finding and managing cozy accommodations</p>
            <a href="signup.php" class="btn-get-started">Get Started</a>
        </div>
    </section>

    <!-- Layanan Penyimpanan -->
    <section class="services">
        <h2>Layanan Kami</h2>
        <p class="services-description">Kami menyediakan berbagai layanan terbaik untuk memenuhi kebutuhan Anda, mulai dari penyimpanan aman hingga solusi fleksibel untuk kenyamanan Anda.</p>
        <div class="service-boxes">
            <div class="service-box">
                <img src="asset/Gambar7.png" alt="Layanan Penyimpanan Aman">
                <h3>Penyimpanan Aman</h3>
                <p>Penyimpanan aman dengan akses 24/7 dan pengawasan ketat untuk memastikan barang Anda tetap terjaga.</p>
            </div>
            <div class="service-box">
                <img src="asset/Gambar8.png" alt="Layanan Fleksibel">
                <h3>Solusi Fleksibel</h3>
                <p>Solusi penyimpanan yang fleksibel untuk penggunaan pribadi atau bisnis sesuai kebutuhan Anda.</p>
            </div>
            <div class="service-box">
                <img src="asset/Gambar9.png" alt="Layanan Terjangkau">
                <h3>Harga Terjangkau</h3>
                <p>Layanan dengan harga yang terjangkau tanpa mengorbankan kualitas dan keamanan.</p>
            </div>
        </div>
    </section>

    <!-- Lokasi -->
    <section class="location">
        <h2>Lokasi</h2>
        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126520.9795849127!2d110.31483573641185!3d-7.706675802400257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a596bcb128109%3A0xec2712903855b053!2sGoLockers%20%7C%20Penitipan%20Barang%20Jogja!5e0!3m2!1sid!2sid!4v1734359763088!5m2!1sid!2sid"
                width="100%"
                height="450"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </section>
    <!-- Footer Section -->
    <footer class="footer">
        <p>&copy; 2024 TitipKos. Semua hak cipta dilindungi.</p>
    </footer>
</body>
</html>
