<?php
session_start();
include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $people = $_POST["people"];
    $time = $_POST["time"];
    $date = $_POST["date"];
    $number = $_POST["number"];

    // Validate form data (You can add more validation if needed)

    // Insert data into database
    $sql = "INSERT INTO bookings (name, email, people, time, date, number) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisss", $name, $email, $people, $time, $date, $number);

    if ($stmt->execute()) {
        // Data inserted successfully
        // You can redirect the user to a success page or show a success message
        echo "<h2>Booking Successful!</h2>";
        echo "<p>Thank you for booking with us.</p>";
    } else {
        // Error occurred while inserting data
        // You can redirect the user to an error page or show an error message
        echo "<h2>Error:</h2>";
        echo "<p>Sorry, an error occurred while processing your request. Please try again later.</p>";
    }

    $stmt->close();
    $conn->close();
}
?>
