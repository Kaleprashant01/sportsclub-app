<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sports-database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id = $_POST['booking_id'];

    // Delete booking
    $sql = "DELETE FROM bookings WHERE id = $booking_id";
    if ($conn->query($sql) === TRUE) {
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    swal({
                        title: 'Success!',
                        text: 'Booking cancelled successfully.',
                        icon: 'success',
                        button: 'OK'
                    }).then(function() {
                        window.location = 'user.php';
                    });
                });
              </script>";
    } else {
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
                swal({
                    title: 'Error!',
                    text: 'Error cancelling booking: " . $conn->error . "',
                    icon: 'error',
                    button: 'OK'
                }).then(function() {
                    window.history.back();
                });
              </script>";
    }

    $conn->close();
}
?>
