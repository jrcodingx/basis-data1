<?php 
// Konfigurasi koneksi database 
include 'config.php';

// Ambil data berdasarkan ID 
if (isset($_GET['id'])) { 
    $id = intval($_GET['id']); 
    $query = "SELECT * FROM tbl_buku WHERE id_buku = $id"; 
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
<?php 
// Konfigurasi koneksi database 
include 'config.php';

// Ambil data berdasarkan ID 
if (isset($_GET['id'])) { 
    $id = intval($_GET['id']); 
    $query = "SELECT * FROM tbl_buku WHERE id_buku = $id"; 
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
    $isbn         = htmlspecialchars($_POST['isbn']); 
    $judul        = htmlspecialchars($_POST['judul']); 
    $pengarang    = htmlspecialchars($_POST['pengarang']); 
    $penerbit     = htmlspecialchars($_POST['penerbit']); 
    $tahun_terbit = htmlspecialchars($_POST['tahun_terbit']); 
    $kategori     = htmlspecialchars($_POST['kategori']); 
    $jumlah_buku  = htmlspecialchars($_POST['jumlah_buku']); 

    $update = "UPDATE tbl_buku SET 
                isbn = '$isbn', 
                judul = '$judul', 
                pengarang = '$pengarang', 
                penerbit = '$penerbit', 
                tahun_terbit = '$tahun_terbit', 
                kategori = '$kategori', 
                jumlah_buku = '$jumlah_buku' 
               WHERE id_buku = $id"; 

    if ($conn->query($update) === TRUE) { 
        echo "<p style='color:green;'>Data berhasil diperbarui!</p>"; 
        echo "<meta http-equiv='refresh' content='1;url=Tabel_Buku.php'>"; 
    } else { 
        echo "<p style='color:red;'>Gagal memperbarui data: " . $conn->error . "</p>"; 
    } 
} 
?>

<!DOCTYPE html> 
<html> 
<head> 
    <title>Edit Buku</title> 
</head> 
<body> 
    <h2>Edit Data Buku</h2> 
    <form method="POST" action=""> 
        <label>ISBN:</label><br> 
        <input type="text" name="isbn" value="<?= $data['isbn'] ?>" required><br><br> 

        <label>Judul:</label><br> 
        <input type="text" name="judul" value="<?= $data['judul'] ?>" required><br><br> 

        <label>Pengarang:</label><br> 
        <input type="text" name="pengarang" value="<?= $data['pengarang'] ?>" required><br><br> 

        <label>Penerbit:</label><br> 
        <input type="text" name="penerbit" value="<?= $data['penerbit'] ?>" required><br><br> 

        <label>Tahun Terbit:</label><br> 
        <input type="text" name="tahun_terbit" value="<?= $data['tahun_terbit'] ?>" required><br><br> 

        <label>Kategori:</label><br> 
        <input type="text" name="kategori" value="<?= $data['kategori'] ?>" required><br><br> 

        <label>Jumlah Buku:</label><br> 
        <input type="number" name="jumlah_buku" value="<?= $data['jumlah_buku'] ?>" required><br><br> 

        <input type="submit" value="Update"> 
        <a href="Tabel_Buku.php">Batal</a> 
    </form> 
</body> 
</html>
