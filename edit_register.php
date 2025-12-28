<?php
include 'config.php';

$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if (!$id || !$username || !$email) {
  echo json_encode(['status' => 'error', 'message' => 'Data tidak lengkap.']);
  exit;
}

if ($password) {
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  $stmt = $conn->prepare("UPDATE users SET username=?, email=?, password=? WHERE id=?");
  $stmt->bind_param("sssi", $username, $email, $hashedPassword, $id);
} else {
  $stmt = $conn->prepare("UPDATE users SET username=?, email=? WHERE id=?");
  $stmt->bind_param("ssi", $username, $email, $id);
}

if ($stmt->execute()) {
  echo json_encode(['status' => 'success', 'message' => 'Data berhasil diupdate.']);
} else {
  echo json_encode(['status' => 'error', 'message' => 'Gagal mengupdate data.']);
}

$stmt->close();
$conn->close();
?>
