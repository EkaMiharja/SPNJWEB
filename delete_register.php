<?php
include 'config.php';
header('Content-Type: application/json');

$id = intval($_POST['id']);

$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Data berhasil dihapus."]);
} else {
    echo json_encode(["status" => "error", "message" => "Gagal menghapus data."]);
}

$stmt->close();
$conn->close();
?>
