<?php
$bungalow_type = $_GET['id'];

$conn = mysqli_connect("localhost", "root", "", 'bungalow');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$bungalow_id = rand(1, 1000);
$sql = "INSERT INTO bungalow (bungalow_id, bungalow_type_id, `status`)VALUES ($bungalow_id, $bungalow_type, 0)";
 


if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: index.php?room_mang');
    exit;
} else {
    echo "Error deleting record";
}