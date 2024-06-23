<?php 
include 'db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Club Booking Portal</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="js/sweetalert.js"></script>
    <!-- Custom CSS -->
 
<style>
    body {
    font-family: sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

.navbar {
    background-color: #011c39;
    color: #fff;
    padding: 10px;
    text-align: center;
}
.navbar .navbar-brand{
    font-weight: bold;
    margin-left: 90px;
}
.navbar .navbar-nav{
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.navbar .navbar-nav .nav-item {
    display: inline;
    margin-right: 10px;
    font-weight:bold;
}

.navbar .navbar .navbar-nav .nav-link{
    color: #fff;
    font-weight:bold;
    text-decoration: none;
}
.navbar .navbar .navbar-nav .nav-link:hover{
    color: gray;
    text-decoration: none;
    padding:2px;
}
.carousel-inner img {
    width: 100%;
    height: 90vh;
  }
  .carousel-caption {
	bottom: 120px;
}
.carousel-caption h5 {
	font-size: 45px;
	text-transform: uppercase;
	letter-spacing: 2px;
	margin-top: 25px;
    color:white;
    font-weight:bold;
   
}
.carousel-caption p {
	width: 60%;
	margin: auto;
	font-size: 18px;
	line-height: 1.9;
}
.carousel-caption a {
	text-transform: uppercase;
	text-decoration: none;
	background: darkorange;
	padding: 10px 30px;
	display: inline-block;
	color: #000;
	margin-top: 15px;
    font-weight:bold;
}
.carousel-caption a:hover {
	color: #fff;
	
}
.aboutimg{
    width:100%;
    height:250px !important;
}
@media only screen and (max-width: 767px) {
	.navbar-nav {
		text-align: center;
		background: rgba(0, 0, 0, 0.5);
	}
	.carousel-caption {
		bottom: 165px;
	}
	.carousel-caption h5 {
		font-size: 17px;
	}
	.carousel-caption a {
		padding: 10px 15px;
		font-size: 15px;
	}
  
   
}
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="#">Sports Club Booking Portal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="facilities.php">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="matches.php">Matches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bookings.php">Book Now</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="events.php">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-success mr-2" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-success mr-2" href="signup.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary mr-2" href="./Files/index.php">Admin</a>
                </li>
            </ul>
            
        </div>
    </nav>
</body>
</html>