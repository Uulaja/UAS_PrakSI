<?php
include 'db.php';


$result = $conn->query("SELECT * FROM ranking");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hasil Penilaian</title>
</head>
<body>
    <h1>Hasil Penilaian Tempat Magang</h1>
    <table border="1">
        <tr>
            <th>Peringkat</th>
            <th>Nama Tempat Magang</th>
            <th>Skor</th>
        </tr>
        <?php $peringkat = 1; ?>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $peringkat++; ?></td>
            <td><?= $row['nmalternatif']; ?></td>
            <td><?= round($row['rangking'], 3); ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="index.php">Kembali</a>
</body>
</html>
