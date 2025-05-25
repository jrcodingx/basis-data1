
<?php
// Konfigurasi koneksi PostgreSQL
$host = "localhost";
$port = "5432";  // default port PostgreSQL
$dbname = "db_perpustakaan";
$user = "perpus";
$pass = "passwordku123";

// Membuat koneksi
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . pg_last_error());
} else {
    echo "Koneksi berhasil!";
}
?>
