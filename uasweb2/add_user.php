<?php
include 'config.php';

$nim = "211011401064";
$password = "160802";

// Hash password sebelum disimpan ke database
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (nim, password, gender) VALUES ('$nim', '$hashed_password', '$gender')";

if ($conn->query($sql) === TRUE) {
    echo "New user added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
