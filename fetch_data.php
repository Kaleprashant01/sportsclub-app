<?php
require 'db_conn.php';

// Fetch sports
$sports = [];
$sql = "SELECT * FROM sports";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sports[] = $row;
    }
}

// Fetch grounds
$grounds = [];
$sql = "SELECT * FROM grounds";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $grounds[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode(['sports' => $sports, 'grounds' => $grounds]);
?>
