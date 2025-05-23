<?php 
// Konfigurasi koneksi database 
include 'config.php'; 
 
// Proses hapus data 
if (isset($_GET['id'])) { 
    $id = intval($_GET['id']); 
 
    $sql = "DELETE FROM tbl_anggota WHERE id_anggota = $id"; 
 
    if ($conn->query($sql) === TRUE) { 
        // Redirect kembali ke view.php setelah berhasil hapus 
        header("Location: Tabel_Anggota.php"); 
        exit; 
    } else { 
        echo "Gagal menghapus data: " . $conn->error; 
    } 
} else { 
    echo "ID tidak ditemukan dalam permintaan."; 
} 
?> 
