<?php
// Konfigurasi koneksi database PostgreSQL
$host = "localhost";
$port = "5432";
$dbname = "db_perpustakaan_pg";
$user = "perpus_pg";
$password = "passwordku123";

// Membuat koneksi
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Cek koneksi
if (!$conn) {
    die("Koneksi ke PostgreSQL gagal: " . pg_last_error());
} else {
    echo "Koneksi berhasil!";
}
?>
