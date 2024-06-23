<?php
// Include database connection
include '../../../db_conn.php';

// Fetch bookings from the database
$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>View Bookings</h2>
    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Email</th><th>Phone</th><th>Sport</th><th>Time</th><th>Total Price</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['sport'] . "</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['totalPrice'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No bookings found.";
    }
    ?>
</body>
</html>
