<?php
require '../../include/db_conn.php';
page_protect();
session_start();

// Collecting data from POST request
$memID = $_POST['m_id'];
$uname = $_POST['u_name'];
$stname = $_POST['street_name'];
$city = $_POST['city'];
$zipcode = $_POST['zipcode'];
$state = $_POST['state'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$phn = $_POST['mobile'];
$email = $_POST['email'];
$jdate = $_POST['jdate'];
$plan = $_POST['plan'];

// Start a transaction
mysqli_begin_transaction($con);

try {
    // Inserting into users table
    $query = "INSERT INTO users (username, gender, mobile, email, dob, joining_date, userid) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "sssssss", $uname, $gender, $phn, $email, $dob, $jdate, $memID);
    mysqli_stmt_execute($stmt);

    // Retrieve information of plan selected by user
    $query1 = "SELECT * FROM plan WHERE pid = ?";
    $stmt1 = mysqli_prepare($con, $query1);
    mysqli_stmt_bind_param($stmt1, "s", $plan);
    mysqli_stmt_execute($stmt1);
    $result = mysqli_stmt_get_result($stmt1);
    $value = mysqli_fetch_row($result);

    date_default_timezone_set("Asia/Calcutta");
    $d = strtotime("+" . $value[3] . " Months");
    $cdate = date("Y-m-d"); // current date
    $expiredate = date("Y-m-d", $d); // adding validity retrieved from plan to current date

    // Inserting into enrolls table
    $query2 = "INSERT INTO enrolls (pid, uid, paid_date, expire, renewal) VALUES (?, ?, ?, ?, 'yes')";
    $stmt2 = mysqli_prepare($con, $query2);
    mysqli_stmt_bind_param($stmt2, "ssss", $plan, $memID, $cdate, $expiredate);
    mysqli_stmt_execute($stmt2);

    // Inserting into healthstatus table
    $query4 = "INSERT INTO healthstatus (uid) VALUES (?)";
    $stmt4 = mysqli_prepare($con, $query4);
    mysqli_stmt_bind_param($stmt4, "s", $memID);
    mysqli_stmt_execute($stmt4);

    // Inserting into address table
    $query5 = "INSERT INTO address (id, streetName, state, city, zipcode) VALUES (?, ?, ?, ?, ?)";
    $stmt5 = mysqli_prepare($con, $query5);
    mysqli_stmt_bind_param($stmt5, "sssss", $memID, $stname, $state, $city, $zipcode);
    mysqli_stmt_execute($stmt5);

    // Commit transaction
    mysqli_commit($con);

    echo "<head><script>alert('Member Added');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=new_entry.php'>";
} catch (Exception $e) {
    // Rollback transaction
    mysqli_rollback($con);

    echo "<head><script>alert('Member Add Failed');</script></head></html>";
    echo "error: " . $e->getMessage();
}

mysqli_close($con);
?>
