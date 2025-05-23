<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Konfigurasi koneksi database 
include 'config.php'; 
 
// Proses form saat disubmit 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $isbn         = htmlspecialchars($_POST['isbn']); 
    $judul        = htmlspecialchars($_POST['judul']); 
    $pengarang    = htmlspecialchars($_POST['pengarang']); 
    $penerbit     = htmlspecialchars($_POST['penerbit']); 
    $tahun_terbit = htmlspecialchars($_POST['tahun_terbit']); 
    $kategori     = htmlspecialchars($_POST['kategori']); 
    $jumlah_buku  = htmlspecialchars($_POST['jumlah_buku']); 
 
    $sql = "INSERT INTO tbl_buku (isbn, judul, pengarang, penerbit, tahun_terbit, kategori, jumlah_buku) 
            VALUES ('$isbn', '$judul', '$pengarang', '$penerbit', '$tahun_terbit', '$kategori', '$jumlah_buku')"; 
 
    if ($conn->query($sql) === TRUE) { 
        echo "<p style='color:green;'>Data berhasil disimpan!</p>"; 
        echo "<meta http-equiv='refresh' content='1;url=Tabel_Buku.php'>"; 
    } else { 
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>"; 
    } 
} 
?> 
 
<!DOCTYPE html> 
<html> 
<head> 
    <title>Tambah Buku Perpustakaan</title> 
</head> 
<body> 
    <h2>Form Tambah Buku</h2> 
    <form method="POST" action=""> 
        <label>ISBN:</label><br> 
        <input type="text" name="isbn" required><br><br> 
 
        <label>Judul:</label><br> 
        <input type="text" name="judul" required><br><br> 
 
        <label>Pengarang:</label><br> 
        <input type="text" name="pengarang" required><br><br> 
 
        <label>Penerbit:</label><br> 
        <input type="text" name="penerbit" required><br><br> 
 
        <label>Tahun Terbit:</label><br> 
        <input type="text" name="tahun_terbit" required><br><br> 
 
        <label>Kategori:</label><br> 
        <input type="text" name="kategori" required><br><br> 
 
        <label>Jumlah Buku:</label><br> 
        <input type="number" name="jumlah_buku" required><br><br> 
 
        <input type="submit" value="Simpan"> 
        <a href="Tabel_Buku.php">Batal</a>
    </form> 
</body> 
</html>
