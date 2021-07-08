<?php
  $conn = mysqli_connect("localhost", "root", "", 'hotel');
 
  if(ISSET($_POST['update'])){
    $user_id = $_POST['user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
 
    mysqli_query($conn, "UPDATE `user` SET `firstname` = '$firstname', `lastname` = '$lastname', `address` = '$address' WHERE `user_id` = '$user_id'");
 
    header("location: index.php");
  }
?>