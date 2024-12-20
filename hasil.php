<?php
include 'db.php';

// Ambil data ranking dari view ranking
$result = $conn->query("SELECT * FROM ranking");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Penilaian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container py-5">
        <div class="card bg-dark p-4">
            <h1 class="text-center">Hasil Penilaian</h1>
            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th>Peringkat</th>
                        <th>Nama Tempat Magang</th>
                        <th>Skor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $peringkat = 1; ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $peringkat++; ?></td>
                        <td><?= $row['nmalternatif']; ?></td>
                        <td><?= round($row['rangking'], 3); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <a href="index.php" class="btn btn-outline-light w-100">Kembali</a>
        </div>
    </div>
</body>
</html>
