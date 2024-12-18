<?php
// db.php: Koneksi ke database
include 'db.php';

// Cek apakah ada parameter ID yang diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT p.*, v.status_pembayaran FROM pengajuan p
            LEFT JOIN verifikasi_pembayaran v ON p.id = v.pengajuan_id
            WHERE p.id = '$id'";
    $result = $conn->query($sql);
    $pengajuan = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Verifikasi Pengajuan</title>
</head>
<body>
    <h2>Update Verifikasi Pengajuan</h2>
    <form action="update_status.php" method="POST">
        <input type="hidden" name="id" value="<?= $pengajuan['id']; ?>">

        <div class="form-group">
            <label for="status_pengajuan">Status Pengajuan</label>
            <select name="status_pengajuan" required>
                <option value="Belum Verifikasi" <?= $pengajuan['status'] === 'Belum Verifikasi' ? 'selected' : ''; ?>>Belum Verifikasi</option>
                <option value="Diterima" <?= $pengajuan['status'] === 'Diterima' ? 'selected' : ''; ?>>Diterima</option>
                <option value="Ditolak" <?= $pengajuan['status'] === 'Ditolak' ? 'selected' : ''; ?>>Ditolak</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status_pembayaran">Status Pembayaran</label>
            <select name="status_pembayaran" required>
                <option value="Belum Terverifikasi" <?= $pengajuan['status_pembayaran'] === 'Belum Terverifikasi' ? 'selected' : ''; ?>>Belum Terverifikasi</option>
                <option value="Diterima" <?= $pengajuan['status_pembayaran'] === 'Diterima' ? 'selected' : ''; ?>>Diterima</option>
                <option value="Ditolak" <?= $pengajuan['status_pembayaran'] === 'Ditolak' ? 'selected' : ''; ?>>Ditolak</option>
            </select>
        </div>

        <h3>Informasi Pengajuan</h3>
        <p><strong>Nama Pemilik:</strong> <?= $pengajuan['nama_pemilik']; ?></p>
        <p><strong>Nama Barang:</strong> <?= $pengajuan['nama_barang']; ?></p>
        <p><strong>Deskripsi Barang:</strong> <?= $pengajuan['deskripsi']; ?></p>
        <p><strong>Ukuran:</strong> <?= ucfirst($pengajuan['ukuran']); ?></p>
        <p><strong>Alamat:</strong> <?= $pengajuan['alamat']; ?></p>
        <p><strong>Telepon:</strong> <?= $pengajuan['telepon']; ?></p>
        <p><strong>Foto Barang:</strong> <img src="<?= $pengajuan['foto_barang']; ?>" alt="Foto Barang" width="150"></p>

        <button type="submit">Update</button>
    </form>
</body>
</html>
