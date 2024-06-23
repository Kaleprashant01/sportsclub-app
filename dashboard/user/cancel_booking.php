<?php
session_start();
include '../../db_conn.php';

if (isset($_POST['booking_id'])) {
    $booking_id = $_POST['booking_id'];

    // Update the booking status to canceled in the database
    $stmt = $conn->prepare("UPDATE bookings SET status = 'canceled' WHERE id = ?");
    $stmt->bind_param("i", $booking_id);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        // Redirect back to the booking status page with a success message
        header("Location: view_booking.php?success=Booking canceled successfully");
        exit();
    } else {
        // Redirect back to the booking status page with an error message
        header("Location: view_booking.php?error=Failed to cancel booking");
        exit();
    }
} else {
    // If the booking ID is not set, redirect back to the booking status page
    header("Location: view_booking.php");
    exit();
}
?>
