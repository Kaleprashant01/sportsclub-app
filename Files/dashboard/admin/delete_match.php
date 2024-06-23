<?php
// Database connection
$servername = "127.0.0.1:4306";
$username = "root";
$password = "";
$dbname = "sports_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete match
$id = $_GET['match_id'];

$sql = "DELETE FROM matches WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Match deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
