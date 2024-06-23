
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Facility</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.container {
    width: 50%;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
}

input[type="text"],
textarea,
input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

textarea {
    height: 100px;
}

button[type="submit"] {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

button[type="submit"] a {
    color: #fff;
    text-decoration: none;
}

button[type="submit"] a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Add New Facility</h2>
        <form action="process_add_facility.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
    </div>
    <div class="form-group">
        <label for="sports_field">Sports Field:</label>
        <select id="sports_field" name="sports_field" required>
            <option value="">Select Sports Field</option>
            <?php
            // Connect to your database
            require '../../include/db_conn.php';

            // Fetch sports fields from the database
            $query = "SELECT * FROM sports";
            $result = mysqli_query($con, $query);

            // Loop through each sports field and create an option in the select dropdown
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="image_path">Image Path:</label>
        <input type="file" id="image_path" name="image_path">
    </div>
    <button type="submit">Add Facility</button>
    <button><a href="facilities.php">View Facility</a></button>
</form>
    </div>
   
</body>
</html>
