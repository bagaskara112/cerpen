<?php
include 'config.php';
include 'header.php';

$id = $_GET['id'];
$sql = "SELECT judul, kategori, deskripsi, konten, gambar FROM cerita WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$cerita = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $konten = $_POST['konten'];
    $gambar = $cerita['gambar'];

    if (!empty($_FILES["gambar"]["name"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if ($check !== false && $_FILES["gambar"]["size"] <= 5000000 && in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                $gambar = $target_file;
            }
        }
    }

    $sql = "UPDATE cerita SET judul = ?, kategori = ?, deskripsi = ?, konten = ?, gambar = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissssi", $judul, $kategori, $deskripsi, $konten, $gambar, $id);

    if ($stmt->execute()) {
        header('Location: admin_fitur.php');
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Cerita</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="form-container">
        <h2>Edit Cerita</h2>
        <form method="post" enctype="multipart/form-data">
            <label for="judul">Judul</label>
            <input type="text" id="judul" name="judul" value="<?= htmlspecialchars($cerita['judul']) ?>" required>

            <label for="kategori">Kategori</label>
            <select id="kategori" name="kategori" required>
                <option value="fiksi" <?= $cerita['kategori'] == 'fiksi' ? 'selected' : '' ?>>Fiksi</option>
                <option value="non-fiksi" <?= $cerita['kategori'] == 'non-fiksi' ? 'selected' : '' ?>>Non-Fiksi</option>
                <option value="horor" <?= $cerita['kategori'] == 'horor' ? 'selected' : '' ?>>Horor</option>
                <option value="romansa" <?= $cerita['kategori'] == 'romansa' ? 'selected' : '' ?>>Romansa</option>
                <option value="fantasi" <?= $cerita['kategori'] == 'fantasi' ? 'selected' : '' ?>>Fantasi</option>
            </select>

            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="3"
                required><?= htmlspecialchars($cerita['deskripsi']) ?></textarea>

            <label for="konten">Konten</label>
            <textarea id="konten" name="konten" rows="10" required><?= htmlspecialchars($cerita['konten']) ?></textarea>

            <label for="gambar">Upload Gambar</label>
            <input type="file" id="gambar" name="gambar">

            <div class="form-actions">
                <button type="submit" class="btn">Update</button>
                <a href="admin_fitur.php" class="btn btn-cancel">Kembali</a>
            </div>
        </form>
    </div>
</body>

</html>
<?php
$stmt->close();
$conn->close();
?>