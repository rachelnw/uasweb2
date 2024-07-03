<?php
session_start();

if (!isset($_SESSION['nim'])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION['gender'] !== 'female' || substr($_SESSION['nim'], -1) % 2 !== 0) {
    echo "Anda tidak memiliki akses untuk memasukkan data ke grup C.";
    exit;
}

echo "Selamat datang di data grup UEFA 2024 " . $_SESSION['nim'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <ul>
        <li><a href="add_country.php">Add Country</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>
