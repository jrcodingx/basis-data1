<?php
// Konfigurasi koneksi database
$host = "localhost";
$port = "5432"; // Port default PostgreSQL
$dbname = "db_perpustakaan";
$user = "perpus";
$password = "passwordku123";

// Membuat string koneksi
$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

// Membuat koneksi
$conn = pg_connect($conn_string);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . pg_last_error());
}
?>
