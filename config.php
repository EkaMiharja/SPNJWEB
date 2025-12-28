<?php
// Konfigurasi koneksi database
$host = "127.0.0.1"; // Sesuaikan jika perlu, mis. "localhost"
$user = "root";
$pass = "";
$db   = "auth_db"; // Ganti sesuai nama database baru Anda
$port = 3306;       // Ganti sesuai port MySQL Anda (default biasanya 3306)

// Jangan menampilkan error ke output agar response tetap valid JSON
// Catat error ke log PHP saja
mysqli_report(MYSQLI_REPORT_OFF);

$conn = @new mysqli($host, $user, $pass, $db, $port);

// Flag yang menandakan koneksi berhasil/gagal
$dbConnected = true;
if ($conn->connect_error) {
    $dbConnected = false;
    error_log("Koneksi database gagal: " . $conn->connect_error);
}
?>
