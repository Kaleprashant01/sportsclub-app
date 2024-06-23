<?php
// Include database connection file
include('../../db_conn.php');

if (isset($_POST['join_match'])) {
    $match_id = $_POST['match_id'];
    
    // Implement your logic to join the match here
    // For example, you can update the match status in the database
    $query = "UPDATE matches SET status = 'Joined' WHERE id = '$match_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Successfully joined the match!";
    } else {
        echo "Failed to join the match.";
    }
}

// Close database connection
mysqli_close($conn);
?>
