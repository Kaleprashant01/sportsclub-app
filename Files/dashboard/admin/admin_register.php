<?php
include '../../../db_conn.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Registration</title>
    <style>
        body {
            background: #1690A7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        * {
            font-family: sans-serif;
            box-sizing: border-box;
        }
        form {
            width: 500px;
            border: 2px solid #ccc;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
        }
        h2 {
            text-align: center;
            margin-bottom: 40px;
        }
        input {
            display: block;
            border: 2px solid #ccc;
            width: 95%;
            padding: 10px;
            margin: 10px auto;
            border-radius: 5px;
        }
        label {
            color: #888;
            font-size: 18px;
            padding: 10px;
        }
        button {
            float: right;
            background: #555;
            padding: 10px 15px;
            color: #fff;
            border-radius: 5px;
            margin-right: 10px;
            border: none;
        }
        button:hover {
            opacity: .7;
        }
        .error {
            background: #F2DEDE;
            color: #A94442;
            padding: 10px;
            width: 95%;
            border-radius: 5px;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <form action="register.php" method="post">
        <h2>Admin Registration</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>Username</label>
        <input type="text" name="username" placeholder="Username"><br>
        <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
