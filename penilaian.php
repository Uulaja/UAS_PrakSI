<?php
include 'db.php';

// Ambil data alternatif, kriteria, dan skala
$alternatif = $conn->query("SELECT * FROM alternatif");
$kriteria = $conn->query("SELECT * FROM kriteria");
$skala = $conn->query("SELECT * FROM skala");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['nama_user'];
    $id_alternatif = $_POST['alternatif'];

    // Simpan data ke matrix_keputusan
    foreach ($_POST['nilai'] as $id_bobot => $id_skala) {
        $conn->query("INSERT INTO matrix_keputusan (id_alternatif, id_bobot, id_skala)
                      VALUES ('$id_alternatif', '$id_bobot', '$id_skala')");
    }

    // Arahkan ke halaman normalisasi
    header('Location: normalisasi.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container py-5">
        <div class="card bg-dark p-4">
            <h1 class="text-center">Berikan Penilaian</h1>
            <form method="post" class="mt-4">
                <div class="mb-3">
                    <label class="form-label">Nama Anda:</label>
                    <input type="text" name="nama_user" class="form-control bg-dark text-white" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pilih Tempat Magang:</label>
                    <select name="alternatif" class="form-select bg-dark text-white" required>
                        <?php while ($row = $alternatif->fetch_assoc()): ?>
                        <option value="<?= $row['id_alternatif']; ?>"><?= $row['nama_alternatif']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <h3 class="mt-4">Penilaian Kriteria</h3>
                <?php while ($row = $kriteria->fetch_assoc()): ?>
                <div class="mb-3">
                    <label class="form-label"><?= $row['nama_kriteria']; ?>:</label>
                    <select name="nilai[<?= $row['id_kriteria']; ?>]" class="form-select bg-dark text-white" required>
                        <?php foreach ($skala as $s): ?>
                        <option value="<?= $s['id_skala']; ?>"><?= $s['keterangan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php endwhile; ?>
                <button type="submit" class="btn btn-outline-light w-100">Lihat Normalisasi</button>
            </form>
            <a href="index.php" class="btn btn-outline-light mt-3 w-100">Kembali</a>
        </div>
    </div>
</body>
</html>
