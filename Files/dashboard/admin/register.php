<?php
session_start();
include '../../../db_conn.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if (empty($username)) {
        header("Location: admin_register.php?error=Username is required");
        exit();
    } else if (empty($password)) {
        header("Location: admin_register.php?error=Password is required");
        exit();
    } else {
        $sname = "127.0.0.1:4306";
        $unmae = "root";
        $dbpassword = ""; // replace with actual password
        $db_name = "sports_db";

        $conn = new mysqli($sname, $unmae, $dbpassword, $db_name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT * FROM admin WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>
                alert('Username already exists');
                window.location.href = 'admin_register.php';
            </script>";
        } else {
            $stmt = $conn->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $password); // Store password as plain text

            if ($stmt->execute()) {
                echo "<script>
                    alert('Admin registered successfully.');
                    window.location.href = 'index.php';
                </script>";
            } else {
                echo "<script>
                    alert('Error: " . addslashes($stmt->error) . "');
                    window.location.href = 'admin_register.php';
                </script>";
            }
        }

        $stmt->close();
        $conn->close();
    }
} else {
    header("Location: admin_register.php");
    exit();
}
?>
