<?php
include 'db.php';

// Ambil data alternatif, kriteria, dan skala
$alternatif = $conn->query("SELECT * FROM alternatif");
$kriteria = $conn->query("SELECT * FROM kriteria");
$skala = $conn->query("SELECT * FROM skala");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['nama_user'];
    $id_alternatif = $_POST['alternatif'];

    foreach ($_POST['nilai'] as $id_bobot => $id_skala) {
        $conn->query("INSERT INTO matrix_keputusan (id_alternatif, id_bobot, id_skala)
                      VALUES ('$id_alternatif', '$id_bobot', '$id_skala')");
    }
    header('Location: hasil.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Penilaian</title>
</head>
<body>
    <h1>Berikan Penilaian Tempat Magang</h1>
    <form method="post">
        <label>Nama Anda:</label>
        <input type="text" name="nama_user" required>
        <br><br>
        <label>Pilih Tempat Magang:</label>
        <select name="alternatif" required>
            <?php while ($row = $alternatif->fetch_assoc()): ?>
            <option value="<?= $row['id_alternatif']; ?>"><?= $row['nama_alternatif']; ?></option>
            <?php endwhile; ?>
        </select>
        <br><br>
        <h2>Berikan Penilaian untuk Kriteria</h2>
        <?php while ($row = $kriteria->fetch_assoc()): ?>
            <label><?= $row['nama_kriteria']; ?>:</label>
            <select name="nilai[<?= $row['id_kriteria']; ?>]" required>
                <?php foreach ($skala as $s): ?>
                <option value="<?= $s['id_skala']; ?>"><?= $s['keterangan']; ?></option>
                <?php endforeach; ?>
            </select>
            <br><br>
        <?php endwhile; ?>
        <button type="submit">Simpan Penilaian</button>
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>
