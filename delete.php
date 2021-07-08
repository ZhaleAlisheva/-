<?php
$id = $_GET['id'];

$conn = mysqli_connect("localhost", "root", "", 'bungalow');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM bungalow WHERE bungalow_id = $id"; 
//Ако изтриването е успешно те препраща пак на room_mang.php
if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: index.php?room_mang');
    exit;
} else {
    echo "Error deleting record";
}