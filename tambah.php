<?php
include 'config.php';
include 'header.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $konten = $_POST['konten'];
    
    // Mengatur direktori penyimpanan gambar
    $target_dir = "uploads/";
    
    // Memastikan direktori uploads ada
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi input
    if (!empty($judul) && !empty($kategori) && !empty($deskripsi) && !empty($konten) && !empty($_FILES["gambar"]["name"])) {
        // Validasi jenis file gambar
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if ($check !== false) {
            // Validasi ukuran file (maksimal 5MB)
            if ($_FILES["gambar"]["size"] <= 5000000) {
                // Validasi ekstensi file
                if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif" ) {
                    // Simpan file gambar ke server
                    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                        // Simpan data cerita ke database
                        $sql = "INSERT INTO cerita (judul, kategori, deskripsi, konten, gambar) VALUES (?, ?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s    ssss", $judul, $kategori, $deskripsi, $konten, $target_file);
                        
                        if ($stmt->execute()) {
                            header('Location: admin_fitur.php');
                            exit;
                        } else {
                            echo "Error: " . $stmt->error;
                        }
                    } else {
                        echo "Maaf, terjadi kesalahan saat mengunggah file.";
                    }
                } else {
                    echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
                }
            } else {
                echo "Maaf, ukuran file terlalu besar.";
            }
        } else {
            echo "Maaf, file bukan gambar.";
        }
    } else {
        echo "Semua field harus diisi.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Cerita</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="form-container">
        <h2>Tambah Cerita</h2>
        <form method="post" enctype="multipart/form-data">
            <label for="judul">Judul</label>
            <input type="text" id="judul" name="judul" required>

            <label for="kategori">Kategori</label>
            <select id="kategori" name="kategori" required>
                <option value="fiksi">Fiksi</option>
                <option value="non-fiksi">Non-Fiksi</option>
                <option value="horor">Horor</option>
                <option value="romansa">Romansa</option>
                <option value="fantasi">Fantasi</option>
            </select>

            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="3" required></textarea>

            <label for="konten">Konten</label>
            <textarea id="konten" name="konten" rows="10" required></textarea>

            <label for="gambar">Upload Gambar</label>
            <input type="file" id="gambar" name="gambar" required>

            <div class="form-actions">
                <button type="submit" class="btn">Tambah</button>
                <a href="admin_fitur.php" class="btn btn-cancel">Kembali</a>
            </div>
        </form>
    </div>
</body>

</html>
