<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $userQuery = "SELECT * FROM user WHERE id = '$user_id'";
   
}
//} else {
//    header('Location:login.php');
//}
include_once "header.php";
include_once "sidebar.php";


if (isset($_GET['room_mang'])) {
    include_once "room_mang.php";
} elseif (isset($_GET['dashboard'])) {
    include_once "dashboard.php";
} elseif (isset($_GET['map'])) {
    include_once "map.php";
} elseif (isset($_GET['reservation'])) {
    include_once "reservation.php";
} elseif (isset($_GET['register'])) {
    include_once "register.php";
} elseif (isset($_GET['staff_mang'])) {
    include_once "staff_mang.php";
} elseif (isset($_GET['add_emp'])) {
    include_once "add_emp.php";
} elseif (isset($_GET['price'])) {
    include_once "price.php";
} elseif (isset($_GET['smeni'])) {
    include_once "smeni.php";
} elseif (isset($_GET['system_settings'])) {
    include_once "system_settings.php";
} elseif (isset($_GET['statistics'])) {
    include_once "statistics.php";
} elseif (isset($_GET['emp_history'])) {
    include_once "emp_history.php";
} else {
    include_once "room_mang.php";
}

include_once "footer.php";
