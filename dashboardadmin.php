<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - TitipKos</title>
    <link rel="stylesheet" href="asset/admin.css">
</head>

<body>
    <header>
        <div class="logo-nav">
            <div class="logo">
                <img src="asset/Gambar2.png" alt="Logo" class="logo-img">
                <span class="logo-text">TitipKos Admin</span>
            </div>
            <nav>
                <ul>
                    <li><a href="dashboardadmin.php" class="active">Dashboard</a></li>
                    <li><a href="home.php">Logout</a></li>
                </ul>
            </nav>
        </div>
        <div class="right-icons">
            <i class="fas fa-search icon"></i>
            <i class="fas fa-bell icon"></i>
            <a href="#" id="profile-link">
                <img src="asset/Gambar4.png" alt="Profile" class="profile-img">
            </a>
        </div>
    </header>

    <!-- Section Dashboard -->
    <section class="dashboard-container">
        <h2>Verifikasi Pengajuan Pembayaran</h2>
        <form action="dashboardadmin.php" method="POST">
            <table>
                <thead>
                    <tr>
                        <th>ID Pengajuan</th>
                        <th>Nama Pemilik</th>
                        <th>Status Pengajuan</th>
                        <th>Status Pembayaran</th>
                        <th>Foto Barang</th>
                        <th>Aksi</th>
                        <th>Simpan Perubahan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'db.php';

                    // Query untuk mendapatkan data pengajuan
                    $sql = "SELECT p.id, p.nama_pemilik, p.foto_barang, p.status, v.status_pembayaran 
                            FROM pengajuan p
                            LEFT JOIN verifikasi_pembayaran v ON p.id = v.pengajuan_id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nama_pemilik']; ?></td>
                        <td>
                            <select name="status_pengajuan_<?php echo $row['id']; ?>" class="verify-btn">
                                <option value="Belum Verifikasi" <?php echo $row['status'] == 'Belum Verifikasi' ? 'selected' : ''; ?>>Belum Verifikasi</option>
                                <option value="Diterima" <?php echo $row['status'] == 'Diterima' ? 'selected' : ''; ?>>Diterima</option>
                                <option value="Ditolak" <?php echo $row['status'] == 'Ditolak' ? 'selected' : ''; ?>>Ditolak</option>
                            </select>
                        </td>
                        <td>
                            <select name="status_pembayaran_<?php echo $row['id']; ?>" class="verify-btn">
                                <option value="Belum Terverifikasi" <?php echo $row['status_pembayaran'] == 'Belum Terverifikasi' ? 'selected' : ''; ?>>Belum Terverifikasi</option>
                                <option value="Diterima" <?php echo $row['status_pembayaran'] == 'Diterima' ? 'selected' : ''; ?>>Diterima</option>
                                <option value="Ditolak" <?php echo $row['status_pembayaran'] == 'Ditolak' ? 'selected' : ''; ?>>Ditolak</option>
                            </select>
                        </td>
                        <td>
                            <div class="photo-container">
                                <?php if ($row['foto_barang']) { ?>
                                    <img src="<?php echo $row['foto_barang']; ?>" alt="Foto Barang">
                                <?php } else { ?>
                                    <p class="no-photo">Tidak Ada Foto</p>
                                <?php } ?>
                            </div>
                        </td>
                        <td>
                            <button type="submit" name="hapus_pengajuan" value="<?php echo $row['id']; ?>" class="action-btn">Hapus Data Pengajuan</button>
                        </td>
                        <td>
                            <button type="submit" name="simpan_perubahan" value="<?php echo $row['id']; ?>" class="save-btn">Simpan Perubahan</button>
                        </td>
                    </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='7'>Tidak ada pengajuan pembayaran yang ditemukan</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </section>
    

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Hapus data pengajuan
        if (isset($_POST['hapus_pengajuan'])) {
            $id_pengajuan = $conn->real_escape_string($_POST['hapus_pengajuan']);
            $delete_sql = "DELETE FROM pengajuan WHERE id = '$id_pengajuan'";
            if ($conn->query($delete_sql) === TRUE) {
                echo "Data pengajuan berhasil dihapus.";
            } else {
                echo "Error: " . $conn->error;
            }
        }

        // Simpan perubahan (update status pengajuan dan status pembayaran)
        if (isset($_POST['simpan_perubahan'])) {
            $id_pengajuan = $conn->real_escape_string($_POST['simpan_perubahan']);
            $status_pengajuan = $conn->real_escape_string($_POST["status_pengajuan_$id_pengajuan"]);
            $status_pembayaran = $conn->real_escape_string($_POST["status_pembayaran_$id_pengajuan"]);

            // Update status pengajuan
            $update_sql = "UPDATE pengajuan 
                           SET status = '$status_pengajuan' 
                           WHERE id = '$id_pengajuan'";

            if ($conn->query($update_sql) === TRUE) {
                echo "Status pengajuan berhasil diperbarui.";
            } else {
                echo "Error: " . $conn->error;
            }

            // Update status pembayaran
            $update_pembayaran_sql = "UPDATE verifikasi_pembayaran 
                                      SET status_pembayaran = '$status_pembayaran' 
                                      WHERE pengajuan_id = '$id_pengajuan'";

            if ($conn->query($update_pembayaran_sql) === TRUE) {
                echo "Status pembayaran berhasil diperbarui.";
            } else {
                echo "Error: " . $conn->error;
            }
        }
    }
    ?>
    <!-- Footer Section -->
    <footer class="footer">
        <p>&copy; 2024 TitipKos. Semua hak cipta dilindungi.</p>
    </footer>
</body>

</html>
