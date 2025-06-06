<?php 
// Konfigurasi koneksi database 
include 'config.php';

// Ambil data dari tabel 
$sql = "SELECT * FROM tbl_buku ORDER BY id_buku DESC"; 
$result = $conn->query($sql); 
?> 

<!DOCTYPE html> 
<html> 
<head> 
    <title>Data Anggota Perpustakaan</title> 
    <style> 
        table { 
            border-collapse: collapse; 
            width: 100%; 
        } 
        table, td, th { 
            border: 1px solid #000; 
            padding: 8px; 
        } 
        th { 
            background-color: #eee; 
        } 
    </style> 
</head> 
<body> 
    <h2>Daftar Anggota Perpustakaan</h2> 
    <a href="add.php">+ Tambah Anggota Baru</a> 
    <br><br> 
 
    <table> 
        <tr> 
            <th>No</th> 
            <th>NIM</th> 
            <th>Nama</th> 
            <th>Program Studi</th> 
            <th>Tanggal Daftar</th> 
            <th>Status</th> 
            <th>Aksi</th> 
        </tr> 
        <?php 
        if ($result->num_rows > 0) { 
            $no = 1; 
            while($row = $result->fetch_assoc()) { 
                echo "<tr> 
                        <td>".$no++."</td> 
                        <td>".$row['nim']."</td> 
                        <td>".$row['nama']."</td> 
                        <td>".$row['prodi']."</td> 
                        <td>".$row['tgl_daftar']."</td> 
                        <td>".$row['status']."</td> 
                        <td> 
                            <a 
href='edit.php?id=".$row['id_anggota']."'>Edit</a> |  
                            <a href='delete.php?id=".$row['id_anggota']."' 
onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a> 
                        </td> 
                      </tr>"; 
            } 
        } else { 
            echo "<tr><td colspan='7'>Belum ada data anggota.</td></tr>"; 
        } 
        ?> 
    </table>
    <a href="./">Kembali</a>
    <br><br> 
</body> 
</html>
