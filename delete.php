<?php 
// Konfigurasi koneksi database 
$host = "localhost"; // atau 127.0.0.1
$user = "perpus";
$pass = "passwordku123";
$db   = "db_perpustakaan";
 
$conn = new mysqli($host, $user, $pass, $db); 
 
// Cek koneksi 
if ($conn->connect_error) { 
    die("Koneksi gagal: " . $conn->connect_error); 
} 
 
// Proses hapus data 
if (isset($_GET['id'])) { 
    $id = intval($_GET['id']); 
 
    $sql = "DELETE FROM tbl_anggota WHERE id_anggota = $id"; 
 
    if ($conn->query($sql) === TRUE) { 
        // Redirect kembali ke view.php setelah berhasil hapus 
        header("Location: view.php"); 
        exit; 
    } else { 
        echo "Gagal menghapus data: " . $conn->error; 
    } 
} else { 
    echo "ID tidak ditemukan dalam permintaan."; 
} 
?> 
