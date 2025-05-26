<?php 
// Konfigurasi koneksi database 
include 'config.php';
 
// Ambil data dari tabel 
$sql = "SELECT * FROM tbl_buku ORDER BY id_buku DESC"; 
$result = pg_query($conn, $sql); 
?> 
 
<!DOCTYPE html> 
<html> 
<head> 
    <title>Data Buku Perpustakaan</title> 
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
    <h2>Daftar Buku Perpustakaan</h2> 
    <a href="addbuku.php?tabel=tbl_buku">+ Tambah Buku Baru</a> 
    <br><br> 
 
    <table> 
        <tr> 
            <th>No</th> 
            <th>Isbn</th> 
            <th>Judul</th> 
            <th>Pengarang</th> 
            <th>Penerbit</th> 
            <th>Tahun Terbit</th> 
            <th>Kategori</th> 
            <th>Jumlah Buku</th> 
            <th>Aksi</th> 
        </tr> 
        <?php 
        if ($result && pg_num_rows($result) > 0) { 
            $no = 1; 
            while($row = pg_fetch_assoc($result)) { 
                echo "<tr> 
                        <td>".$no++."</td> 
                        <td>".$row['isbn']."</td> 
                        <td>".$row['judul']."</td> 
                        <td>".$row['pengarang']."</td> 
                        <td>".$row['penerbit']."</td> 
                        <td>".$row['tahun_terbit']."</td> 
                        <td>".$row['kategori']."</td> 
                        <td>".$row['jumlah_buku']."</td> 
                        <td> 
                            <a href='editbuku.php?id=".$row['id_buku']."'>Edit</a> |  
                            <a href='deletebuku.php?id=".$row['id_buku']."' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a> 
                        </td> 
                      </tr>"; 
            } 
        } else { 
            echo "<tr><td colspan='9'>Belum ada data buku.</td></tr>"; 
        } 
        ?> 
    </table> 
    <a href="./">Kembali</a>
</body> 
</html>
