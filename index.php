<?php
include 'db.php';
$result = $conn->query("SELECT * FROM alternatif");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Selamat Datang</title>
</head>
<body>
    <h1>Selamat Datang di DSS Pemilihan Tempat Magang</h1>
    <h2>Daftar Tempat Magang</h2>
    <table border="1">
        <tr>
            <th>Nama Tempat Magang</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['nama_alternatif']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="penilaian.php">Berikan Penilaian</a>
    <a href="hasil.php">Lihat Hasil Penilaian</a>
</body>
</html>
