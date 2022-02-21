<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jatin";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die('Error : Cannot connect');
}
