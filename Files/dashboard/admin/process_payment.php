<?php
// Retrieve payment data from POST request
$name = $_POST['name'];
$upiId = $_POST['upiId'];
$amount = $_POST['amount'];

// Validate form fields (additional validation can be added here)

// Process payment and store data in MySQL database
$servername = "127.0.0.1:4306";
$username = "root";
$password = "";
$dbname = "sports_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to insert payment data into database
$sql = "INSERT INTO google_pay_payments (name, upi_id, amount) VALUES ('$name', '$upiId', '$amount')";

if ($conn->query($sql) === TRUE) {
    echo "Payment processed successfully.";
   
 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
