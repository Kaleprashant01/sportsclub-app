<?php
include '../../../db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $ground_id = $_GET['id'];

    $sql = "SELECT * FROM grounds WHERE id = $ground_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display edit form with pre-filled values
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Ground</title>
            <style>
                 body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
            </style>

        </head>
        <body>
            <div class="container">
                <h2>Edit Ground</h2>
                <form action="update_ground.php" method="POST">
                    <input type="hidden" name="ground_id" value="<?php echo $row['id']; ?>">
                    <label for="ground_name">Ground Name:</label>
                    <input type="text" id="ground_name" name="ground_name" value="<?php echo $row['ground_name']; ?>" required><br><br>

                    <label for="location_id">Location:</label>
                    <select id="location_id" name="location_id" required>
                        <?php
                        $sql_locations = "SELECT * FROM locations";
                        $result_locations = $conn->query($sql_locations);

                        if ($result_locations->num_rows > 0) {
                            while ($location = $result_locations->fetch_assoc()) {
                                $selected = ($location['id'] == $row['location_id']) ? 'selected' : '';
                                echo "<option value='" . $location['id'] . "' $selected>" . $location['location_name'] . "</option>";
                            }
                        }
                        ?>
                    </select><br><br>

                    <label for="sport_type">Sport Type:</label>
                    <input type="text" id="sport_type" name="sport_type" value="<?php echo $row['sport_type']; ?>" required><br><br>

                    <button type="submit">Update Ground</button>
                </form>
            </div>
        </body>
        </html>
<?php
    } else {
        echo "Ground not found.";
    }
} else {
    echo "Invalid request.";
}
$conn->close();
?>
