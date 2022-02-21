<?php
session_start();
include "conn.php";
include "function.php";

//something was posted
$firstName = "jatin";
$lastName = "jatt";
$email = "jatan1";
$password = "kuch ni likhna";

$query = "insert into users
(first_name, last_name, email, password)
values ('$firstName', '$lastName', '$email','$password')";

mysqli_query($conn, $query);

?>

<!DOCTYPE html>
