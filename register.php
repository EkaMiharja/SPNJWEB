<?php
session_start();
header('Content-Type: application/json');
include 'config.php';

if (!$dbConnected) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Koneksi database gagal. Cek konfigurasi di config.php."]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo json_encode(["status" => "error", "message" => "Email sudah terdaftar."]);
    } else {
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            $_SESSION['username'] = $username;  // Simpan username ke session
            echo json_encode(["status" => "success", "message" => "Registrasi berhasil!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Terjadi kesalahan saat menyimpan data."]);
        }
    }
    $stmt->close();
}
$conn->close();
?>

