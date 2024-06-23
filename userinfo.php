<?php
session_start();

$servername = "127.0.0.1:4306";
$username = "root";
$password = "";
$dbname = "sports_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: ". $conn->connect_error);
}

// Get form data
$user = $_POST['user'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$comment = $_POST['comment'];

// Insert data into database
$sql = "INSERT INTO userinfo (user, email, mobile, comment) VALUES ('$user', '$email','$mobile', '$comment')";

if ($conn->query($sql) === TRUE) {
   
        $_SESSION['status'] ="Message Sent Successfully";
        $_SESSION['status_code']= "success";
         header('Location: index.php');
} else {
    $_SESSION['status'] ="Message not Sent ";
        $_SESSION['status_code']= "error";
         header('Location: index.php');
}

$conn->close();
?>