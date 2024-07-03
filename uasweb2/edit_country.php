<?php
session_start();
include 'config.php';

if (!isset($_SESSION['nim']) || substr($_SESSION['nim'], -1) % 2 !== 0) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['tim'];
    $wins = $_POST['menang'];
    $draws = $_POST['seri'];
    $losses = $_POST['kalah'];
    $points = $_POST['poin'];

    $sql = "UPDATE countries SET tim='$tim', menang='$menang', seri='$seri', kalah='$kalah', poin='$poin' WHERE id='$id' AND group_id=3";

    if ($conn->query($sql) === TRUE) {
        echo "Country updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM countries WHERE id='$id' AND group_id=3";
    $result = $conn->query($sql);
    $country = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Country</title>
</head>
<body>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $country['id']; ?>">
        Nama Negara: <input type="text" name="tim" value="<?php echo $country['tim']; ?>" required><br>
        Jumlah Menang: <input type="number" name="menang" value="<?php echo $country['menang']; ?>" required><br>
        Jumlah Seri: <input type="number" name="seri" value="<?php echo $country['seri']; ?>" required><br>
        Jumlah Kalah: <input type="number" name="kalah" value="<?php echo $country['kalah']; ?>" required><br>
        Jumlah Poin: <input type="number" name="poin" value="<?php echo $country['poin']; ?>" required><br>
        <input type="submit" value="Update Country">
    </form>
</body>
</html>
