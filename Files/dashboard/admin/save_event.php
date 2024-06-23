<?php
include "../../../db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_id = $_POST['id'] ?? '';
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_description = $_POST['event_description'];
    $event_location = $_POST['event_location'];

    if ($event_id) {
        // Update event
        $sql = "UPDATE events SET event_name='$event_name', event_date='$event_date', event_description='$event_description', event_location='$event_location' WHERE id=$event_id";
    } else {
        // Add new event
        $sql = "INSERT INTO events (event_name, event_date, event_description, event_location) VALUES ('$event_name', '$event_date', '$event_description', '$event_location')";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: view_event.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
