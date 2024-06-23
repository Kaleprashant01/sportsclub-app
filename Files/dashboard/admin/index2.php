<?php
// Include database connection file
include_once '../../../db_connect.php';

// Check if user is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

// Get data for pie chart
$query = "SELECT sport, COUNT(*) as count FROM bookings GROUP BY sport";
$result = mysqli_query($conn, $query);
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = array('label' => $row['sport'], 'value' => $row['count']);
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div class="sidebar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="bookings.php">Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sports.php">Sports</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="users.php">Users</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10">
                <div class="content">
                    <h1>Admin Dashboard</h1>
                    <div class="chart-container">
                        <canvas id="pie-chart"></canvas>
                    </div>
                    <script>
                        var ctx = document.getElementById('pie-chart').getContext('2d');
                        var chart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: <?php echo json_encode(array_column($data, 'label')); ?>,
                                datasets: [{
                                    data: <?php echo json_encode(array_column($data, 'value')); ?>,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                title: {
                                    display: true,
                                    text: 'Sports Booking Distribution'
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</body>
</html>