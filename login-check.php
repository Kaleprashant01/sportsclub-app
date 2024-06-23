<?php
session_start();
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if (empty($email)) {
        header("Location: login.php?error=Email is required");
        exit();
    } else if (empty($password)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM user_form WHERE email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                // Password is correct, so start a new session
                session_start();
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['id'];
                header("Location: dashboard/user/user.php");
                exit();
            } else {
                // Incorrect password
                header("Location: login.php?error=Incorrect password");
                exit();
            }
        } else {
            // No user found with the given email
            header("Location: login.php?error=User not found");
            exit();
        }
    }
} else {
    // Redirect to login page if email and password are not set
    header("Location: login.php");
    exit();
}
?>
