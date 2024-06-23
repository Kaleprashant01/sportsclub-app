<?php
include '../../../db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $ground_id = $_POST['ground_id'];
    $ground_name = $_POST['ground_name'];
    $location_id = $_POST['location_id'];
    $sport_type = $_POST['sport_type'];

    // Update the ground record in the database
    $sql = "UPDATE grounds SET ground_name = '$ground_name', location_id = '$location_id', sport_type = '$sport_type' WHERE id = $ground_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the ground list page after successful update
        header("Location: view_ground.php");
        exit();
    } else {
        // Display error message if update fails
        echo "Error updating ground: " . $conn->error;
    }
} else {
    // Invalid request method
    echo "Invalid request.";
}

$conn->close();
?>
