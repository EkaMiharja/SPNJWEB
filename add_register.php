<?php
include 'config.php';
header('Content-Type: application/json');

$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password_raw = trim($_POST['password']);

$password_hashed = password_hash($password_raw, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $password_hashed);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Data berhasil ditambahkan."]);
} else {
    echo json_encode(["status" => "error", "message" => "Gagal menambahkan data."]);
}

$stmt->close();
$conn->close();
?>
