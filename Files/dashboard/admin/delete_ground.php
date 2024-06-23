<?php
include '../../../db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $ground_id = $_GET['id'];

    $sql = "DELETE FROM grounds WHERE id = $ground_id";

    if ($conn->query($sql) === TRUE) {
        echo "Ground deleted successfully.";
    } else {
        echo "Error deleting ground: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
