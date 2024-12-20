<?php
include 'db.php';

// Ambil data dari view normalisasi
$result = $conn->query("SELECT * FROM normalisasi");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Normalisasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container py-5">
        <div class="card bg-dark p-4">
            <h1 class="text-center">Hasil Normalisasi</h1>
            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th>Nama Tempat Magang</th>
                        <th>Nama Kriteria</th>
                        <th>Normalisasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['nmalternatif']; ?></td>
                        <td><?= $row['nm_kriteria']; ?></td>
                        <td><?= round($row['normalisasi'], 3); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <a href="hasil.php" class="btn btn-outline-light w-100 mt-4">Lanjut ke Ranking</a>
        </div>
    </div>
</body>
</html>