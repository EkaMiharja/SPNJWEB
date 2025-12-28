<?php
include 'config.php';
header('Content-Type: application/json');

// Ambil data dari tabel users, gunakan created_at sebagai waktu login
$sql = "SELECT id, email, created_at AS login_time FROM users ORDER BY created_at ASC";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
$conn->close();
?>
