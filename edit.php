<?php 
// Konfigurasi koneksi database 
include 'config.php';
 
// Ambil data berdasarkan ID 
if (isset($_GET['id'])) { 
    $id = intval($_GET['id']); 
    $query = "SELECT * FROM tbl_anggota WHERE id_anggota = $id"; 
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
 
// Proses saat form disubmit 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $nim        = htmlspecialchars($_POST['nim']); 
    $nama       = htmlspecialchars($_POST['nama']); 
    $prodi      = htmlspecialchars($_POST['prodi']); 
    $tgl_daftar = $_POST['tgl_daftar']; 
    $status     = $_POST['status']; 
 
    $update = "UPDATE tbl_anggota SET 
                nim = '$nim', 
                nama = '$nama', 
                prodi = '$prodi', 
                tgl_daftar = '$tgl_daftar', 
                status = '$status' 
               WHERE id_anggota = $id"; 
 
    if ($conn->query($update) === TRUE) { 
        echo "<p style='color:green;'>Data berhasil diperbarui!</p>"; 
        // Redirect kembali ke view.php 
        echo "<meta http-equiv='refresh' content='1;url=Tabel_Anggota.php'>"; 
    } else { 
        echo "<p style='color:red;'>Gagal memperbarui data: " . $conn
>error . "</p>"; 
    } 
} 
?> 
 
<!DOCTYPE html> 
<html> 
<head> 
    <title>Edit Anggota</title> 
</head> 
<body> 
    <h2>Edit Data Anggota</h2> 
    <form method="POST" action=""> 
        <label>NIM:</label><br> 
        <input type="text" name="nim" value="<?= $data['nim'] ?>" 
required><br><br> 
 
        <label>Nama:</label><br> 
        <input type="text" name="nama" value="<?= $data['nama'] ?>" 
required><br><br> 
 
        <label>Program Studi:</label><br> 
        <input type="text" name="prodi" value="<?= $data['prodi'] ?>" 
required><br><br> 
 
        <label>Tanggal Daftar:</label><br> 
        <input type="date" name="tgl_daftar" value="<?= $data['tgl_daftar'] 
?>" required><br><br> 
 
        <label>Status:</label><br> 
        <select name="status" required> 
            <option value="Aktif" <?= $data['status'] == 'Aktif' ? 
'selected' : '' ?>>Aktif</option> 
            <option value="Nonaktif" <?= $data['status'] == 'Nonaktif' ? 
'selected' : '' ?>>Nonaktif</option> 
        </select><br><br> 
 
        <input type="submit" value="Update"> 
        <a href="view.php">Batal</a> 
    </form> 
</body> 
</html> 
