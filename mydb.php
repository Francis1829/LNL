<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sampledb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection_failed" . $conn->connect_error);
}
?>