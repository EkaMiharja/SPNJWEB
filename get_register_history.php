<?php
include 'config.php';
header('Content-Type: application/json');

$sql = "SELECT id, username, email, created_at FROM users ORDER BY created_at ASC";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
$conn->close();
?>
