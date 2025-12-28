<?php
header('Content-Type: application/json');
include 'config.php';

$sql = "SELECT id, first_name, last_name, birth_date, email, gender, phone, address FROM datauser";
$result = $conn->query($sql);

$data = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);
$conn->close();
?>
