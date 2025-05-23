<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Konfigurasi koneksi database 
include 'config.php'; 
 
// Proses form saat disubmit 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $id_buku        = intval($_POST['id_buku']); 
    $id_anggota     = intval($_POST['id_anggota']); 
    $nama           = htmlspecialchars($_POST['nama']); 
    $judul          = htmlspecialchars($_POST['judul']); 
    $tgl_peminjaman = $_POST['tgl_peminjaman']; 
    $status         = $_POST['status']; 
 
    $sql = "INSERT INTO tbl_peminjaman (id_buku, id_anggota, nama, judul, tgl_peminjaman, status) 
            VALUES ('$id_buku', '$id_anggota', '$nama', '$judul', '$tgl_peminjaman', '$status')"; 
 
    if ($conn->query($sql) === TRUE) { 
        echo "<p style='color:green;'>Peminjaman berhasil ditambahkan!</p>"; 
        echo "<meta http-equiv='refresh' content='1;url=Tabel_Peminjaman.php'>"; 
    } else { 
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>"; 
    } 
} 
?> 
 
<!DOCTYPE html> 
<html> 
<head> 
    <title>Tambah Peminjaman Buku</title> 
</head> 
<body> 
    <h2>Form Tambah Peminjaman</h2> 
    <form method="POST" action=""> 
        <label>ID Buku:</label><br> 
        <input type="number" name="id_buku" required><br><br> 
 
        <label>ID Anggota:</label><br> 
        <input type="number" name="id_anggota" required><br><br> 
 
        <label>Nama Peminjam:</label><br> 
        <input type="text" name="nama" required><br><br> 
 
        <label>Judul Buku:</label><br> 
        <input type="text" name="judul" required><br><br> 
 
        <label>Tanggal Peminjaman:</label><br> 
        <input type="datetime-local" name="tgl_peminjaman" required><br><br> 
 
        <label>Status:</label><br> 
        <select name="status" required> 
            <option value="BELUM">BELUM</option> 
            <option value="SUDAH">SUDAH</option> 
        </select><br><br> 
 
        <input type="submit" value="Simpan"> 
        <a href="Tabel_Peminjaman.php">Batal</a> 
    </form> 
</body> 
</html>
