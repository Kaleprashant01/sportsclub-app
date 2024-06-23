<?php
// Database connection parameters (same as above)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_POST['image'];

    // Update news entry in database
    $sql = "UPDATE news SET title = '$title', content = '$content', image = '$image' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "News updated successfully";
    } else {
        echo "Error updating news: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
