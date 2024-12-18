<?php
include 'db.php';

// Ambil data verifikasi pembayaran yang sudah ada
$sql = "SELECT p.id, p.nama_pemilik, p.nama_barang, p.telepon, p.status, v.status_pembayaran 
        FROM pengajuan p LEFT JOIN verifikasi_pembayaran v ON p.id = v.pengajuan_id 
        WHERE v.status_pembayaran IS NULL OR v.status_pembayaran = 'Belum Terverifikasi'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<h2>Daftar Verifikasi Pembayaran</h2>';
    echo '<table border="1">
            <tr>
                <th>ID Pengajuan</th>
                <th>Nama Pemilik</th>
                <th>Nama Barang</th>
                <th>Telepon</th>
                <th>Status Pengajuan</th>
                <th>Status Pembayaran</th>
            </tr>';
    
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['nama_pemilik'] . '</td>
                <td>' . $row['nama_barang'] . '</td>
                <td>' . $row['telepon'] . '</td>
                <td>' . $row['status'] . '</td>
                <td>' . ($row['status_pembayaran'] ? $row['status_pembayaran'] : 'Belum Terverifikasi') . '</td>
            </tr>';
    }
    echo '</table>';
} else {
    echo '<p>Tidak ada pengajuan pembayaran yang perlu diverifikasi.</p>';
}
?>
