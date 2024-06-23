<?php
include "../../../db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ground_name = $_POST['ground_name'];
    $location_id = $_POST['location_id'];
    $rate = $_POST['rate'];
    $sport_type = $_POST['sport_type'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $image_path = $target_dir . uniqid() . "." . $imageFileType;

    move_uploaded_file($_FILES["image"]["tmp_name"], $image_path);

    $sql = "INSERT INTO grounds (ground_name, location_id, sport_type, rate, image) VALUES ('$ground_name', '$location_id', '$sport_type', '$rate', '$image_path')";

    if ($conn->query($sql) === TRUE) {
        header("Location: view_ground.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
