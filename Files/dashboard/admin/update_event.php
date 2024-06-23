<?php
// Include necessary files
require '../../include/db_conn.php';
page_protect();
session_start();

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $event_id = $_POST['event_id'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_description = $_POST['event_description'];
    $event_location = $_POST['event_location'];

    // Update event in the database
    $query = "UPDATE events SET event_name = '$event_name', event_date = '$event_date', event_description = '$event_description', event_location = '$event_location' WHERE event_id = '$event_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Event successfully updated.');</script>";
        // Redirect to view_event.php after successful update
        header("Location: view_event.php");
        exit();
    } else {
        // Handle error if update fails
        echo "Error updating event. Please try again.";
    }
} else {
    // Redirect if accessed directly without form submission
    header("Location: view_event.php");
    exit();
}
?>
