<?php
include 'config.php';
include 'header.php';

// Proses Delete
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM cerita WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// Query untuk mendapatkan semua cerita
$sql = "SELECT id, judul, kategori, deskripsi, gambar FROM cerita";
$result = $conn->query($sql);
?>

<div class="content-container">
    <h2>Daftar Cerita</h2>
    <a href="tambah.php" class="btn">Tambah Cerita</a>
    <table class="cerita-table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['judul']) ?></td>
                <td><?= htmlspecialchars($row['kategori']) ?></td>
                <td><?= htmlspecialchars($row['deskripsi']) ?></td>
                <td><img src="<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['judul']) ?>"
                        class="gambar-cerita"></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn">Edit</a>
                    <a href="admin_fitur.php?delete_id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
            <?php else: ?>
            <tr>
                <td colspan="5">Tidak ada cerita.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
include 'footer.php';
$conn->close();
?>