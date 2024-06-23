<?php
session_start();
include '../../db_conn.php';

if (!isset($_SESSION['email'])) {
    header('Location: ../../login.php');
    exit();
}

$email = $_SESSION['email'];

// Retrieve booking status for the logged-in user
$stmt = $conn->prepare("SELECT * FROM bookings WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$bookings = $result->fetch_all(MYSQLI_ASSOC);

// Display booking status on the dashboard
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>User Dashboard</title>
    <!-- Include CSS styles -->
    <style>
       * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
        }
        .hero {
            width: 100%;
            min-height: 100vh;
            background: #eceaff;
            color: #525252;
            display: flex;
            flex-direction: column;
        }
        nav {
            background: #011c39;
            width: 100%;
            padding: 10px 10%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
        }
        .logo {
            color: white;
            font-size: 24px;
        }
        .user-pic {
            width: 40px;
            border-radius: 50%;
            cursor: pointer;
            margin-left: 30px;
        }
        nav ul {
    display: flex; /* Aligns the list items in a row */
    justify-content: flex-end; /* Aligns the list items to the left */
    list-style: none; /* Removes the default bullet points */
    padding: 0; /* Removes default padding */
    margin: 0; /* Removes default margin */
}

nav ul li {
    margin: 0 15px;  /* Adds space between the list items */
    
}

nav ul li a {
    text-decoration: none; /* Removes the default underline */
    color: white; /* Sets the text color */
    font-size: 18px; /* Sets the font size */
    font-weight:bold;
     /* Adds a smooth transition effect */
}

nav ul li a:hover {
    color: orangered; 
    
    /* Changes the text color on hover */
}
        .sub-menu-wrap {
            position: absolute;
            top: 100%;
            right: 10%;
            width: 500px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease;
        }
        .sub-menu-wrap.open-menu {
            max-height: 400px;
        }
        .sub-menu {
            background: #fff;
            padding: 20px;
            margin: 10px;
        }
        .user-info {
            display: flex;
            align-items: center;
            color: black;
        }
        .user-info h1 {
            font-weight: 500;
        }
        .user-info img {
            width: 60px;
            border-radius: 50%;
            margin-right: 15px;
        }
        hr {
            border: 0;
            height: 1px;
            width: 100%;
            background: black;
            margin: 15px 0 10px;
        }
        .sub-menu-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #525252;
            margin: 15px 0;
        }
        .sub-menu-link p {
            width: 100%;
            margin: 10px 0;
        }
        .sub-menu-link img {
            width: 40px;
            background: #e5e5e5;
            border-radius: 50%;
            padding: 8px;
            margin-right: 15px;
        }
        .sub-menu-link span {
            font-size: 22px;
            transition: transform 0.5s ease;
        }
        .sub-menu-link:hover span {
            transform: translateX(5px);
        }
        .sub-menu-link:hover p {
            font-weight: 600;
        }
        .join-button {
    padding: 10px 20px;
    background-color: #009879; /* Button background color */
    color: #fff; /* Text color */
    border: none; /* No border */
    border-radius: 5px; /* Rounded corners */
    cursor: pointer; /* Cursor style */
    transition: background-color 0.3s; /* Smooth transition for background color */
}

.join-button:hover {
    background-color: #007b6c; /* Darker color on hover */
}
.footer{
    background-color:#011c39;
}

    </style>

</head>
<body>
<div class="hero">
    <nav>
       <h2 class="logo">SCBP</h2>
        <ul>
            <li><a href="user.php">Home</a></li>
            <li><a href="view_booking.php">My Bookings</a></li>
            <li><a href="view_matches.php">Matches</a></li>
            <li><a href="view_events.php">Events</a></li>
        </ul>
        <img src="../../images/user.png" class="user-pic" onclick="togglemenu()">
        <div class="sub-menu-wrap" id="sub-menu-wrap">
            <div class="sub-menu">
            <div class="user-info">
                    <img src="../../images/user.png" class="user-pic" alt="">
                          <h1 class="user"><?php if (isset($_SESSION['username']))
                     echo '<span>Hi,</span>'.$_SESSION['username']; ?></h1>     
            </div>
            <hr>

            <a href="" class="sub-menu-link">
                        <img src="../../images/user.png" alt="">
                        <p>Edit Profile</p>
                        <span>></span>
                    </a>
                    
                    <a href="view_booking.php" class="sub-menu-link">
                        <img src="../../images/user.png" alt="">
                        <p>My Bookings</p>
                        <span>></span>
                    </a>
                    
                    <a href="" class="sub-menu-link">
                        <img src="../../images/setting.png" alt="">
                        <p>Setting</p>
                        <span>></span>
                    </a>
                    <a href="" class="sub-menu-link">
                        <img src="../../images/help.png" alt="">
                        <p>Help</p>
                        <span>></span>
                    </a> 
                    <a href="../../logout.php" class="sub-menu-link">
                        <img src="../../images/logout.jpeg" alt="">
                        <p>Logout</p>
                        <span>></span>
                    </a>

            </div>

        </div>
    </nav>



    <footer class="footer text-white fixed-bottom">
        <div class="container text-center">
            <span>&copy; <?php echo date("Y"); ?> Sports Club Booking Portal</span>
        </div>
    </footer>
<script>
     function togglemenu() {
        let submenu = document.getElementById("sub-menu-wrap");
        submenu.classList.toggle("open-menu");
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
