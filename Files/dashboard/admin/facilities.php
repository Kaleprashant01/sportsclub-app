<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilities - Sports Club</title>
    <style>
        .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.btn {
    display: inline-block;
    padding: 8px 16px;
    margin-right: 10px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
}

.btn-primary {
    background-color: #007bff;
}

.btn-danger {
    background-color: #dc3545;
}

.facility {
    border: 1px solid #ccc;
    padding: 20px;
    margin-bottom: 20px;
}

.facility h3 {
    margin-top: 0;
}

.facility-image {
    max-width: 100%;
    height: auto;
}

form {
    margin-bottom: 20px;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Facilities</h2>

        <!-- Filter Form -->
        <form action="facilities.php" method="GET">
            <label for="category">Filter by Category:</label>
            <select name="category" id="category">
                <option value="">All Categories</option>
                <option value="Indoor">Indoor</option>
                <option value="Outdoor">Outdoor</option>
                <!-- Add more categories as needed -->
            </select>
            <button type="submit">Filter</button>
        </form>

        <!-- Facility List -->
        <div class="facility-list">
            <?php
            // Include database connection
            include '../../../db_conn.php';

            // Prepare SQL query based on filter criteria
            $sql = "SELECT * FROM facilities WHERE delete_flag = 0";
            if (isset($_GET['category']) && !empty($_GET['category'])) {
                $category = $_GET['category'];
                $sql .= " AND category = '$category'";
            }

            // Execute SQL query
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='facility'>";
                    echo "<h3>" . $row['name'] . "</h3>";
                    echo "<p><strong>Category:</strong> " . $row['category'] . "</p>";
                    echo "<p>" . $row['description'] . "</p>";
                    echo "<img src='" . $row['image_path'] . "' alt='" . $row['name'] . "' class='facility-image'>";
                    echo "<a href='edit_facility.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a>";
                    echo "<a href='delete_facility.php?id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this facility?\")'>Delete</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>No facilities found.</p>";
            }

            // Close database connection
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
