<?php
// Database connection parameters (same as above)
include '../../../db_conn.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete news entry from database
    $sql = "DELETE FROM news WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "News deleted successfully";
    } else {
        echo "Error deleting news: " . $conn->error;
    }
} else {
    echo 'ID parameter is missing.';
}

// Close database connection
$conn->close();
?>
