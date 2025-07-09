<?php
include 'config.php';
include 'header.php';

// Pastikan hanya admin yang bisa mengakses halaman ini
if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit();
}

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM user_requests WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// Query untuk mendapatkan semua request
$sql = "SELECT id, nama, email, pesan, tanggal_request FROM user_requests ORDER BY tanggal_request DESC";
$result = $conn->query($sql);
?>

<div class="content-container">
    <h2>Daftar Request dari User</h2>
    <table class="cerita-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Tanggal Request</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['pesan']) ?></td>
                <td><?= htmlspecialchars($row['tanggal_request']) ?></td>
                <td>
                    <a href="admin_request.php?delete_id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
            <?php else: ?>
            <tr>
                <td colspan="4">Tidak ada request.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
include 'footer.php';
$conn->close();
?>