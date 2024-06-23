<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
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

        input[type="checkbox"] {
            margin-right: 10px;
            vertical-align: middle;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
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
            color: black;
            font-weight:bold;
            font-size:16px;
            text-decoration: none;
        }

        a.ca:hover {
            text-decoration: none;
        }
        
    </style>
</head>
<body>
    <form action="login-check.php" method="post" id="loginForm">
        <h2>LOGIN</h2>
        <label>Email</label>
        <input type="text" name="email" placeholder="Email" value="<?php if (isset($_COOKIE['email'])) { echo $_COOKIE['email']; } ?>"><br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Password" value="<?php if (isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>"><br>

        <label class="checkbox-label">
            <input type="checkbox" name="remember_me" <?php if (isset($_COOKIE['password'])) { echo 'checked'; } ?> > Remember Me
        </label><br>

        <button type="submit">Login</button>
        <a href="signup.php" class="ca">Create an account</a><br>
        <a href="forgot-password.php" class="ca">Forgot Password?</a>
        <a href="index.php" class="ca">Back To Site</a>
    </form>

    <?php if (isset($_GET['error'])) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?php echo $_GET['error']; ?>'
            }).then((result) => {
                // Clear the URL of query parameters after displaying the alert
                window.history.replaceState(null, null, window.location.pathname);
            });
        </script>
    <?php } ?>

    <?php if (isset($_GET['success'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?php echo $_GET['success']; ?>'
            }).then((result) => {
                // Clear the URL of query parameters after displaying the alert
                window.history.replaceState(null, null, window.location.pathname);
            });
        </script>
    <?php } ?>
</body>
</html>
