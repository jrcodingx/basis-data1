<?php
// Konfigurasi koneksi database
$host = "localhost";
$port = "5432"; // Port default PostgreSQL
$dbname = "db_perpustakaan_pg";
$user = "perpus_pg";
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
