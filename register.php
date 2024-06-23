<?php
session_start();
include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $confirm_password = validate($_POST['confirm_password']);

    if (empty($username)) {
        header("Location: signup.php?error=Username is required");
        exit();
    } else if (empty($email)) {
        header("Location: signup.php?error=Email is required");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: signup.php?error=Invalid email format");
        exit();
    } else if (empty($password)) {
        header("Location: signup.php?error=Password is required");
        exit();
    } else if ($password !== $confirm_password) {
        header("Location: signup.php?error=Passwords do not match");
        exit();
    } else {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "SELECT * FROM user_form WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: signup.php?error=Email is already registered");
            exit();
        } else {
            $sql2 = "INSERT INTO user_form(username, email, password) VALUES('$username', '$email', '$password')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                header("Location: login.php?success=Your account has been created successfully, Please Login and Access Your Account");
                exit();
            } else {
                header("Location: signup.php?error=Unknown error occurred");
                exit();
            }
        }
    }
} else {
    header("Location: login.php");
    exit();
}
?>
