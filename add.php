<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Konfigurasi koneksi database 
$host = "localhost"; 
$user = "root"; 
$pass = ""; // ganti jika password root Anda berbeda 
$db   = "db_perpustakaan"; 
 
$conn = new mysqli($host, $user, $pass, $db); 
 
// Cek koneksi 
if ($conn->connect_error) { 
    die("Koneksi gagal: " . $conn->connect_error); 
} 
 
// Proses form saat disubmit 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $nim        = htmlspecialchars($_POST['nim']); 
    $nama       = htmlspecialchars($_POST['nama']); 
    $prodi      = htmlspecialchars($_POST['prodi']); 
    $tgl_daftar = $_POST['tgl_daftar']; 
    $status     = $_POST['status']; 
 
    $sql = "INSERT INTO tbl_anggota (nim, nama, prodi, tgl_daftar, status) 
            VALUES ('$nim', '$nama', '$prodi', '$tgl_daftar', '$status')"; 
 
    if ($conn->query($sql) === TRUE) { 
        echo "<p style='color:green;'>Data berhasil disimpan!</p>"; 
    } else { 
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>"; 
    } 
} 
?> 
 
<!DOCTYPE html> 
<html> 
<head> 
    <title>Tambah Anggota Perpustakaan</title> 
</head> 
<body> 
    <h2>Form Tambah Anggota</h2> 
    <form method="POST" action=""> 
        <label>NIM:</label><br> 
        <input type="text" name="nim" required><br><br> 
 
        <label>Nama:</label><br> 
        <input type="text" name="nama" required><br><br> 
 
        <label>Program Studi:</label><br> 
        <input type="text" name="prodi" required><br><br> 
 
        <label>Tanggal Daftar:</label><br> 
        <input type="date" name="tgl_daftar" required><br><br> 
 
        <label>Status:</label><br> 
        <select name="status" required> 
            <option value="Aktif">Aktif</option> 
            <option value="Nonaktif">Nonaktif</option> 
        </select><br><br> 
 
        <input type="submit" value="Simpan"> 
    </form> 
</body> 
</html> 
