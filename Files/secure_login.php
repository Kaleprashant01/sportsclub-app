<?php
session_start();


if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $username = validate($_POST['username']);
    $pass = validate($_POST['password']);

    if (empty($username)) {
        header("Location: index.php?error=User Name is required");
        exit();
    } else if(empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();
    } else {
      $sname= "127.0.0.1:4306";
$unmae= "root";
$password = "";

$db_name = "sports_db";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);
        $stmt = $conn->prepare("SELECT * FROM admin WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if ($row['username'] === $username && $row['password'] === $pass) {

                header("Location: dashboard/admin/index.php");
                exit();
            } else {
                header("Location: index.php?error=Incorrect username or password");
                exit();
            }
        } else {
            header("Location: index.php?error=Incorrect username or password");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>
