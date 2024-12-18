<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $status_pengajuan = $_POST['status_pengajuan'];
        $status_pembayaran = $_POST['status_pembayaran'];

        // Memperbarui status pengajuan pada tabel pengajuan
        $sql = "UPDATE pengajuan SET status = '$status_pengajuan' WHERE id = '$id'";

        if ($conn->query($sql) === TRUE) {
            echo "Status pengajuan berhasil diperbarui.<br>";
        } else {
            echo "Error: " . $conn->error . "<br>";
        }

        // Memperbarui status pembayaran pada tabel verifikasi_pembayaran
        $sql_pembayaran = "UPDATE verifikasi_pembayaran SET status_pembayaran = '$status_pembayaran' WHERE pengajuan_id = '$id'";

        if ($conn->query($sql_pembayaran) === TRUE) {
            echo "Status pembayaran berhasil diperbarui.";
        } else {
            echo "Error: " . $conn->error . "<br>";
        }
    }
}
?>
