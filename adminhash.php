<?php
$password = 'admin123';  // Ganti dengan password yang diinginkan
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo $hashed_password;  // Ini akan menampilkan hash yang dapat Anda masukkan ke dalam database
?>
