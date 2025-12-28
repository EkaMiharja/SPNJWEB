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
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT username, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($username, $hashedPassword, $role);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            echo json_encode([
                "status" => "success",
                "role" => $role,
                "message" => "Login berhasil!"
            ]);
        } else {
            echo json_encode(["status" => "error", "message" => "Password salah."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Email tidak ditemukan."]);
    }

    $stmt->close();
}
$conn->close();
?>
