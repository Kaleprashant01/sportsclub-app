<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 390px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        a.ca {
            display: block;
            margin-top: 10px;
            color: #4CAF50;
            text-decoration: none;
        }

        a.ca:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form action="register.php" method="post" id="signupForm">
        <h2>Sign Up</h2>
        <label>Username</label>
        <input type="text" name="username" placeholder="Username"><br>

        <label>Email</label>
        <input type="text" name="email" placeholder="Email"><br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br>

        <label>Confirm Password</label>
        <input type="password" name="confirm_password" placeholder="Confirm Password"><br>

        <button type="submit">Sign Up</button>
        <a href="login.php" class="ca">Already have an account? Login</a>
    </form>

    <?php if (isset($_GET['error'])) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?php echo $_GET['error']; ?>'
            });
        </script>
    <?php } ?>

    <?php if (isset($_GET['success'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?php echo $_GET['success']; ?>'
            });
        </script>
    <?php } ?>
</body>
</html>
