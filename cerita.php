<?php
include 'config.php';
include 'header.php';

$id = $_GET['id'];
$sql = "SELECT judul, deskripsi, konten FROM cerita WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$cerita = $result->fetch_assoc();

if (!$cerita) {
    die("Cerita tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($cerita['judul']) ?></title>
    <link rel="stylesheet" href="styles.css">
    <style>
    .cerita-judul {
        text-align: center;
        font-size: 32px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #2c3e50;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .cerita-deskripsi {
        text-align: center;
        font-size: 18px;
        margin-bottom: 20px;
        font-style: italic;
        line-height: 1.6;
    }

    .cerita-konten {
        font-size: 16px;
        line-height: 1.5;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
        margin: 20px auto;
        max-width: 1200px;
    }

    .btn-kembali {
        display: block;
        width: fit-content;
        margin: 20px auto;
        padding: 10px 20px;
        background-color: #3498db;
        color: #ffffff;
        text-decoration: none;
        border-radius: 5px;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .btn-kembali:hover {
        background-color: #2980b9;
    }
    </style>
</head>

<body>
    <h1 class="cerita-judul"><?= htmlspecialchars($cerita['judul']) ?></h1>
    <p class="cerita-deskripsi"><strong>Deskripsi:</strong> <?= htmlspecialchars($cerita['deskripsi']) ?></p>
    <p class="cerita-konten"><?= nl2br(htmlspecialchars($cerita['konten'])) ?></p>
    <a href="index.php" class="btn-kembali">Kembali</a>
</body>

</html>
<?php
include 'footer.php';
?>