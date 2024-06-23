<?php
include "../../../db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ground_id = $_POST['ground_id'];
    $sport_type = $_POST['sport_type'];
    $booking_date = $_POST['booking_date'];
    $booking_time = $_POST['booking_time'];
    $duration = $_POST['duration'];

    $sql = "INSERT INTO bookings (ground_id, sport_type, booking_date, booking_time, duration) VALUES ('$ground_id', '$sport_type', '$booking_date', '$booking_time', '$duration')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
