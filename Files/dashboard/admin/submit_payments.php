<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../../js/sweetalert.js"></script>
    <title>Google Pay UPI Payment Form</title>
    <style>
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Google Pay UPI Payment Form</h2>
        <form id="paymentForm" method="post" action="process_payment.php">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="upiId">UPI ID:</label>
                <input type="text" id="upiId" name="upiId" required>
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="text" id="amount" name="amount" required>
            </div>
            <button type="submit">Pay with Google Pay</button>
        </form>
    </div>
</body>
</html>
