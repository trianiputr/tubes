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
    <link rel="stylesheet" href="asset/about1.css">
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
                    <li><a href="Service.php">Service</a></li>
                    <li><a href="#"class="active">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
         <!-- Ikon Notifikasi, Search, dan Foto Profil -->
         <div class="right-icons">
            <i class="fas fa-search icon"></i>
            <i class="fas fa-bell icon"></i>
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
        <div class="overlay"></div>
        <div class="content">
            <h1>Solusi Penitipan yang Mudah & Aman</h1>
            <p>Simpan barang Anda dengan aman menggunakan solusi gudang terorganisir dari TitipKos</p>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="about-us">
        <div class="container">
            <h2>About us</h2>
            <p>
                TitipKos berkomitmen untuk menyediakan solusi penyimpanan yang aman dan praktis untuk segala kebutuhan Anda. 
                Misi kami adalah memberikan ketenangan pikiran melalui fasilitas modern yang memastikan keamanan barang-barang Anda. 
                Kami memprioritaskan kepuasan pelanggan melalui layanan yang dapat diandalkan dan pengalaman yang mudah digunakan.
            </p>
            <div class="about-image">
                <img src="asset/Gambar3.png" alt="About Us Image">
            </div>
        </div>
    </section>

    <!-- Visi & Misi Section -->
    <section class="vision-mission">
        <div class="container">
            <h3>Visi & Misi Titipkos</h3>
            <p>Visi dan misi kami dirancang untuk memberikan solusi penyimpanan yang tidak hanya praktis, tetapi juga aman dan terpercaya untuk mahasiswa di kota ini.</p>
            <div class="card">
                <!-- Visi -->
                <div>
                    <i class="fa-solid fa-eye"></i>
                    <h4>Visi</h4>
                    <p>Menjadi solusi penyimpanan barang yang aman dan terpercaya bagi mahasiswa di kota ini.</p>
                </div>
                <!-- Misi -->
                <div>
                    <i class="fa-solid fa-bullseye"></i>
                    <h4>Misi</h4>
                    <p>Memungkinkan mahasiswa untuk fokus pada studi dengan menyediakan tempat penyimpanan barang yang praktis dan terjangkau.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section -->
    <footer class="footer">
        <p>&copy; 2024 TitipKos. Semua hak cipta dilindungi.</p>
    </footer>

    
</body>
</html>