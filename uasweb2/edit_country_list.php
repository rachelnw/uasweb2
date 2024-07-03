<?php
session_start();
include 'config.php';

if (!isset($_SESSION['nim']) || substr($_SESSION['nim'], -1) % 2 !== 0) {
    header("Location: login.php");
    exit;
}

$sql = "SELECT * FROM countries WHERE group_id=3";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Country</title>
</head>
<body>
    <h1>Edit Country</h1>
    <table border="1">
        <tr>
            <th>Nama Negara</th>
            <th>Menang</th>
            <th>Seri</th>
            <th>Kalah</th>
            <th>Poin</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['tim']; ?></td>
            <td><?php echo $row['menang']; ?></td>
            <td><?php echo $row['seri']; ?></td>
            <td><?php echo $row['kalah']; ?></td>
            <td><?php echo $row['poin']; ?></td>
            <td><a href="edit_country.php?id=<?php echo $row['id']; ?>">Edit</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
