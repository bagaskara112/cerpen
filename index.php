<?php
include 'config.php';
include 'header.php';

// Tentukan jumlah cerita per halaman
$cerita_per_halaman = 10;

// Dapatkan nomor halaman saat ini dari parameter URL, default ke 1 jika tidak ada
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $cerita_per_halaman;

// Query untuk mendapatkan total jumlah cerita
$total_cerita_sql = "SELECT COUNT(*) as total FROM cerita";
$total_cerita_result = $conn->query($total_cerita_sql);
$total_cerita_row = $total_cerita_result->fetch_assoc();
$total_cerita = $total_cerita_row['total'];

// Query untuk mendapatkan cerita dengan limit dan offset
$sql = "SELECT id, judul, kategori, deskripsi, gambar FROM cerita LIMIT $cerita_per_halaman OFFSET $offset";
$result = $conn->query($sql);
?>


<div class="cerita-grid">
    <?php if ($result->num_rows > 0): ?>
    <?php while($row = $result->fetch_assoc()): ?>
    <div class="cerita-item">
        <a href="cerita.php?id=<?= $row['id'] ?>">
            <img src="<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['judul']) ?>"
                class="gambar-cerita">
        </a>
        <div class="cerita-info">
            <h2><?= htmlspecialchars($row['judul']) ?></h2>
            <p><strong>Kategori:</strong> <?= htmlspecialchars($row['kategori']) ?></p>
            <p><?= htmlspecialchars($row['deskripsi']) ?></p>
        </div>
    </div>
    <?php endwhile; ?>
    <?php else: ?>
    <p>Tidak ada cerita.</p>
    <?php endif; ?>
</div>

<!-- Bagian Paginasi -->
<div class="pagination">
    <?php if ($page > 1): ?>
    <a href="?page=<?= $page - 1 ?>" class="page-arrow">&laquo; Prev</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= ceil($total_cerita / $cerita_per_halaman); $i++): ?>
    <a href="?page=<?= $i ?>" class="<?= $i === $page ? 'active' : '' ?>"><?= $i ?></a>
    <?php endfor; ?>

    <?php if ($page < ceil($total_cerita / $cerita_per_halaman)): ?>
    <a href="?page=<?= $page + 1 ?>" class="page-arrow">Next &raquo;</a>
    <?php endif; ?>
</div>

<?php
include 'footer.php';
$conn->close(); 
?>