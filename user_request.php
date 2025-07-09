<?php
include 'config.php';
include 'header.php';

// Proses Form Request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];
    // Simpan request ke database
    $sql = "INSERT INTO user_requests (nama, email, pesan) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nama, $email, $pesan);
    $stmt->execute();
    $stmt->close();
}
?>

<div class="form-container">
    <h2>Saran dan Request</h2>
    <form method="post" action="user_request.php">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="pesan">Pesan:</label>
        <textarea id="pesan" name="pesan" rows="5" required></textarea>
        <button type="submit" class="btn">Kirim Request</button>
    </form>
</div>

<?php
include 'footer.php';
$conn->close();
?>