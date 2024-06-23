<?php
// Database connection parameters (same as above)
// Database connection parameters
include '../../../db_conn.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all news articles from the database
$sql = "SELECT * FROM news";
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // File upload handling
    $targetDir = "uploads/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $isValid = true;
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');

    // Check if file is a valid image
    if (!in_array($fileType, $allowedTypes)) {
        echo "Error: Only JPG, JPEG, PNG, or GIF files are allowed.";
        $isValid = false;
    }

    // Check file size (max 5MB)
    if ($_FILES["image"]["size"] > 15 * 1024 * 1024) {
        echo "Error: File size exceeds the maximum limit of 15MB.";
        $isValid = false;
    }

   if ($isValid) {
        // Upload file to server
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            // Insert news into database
            $sql = "INSERT INTO news (title, content, image, published_date) VALUES ('$title', '$content', '$fileName', NOW())";
            if ($conn->query($sql) === TRUE) {
                echo "News added successfully";
            } else {
                echo "Error adding news: " . $conn->error;
            }
        } else {
            echo "Error uploading file";
        }
    } else {
        echo "Invalid file format";
    }
}

// Close database connection
$conn->close();
?>