<?php
// Include database connection
include '../../../db_conn.php';

// Retrieve form data
$name = $_POST['name'];
$category = $_POST['category'];
$description = $_POST['description'];
$image_path = $_POST['image_path'];

// Insert new facility into database
$sql = "INSERT INTO facilities (name, category, description, image_path) VALUES ('$name', '$category', '$description', '$image_path')";
if ($conn->query($sql) === TRUE) {
    header("Location: facilities.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>
