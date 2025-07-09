<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Proses untuk menghapus cerita
    $sql = "DELETE FROM cerita WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    header('Location: index.php');
    exit();
}
?>