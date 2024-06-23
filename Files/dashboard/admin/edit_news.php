<?php
// Database connection parameters (same as above)

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch news details from the database based on ID
    $sql = "SELECT * FROM news WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display form for editing news
        echo '<form action="update_news.php" method="POST">';
        echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
        echo 'Title: <input type="text" name="title" value="' . $row['title'] . '"><br>';
        echo 'Content: <textarea name="content">' . $row['content'] . '</textarea><br>';
        echo 'Image: <input type="text" name="image" value="' . $row['image'] . '"><br>';
        echo '<input type="submit" value="Update News">';
        echo '</form>';
    } else {
        echo 'News not found.';
    }
} else {
    echo 'ID parameter is missing.';
}

// Close database connection
$conn->close();
?>
