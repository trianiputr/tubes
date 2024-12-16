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
    <!-- Link CSS Navbar -->
    <link rel="stylesheet" href="asset/profil.css">
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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#" class="active">Contact</a></li>
                </ul>
            </nav>
        </div>
        <!-- Ikon Notifikasi, Search, dan Foto Profil -->
        <div class="right-icons">
            <i class="fas fa-search icon"></i>
            <i class="fas fa-bell icon"></i>
            <img src="asset/Gambar4.png" alt="Profile" class="profile-img">
        </div>
    </header>
    <section class="profile-container">
            <!-- Gambar Profil -->
            <div class="profile-image">
                <img src="profill.png" alt="Profile Image">
            </div>
            <!-- Formulir Profil -->
            <div class="form-container">
                <form>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" disabled>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" disabled>
                    </div>

                    <div class="form-group">
                        <label for="ttl">Tempat/Tanggal Lahir</label>
                        <input type="text" id="ttl" name="ttl" disabled>
                    </div>

                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <input type="text" id="gender" name="gender" disabled>
                    </div>

                    <div class="form-group">
                        <label for="phone">Nomor HP</label>
                        <input type="text" id="phone" name="phone" disabled>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" disabled>
                    </div>

                    <button type="submit">Simpan</button>
                </form>
            </div>
        </section>
</body>
</html>
