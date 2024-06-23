<?php
session_start();
include '../../db_conn.php';

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];

// Fetch active bookings made with the logged-in user's email
$active_bookings_query = "SELECT * FROM bookings WHERE email = '$email' AND status = 'active'";
$active_bookings_result = mysqli_query($conn, $active_bookings_query);

// Fetch canceled bookings made with the logged-in user's email
$canceled_bookings_query = "SELECT * FROM bookings WHERE email = '$email' AND status = 'canceled'";
$canceled_bookings_result = mysqli_query($conn, $canceled_bookings_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Status</title>
    <style>
        /* Add your CSS styles here */
        .booking-container {
            margin: 20px auto;
            width: 80%;
            text-align:center;
        }

        .booking {
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        .booking h2 {
            color: #333;
        }

        .booking p {
            margin: 5px 0;
        }

        .status {
            color: red;
        }
    </style>
</head>

<body>
    <div class="booking-container">
        <h1>Booking Status</h1>

        <h2>Active Bookings</h2>
        <?php if (mysqli_num_rows($active_bookings_result) > 0) : ?>
            <?php while ($row = mysqli_fetch_assoc($active_bookings_result)) : ?>
                <div class="booking">
                    <h2>Booking ID: <?php echo $row['id']; ?></h2>
                    <p>Name: <?php echo $row['name']; ?></p>
                    <p>Email: <?php echo $row['email']; ?></p>
                    <p>Date: <?php echo $row['date']; ?></p>
                    <p>Status: Active</p>
                    <form action="cancel_booking.php" method="post">
                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                        <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
                        <input type="submit" name="cancel_booking" value="Cancel">
                    </form>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <p>No active bookings found.</p>
        <?php endif; ?>

        <h2>Canceled Bookings</h2>
        <?php if (mysqli_num_rows($canceled_bookings_result) > 0) : ?>
            <?php while ($row = mysqli_fetch_assoc($canceled_bookings_result)) : ?>
                <div class="booking">
                    <h2>Booking I: <?php echo $row['id']; ?></h2>
                    <p>Name: <?php echo $row['name']; ?></p>
                    <p>Email: <?php echo $row['email']; ?></p>
                    <p>People: <?php echo $row['people']; ?></p>
                    <p>Time: <?php echo $row['time']; ?></p>
                    <p>Date: <?php echo $row['date']; ?></p>
                    <p>Time: <?php echo $row['time']; ?></p>
                    <p>Status: <span class="status">Canceled</span></p>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <p>No canceled bookings found.</p>
        <?php endif; ?>
    </div>
</body>

</html>
