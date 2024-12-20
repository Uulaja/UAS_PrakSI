<?php
include 'db.php';

// Ambil data alternatif untuk ditampilkan
$result = $conn->query("SELECT * FROM alternatif");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSS Tempat Magang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container py-5">
        <h1 class="text-center mb-4">Selamat Datang di DSS Tempat Magang</h1>
        <div class="card bg-dark p-4">
            <h3>Daftar Tempat Magang</h3>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Nama Tempat Magang</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['nama_alternatif']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-around mt-4">
                <a href="penilaian.php" class="btn btn-outline-light">Berikan Penilaian</a>
                <a href="hasil.php" class="btn btn-outline-light">Lihat Hasil Penilaian</a>
            </div>
        </div>
    </div>
</body>
</html>
