<?php 
include 'config.php'; 
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Ambil data berdasarkan ID
if (isset($_GET['id'])) { 
    $id = intval($_GET['id']); 
    $query = "SELECT * FROM tbl_peminjaman WHERE kode_peminjaman = $id"; 
    $result = $conn->query($query); 

    if ($result->num_rows === 1) { 
        $data = $result->fetch_assoc(); 
    } else { 
        echo "Data tidak ditemukan."; 
        exit; 
    } 
} else { 
    echo "ID tidak diberikan."; 
    exit; 
} 

// Proses update form
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $id_buku         = intval($_POST['id_buku']); 
    $id_anggota      = intval($_POST['id_anggota']); 
    $nama            = htmlspecialchars($_POST['nama']); 
    $judul           = htmlspecialchars($_POST['judul']); 
    $tgl_peminjaman  = $_POST['tgl_peminjaman']; 
    $status          = $_POST['status']; 

    $update = "UPDATE tbl_peminjaman SET 
                id_buku = $id_buku, 
                id_anggota = $id_anggota, 
                nama = '$nama', 
                judul = '$judul', 
                tgl_peminjaman = '$tgl_peminjaman', 
                status = '$status' 
               WHERE kode_peminjaman = $id"; 

    if ($conn->query($update) === TRUE) { 
        echo "<p style='color:green;'>Data berhasil diperbarui!</p>"; 
        echo "<meta http-equiv='refresh' content='1;url=Tabel_Peminjaman.php'>"; 
    } else { 
        echo "<p style='color:red;'>Gagal memperbarui data: " . $conn->error . "</p>"; 
    } 
}
?> 

<!DOCTYPE html> 
<html> 
<head> 
    <title>Edit Peminjaman</title> 
</head> 
<body> 
    <h2>Edit Data Peminjaman</h2> 
    <form method="POST" action=""> 
        <label>ID Buku:</label><br> 
        <input type="number" name="id_buku" value="<?= $data['id_buku'] ?>" required><br><br> 

        <label>ID Anggota:</label><br> 
        <input type="number" name="id_anggota" value="<?= $data['id_anggota'] ?>" required><br><br> 

        <label>Nama:</label><br> 
        <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br><br> 

        <label>Judul Buku:</label><br> 
        <input type="text" name="judul" value="<?= $data['judul'] ?>" required><br><br> 

        <label>Tanggal Peminjaman:</label><br> 
        <input type="date" name="tgl_peminjaman" value="<?= date('Y-m-d', strtotime($data['tgl_peminjaman'])) ?>" required><br><br>

        <label>Status:</label><br> 
        <select name="status" required> 
            <option value="BELUM" <?= $data['status'] == 'BELUM' ? 'selected' : '' ?>>BELUM</option> 
            <option value="SUDAH" <?= $data['status'] == 'SUDAH' ? 'selected' : '' ?>>SUDAH</option> 
        </select><br><br> 

        <input type="submit" value="Update"> 
        <a href="Tabel_Peminjaman.php">Batal</a> 
    </form> 
</body> 
</html>
