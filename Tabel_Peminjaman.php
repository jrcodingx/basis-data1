<?php
// Konfigurasi koneksi database 
include 'config.php';

// Ambil data dari tabel
$sql = "SELECT * FROM tbl_peminjaman ORDER BY Kode_Peminjaman DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
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
    <h2>Daftar Peminjaman</h2>
    <a href="add.php?tabel=tbl_peminjaman">+ Tambah Peminjaman Baru</a>
    <br><br>

    <table>
        <tr>
            <th>No</th>
            <th>Kode Peminjaman</th>
            <th>ID Buku</th>
            <th>ID Anggota</th>
            <th>Nama</th>
            <th>Judul</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $no = 1;
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$no++."</td>
                        <td>".$row['kode_peminjaman']."</td>
                        <td>".$row['id_buku']."</td>
                        <td>".$row['id_anggota']."</td>
                        <td>".$row['nama']."</td>
                        <td>".$row['judul']."</td>
                        <td>".$row['status']."</td>
                        <td>
                            <a href='edit.php?id=".$row['Kode_Peminjaman']."'>Edit</a> |
                            <a href='delete.php?id=".$row['Kode_Peminjaman']."' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>Belum ada peminjaman.</td></tr>";
        }
        ?>
    </table>
    <a href="./">Kembali</a>
</body>
</html>
