<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nama_pemilik'])) {
        $nama_pemilik = $conn->real_escape_string($_POST['nama_pemilik']);
        $nama_barang = $conn->real_escape_string($_POST['nama_barang']);
        $deskripsi = $conn->real_escape_string($_POST['deskripsi']);
        $ukuran = $conn->real_escape_string($_POST['ukuran']);
        $alamat = $conn->real_escape_string($_POST['alamat']);
        $telepon = $conn->real_escape_string($_POST['telepon']);

        if (isset($_FILES['foto_barang'])) {
            $foto_barang = $_FILES['foto_barang'];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($foto_barang["name"]);
            if (move_uploaded_file($foto_barang["tmp_name"], $target_file)) {
                $sql = "INSERT INTO pengajuan (nama_pemilik, nama_barang, deskripsi, ukuran, foto_barang, alamat, telepon)
                        VALUES ('$nama_pemilik', '$nama_barang', '$deskripsi', '$ukuran', '$target_file', '$alamat', '$telepon')";
                if ($conn->query($sql) === TRUE) {
                    echo "Pendaftaran berhasil disimpan.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Gagal mengupload foto.";
            }
        }
    }
}
?>