<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TitipKos</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="asset/service.css">
</head>
<body>
    <header>
        <div class="logo-nav">
            <div class="logo">
                <img src="asset/Gambar2.png" alt="Logo" class="logo-img">
                <span class="logo-text">TitipKos</span>
            </div>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="#" class="active">Service</a></li>
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

    <div class="switch-buttons">
        <button onclick="showForm('registration')">Permintaan Pendaftaran</button>
        <button onclick="showForm('verification')">Verifikasi Pembayaran</button>
    </div>

    <section class="form-container" id="form-container">
        <!-- Content dynamically loaded -->
    </section>

    <script>
        function showForm(type) {
            const formContainer = document.getElementById('form-container');
            if (type === 'registration') {
                formContainer.innerHTML = ` 
                    <h2>Permintaan Pendaftaran</h2>
                    <form action="submit.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_pemilik">Nama Pemilik</label>
                            <input type="text" id="nama_pemilik" name="nama_pemilik" placeholder="Nama Pemilik" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" id="nama_barang" name="nama_barang" placeholder="Nama Barang" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Barang</label>
                            <textarea id="deskripsi" name="deskripsi" placeholder="Deskripsi Barang" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="ukuran">Ukuran</label>
                            <select id="ukuran" name="ukuran" required>
                                <option value="" disabled selected>Pilih Ukuran</option>
                                <option value="small">Small</option>
                                <option value="medium">Medium</option>
                                <option value="large">Large</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto_barang">Upload Foto Barang</label>
                            <input type="file" id="foto_barang" name="foto_barang" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" id="alamat" name="alamat" placeholder="Alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="tel" id="telepon" name="telepon" placeholder="Nomor Telepon" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-submit">Submit</button>
                        </div>
                    </form>`;
            } else if (type === 'verification') {
                // Memuat data menggunakan AJAX
                fetch('load_verification.php')
                    .then(response => response.text())
                    .then(data => {
                        formContainer.innerHTML = data;
                    })
                    .catch(error => {
                        formContainer.innerHTML = "Terjadi kesalahan saat memuat data.";
                    });
            }
        }

        // Default form is 'registration'
        showForm('registration');
    </script>
    <!-- Footer Section -->
    <footer class="footer">
        <p>&copy; 2024 TitipKos. Semua hak cipta dilindungi.</p>
    </footer>
</body>
</html>
