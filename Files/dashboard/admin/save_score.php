<?php
$servername = "127.0.0.1:4306";
$username = "root";
$password = "";
$dbname = "sports_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind parameters
$stmt = $conn->prepare("INSERT INTO scores (runs_scored, balls_faced, overs_bowled, wickets_taken) VALUES (?, ?, ?, ?)");
$stmt->bind_param("iiii", $runs_scored, $balls_faced, $overs_bowled, $wickets_taken);

// Set parameters and execute
$runs_scored = $_POST['runs_scored'];
$balls_faced = $_POST['balls_faced'];
$overs_bowled = $_POST['overs_bowled'];
$wickets_taken = $_POST['wickets_taken'];
$stmt->execute();

echo "New records inserted successfully";

$stmt->close();
$conn->close();
?>
