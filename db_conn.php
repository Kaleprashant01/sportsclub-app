<?php
$host = "127.0.0.1:4306";
$username = "root";
$password = "";
$database = "sports_db";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

