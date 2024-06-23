<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include '../../../db_conn.php';
    
    // Retrieve form data
    $sport_name = $_POST['sport_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Prepare and execute SQL statement to insert data
    $sql = "INSERT INTO sports (sport_name, description, price) VALUES ('$sport_name', '$description', '$price')";

    if ($conn->query($sql) === TRUE) {
        
        $_SESSION['status']= "New sport added successfully!";
        $_SESSION['status_code']="success";
        header('location:view_sport.php');
    
    } else {
        $_SESSION['status']= " Sport Not Added !";
        $_SESSION['status_code']="error";
        header('location:sports.php');
    }

    // Close database connection
    $conn->close();
}
?>
