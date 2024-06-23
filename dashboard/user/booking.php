<!-- index.php -->

<?php
session_start();

// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// If the user is logged in, welcome message
$welcomeMessage = "Welcome, " . $_SESSION['username'] . "!";

// Booking form submission logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your form submission handling code here
    $bookingStatus = "Your booking has been successfully submitted!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPORTS CLUB | Booking Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- User welcome message -->
    <div class="welcome-message"><?php echo $welcomeMessage; ?></div>

    <!-- Booking Form -->
    <div class="booking-form">
        <h2>Booking Form</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!-- Your booking form fields here -->
            <label for="sport">Sport:</label>
            <input type="text" id="sport" name="sport" required>
            <label for="time">Time:</label>
            <input type="text" id="time" name="time" required>
            <button type="submit">Submit Booking</button>
        </form>
    </div>

    <!-- Booking Status -->
    <?php if (isset($bookingStatus)) { ?>
        <div class="booking-status">
            <?php echo $bookingStatus; ?>
        </div>
    <?php } ?>

    <a href="logout.php">Logout</a>

</body>
</html>
