<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'titipkos');

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
