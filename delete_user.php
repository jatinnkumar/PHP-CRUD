<?php
include "conn.php";

if(!isset($_SESSION['email'])) {
    echo "Please login first.";
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $toDeleteUserId = $_POST['id'];
    if($_SESSION['role'] != 1 && $_SESSION['id'] != $toDeleteUserId) {
        echo "Access denied!";
    }
    $queryDeleteUser = "DELETE FROM users WHERE id=\"" . $toDeleteUserId . "\"";
    
    $result = mysqli_query($conn, $queryDeleteUser);
    if($result) {
        echo "User deleted successfully";
    } else {
        echo "User not deleted successfully";
    }
}


?>