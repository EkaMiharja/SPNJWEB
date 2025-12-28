<?php
include 'config.php';

$firstName = $_POST['firstName'];
$lastName  = $_POST['lastName'];
$birthDate = $_POST['birthDate'];
$email     = $_POST['email'];
$gender    = $_POST['gender'];
$phone     = $_POST['phone'];
$password  = password_hash($_POST['password'], PASSWORD_DEFAULT);
$address   = $_POST['address'];

$sql = "INSERT INTO datauser (first_name, last_name, birth_date, email, gender, phone, password, address)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $firstName, $lastName, $birthDate, $email, $gender, $phone, $password, $address);

if ($stmt->execute()) {
    header("Location: user.php?success=true");
    exit();
} else {
    header("Location: user.php?success=false");
    exit();
}

$stmt->close();
$conn->close();
?>
