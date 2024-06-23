<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["locationName"])) {
    $servername = "127.0.0.1:4306";
    $username = "root";
    $password = "";
    $dbname = "sports_db";

    $locationName = $_POST["locationName"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO locations (location_name) VALUES ('$locationName')";

    if ($conn->query($sql) === TRUE) {
        echo "Location added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
