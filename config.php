<?php
// Konfigurasi koneksi database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_perpustakaan";

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
