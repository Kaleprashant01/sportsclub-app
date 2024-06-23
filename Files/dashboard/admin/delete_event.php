<?php
include "../../../db_conn.php";

if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];
    $sql = "DELETE FROM events WHERE event_id=$event_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: view_event.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
