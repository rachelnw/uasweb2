<?php
session_start();
include 'config.php';

if (!isset($_SESSION['nim']) || substr($_SESSION['nim'], -1) % 2 !== 0) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $group_id = 3; // ID untuk group C
    $tim = $_POST['tim'];
    $menang = $_POST['menang'];
    $seri = $_POST['seri'];
    $kalah = $_POST['kalah'];
    $poin = $_POST['poin'];

    $sql = "INSERT INTO countries (group_id, tim, menang, seri, kalah, poin) VALUES ('$group_id', '$tim', '$menang', '$seri', '$kalah', '$poin')";

    if ($conn->query($sql) === TRUE) {
        echo "New country added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Country</title>
</head>
<body>
    <form method="post" action="">
        Nama Negara: <input type="text" name="tim" required><br>
        Jumlah Menang: <input type="number" name="menang" required><br>
        Jumlah Seri: <input type="number" name="seri" required><br>
        Jumlah Kalah: <input type="number" name="kalah" required><br>
        Jumlah Poin: <input type="number" name="poin" required><br>
        <input type="submit" value="Add Country">
    </form>
</body>
</html>
