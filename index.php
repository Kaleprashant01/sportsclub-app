<?php 
include 'db_conn.php';

$currentDate = date('Y-m-d'); // Get current date in YYYY-MM-DD format
$sql = "SELECT * FROM events WHERE event_date >= '$currentDate'";
$result = $conn->query($sql);

$sqlActive = "SELECT * FROM matches WHERE match_date >= '$currentDate' ORDER BY match_date ASC";
$resultActive = $conn->query($sqlActive);

// Fetch recent matches (past) from database
$sqlRecent = "SELECT * FROM matches WHERE match_date < '$currentDate' ORDER BY match_date DESC LIMIT 5";
$resultRecent = $conn->query($sqlRecent);


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
    html{
        scroll-behavior:smooth;
    }
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
   text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}
.carousel-caption p {
	width: 60%;
	margin: auto;
	font-size: 18px;
	line-height: 1.9;
    text-shadow: -1px -1px 2px #333;
}
.carousel-caption a {
	text-transform: uppercase;
	text-decoration: none;
	background: white;
	padding: 10px 30px;
	display: inline-block;
	color: white;
	margin-top: 15px;
    font-weight:bold;
}
.carousel-caption a:hover {
	color: #fff;
    text-decoration:none;
	
}
.aboutimg{
    width:100%;
    height:250px !important;
}
.match{
  padding: 32px 0;
  margin-top: 2rem;
}
.match-title {
  text-align: center;
  margin-bottom: 1rem;
}
.container {
    display: flex;
  align-items: center;
  justify-content: center;
}
.card-title1{
    text-align: center;
  margin-bottom: 1rem;
  text-transform:uppercase;
}
.card-text1{
    padding: 0.4rem;
}
.container {
  text-align: center;
  width: 21.875rem;
  padding: 1rem;
}
.match-card {
    text-align: center;
  width: 21.875rem;
  padding: 1rem;
}
.row{
    background-color: #fff;
  border-radius: 11px;
  box-shadow: 0 3px 10px var(--primary-shadow);
  padding: 20px;
  margin: 10px;
}

.news-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.news-item {
    width: 30%;
    margin-bottom: 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding:  30px;
}

.news-item h2 {
    margin-top: 0;
}

.news-item img {
    width: 100%;
    height: auto;
    margin-bottom: 20px;
}

.news-item p {
    line-height: 1.5;
}
.container{
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
        }
        .news {
            margin-bottom: 20px;
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
       <?php include 'menu.php'; ?>

    <div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/images1.jpeg" alt="Los Angeles" width="1100" height="500">
      <div class="carousel-caption">
      <div class="carousel-caption">
					<h5 class="animated bounceInRight" style="animation-delay: 1s; ">Welcome To</h5>
                    <h5 class="animated bounceInRight" style="animation-delay: 1s;">Sports Club Booking</h5>
					<p class="animated bounceInLeft d-none d-md-block" style="animation-delay: 2s; font-weight:bold;">Book Your Ground anytime, get more benefits, avaliable all sports gorund</p><br>
					<p class="animated bounceInRight" style="animation-delay: 3s"><a href="bookings.php">Book Now</a></p>
				</div>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="images/img7.jpeg" alt="Chicago" width="1100" height="500">
      <div class="carousel-caption">
      <div class="carousel-caption">
					<h5 class="animated bounceInRight" style="animation-delay: 1s; ">Welcome To</h5>
                    <h5 class="animated bounceInRight" style="animation-delay: 1s; ">Sports Club Booking</h5>
					<p class="animated bounceInLeft d-none d-md-block" style="animation-delay: 2s ;font-weight:bold;">Book Your Ground anytime, get more benefits, avaliable all sports gorund</p><br>
					<p class="animated bounceInRight" style="animation-delay: 3s; color:blue;"><a href="bookings.php">Book Now</a></p>
				</div>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="images/images.jpeg" alt="New York" width="1100" height="500">
      <div class="carousel-caption">
      <div class="carousel-caption">
					<h5 class="animated bounceInRight" style="animation-delay: 1s; ">Welcome To</h5>
                    <h5 class="animated bounceInRight" style="animation-delay: 1s; ">Sports Club Booking</h5>
					<p class="animated bounceInLeft d-none d-md-block" style="animation-delay: 2s; font-weight:bold;">Book Your Ground anytime, get more benefits, avaliable all sports gorund</p><br>
					<p class="animated bounceInRight" style="animation-delay: 3s;"><a href="bookings.php">Book Now</a></p>
				</div>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<section class="my-5">
    <div class="py-5">
        <h2 class="text-center" id="about">About Us</h2>
    </div>
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
            <img src="images/img1.jpeg" class="img-fluid aboutimg" alt="">
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <h2 class="display-4">Sports Club Booking Portal</h2>
            <p class="py-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae delectus laborum dolorem unde! Tempora quam, reprehenderit dolore iusto perferendis 
                provident quo vero, quod enim facere cumque nostrum esse illo. Quibusdam. </p>
                <a href="about.php" class="btn btn-success">Read More</a>
        </div>
    </div>
    </div>
</section>
<section class="match bg-light" id="match">
        <h2 class="match-title">Matches</h2>
        <h2 class="match-title">Upcoming Matches</h2>
        <div class="container">
            <div class="container match-card">
        
        <?php
            // Display upcoming (active) matches
            if ($resultActive->num_rows > 0) {
                while ($row = $resultActive->fetch_assoc()) {
                    echo '<div class="col-md-6 mb-4">';
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title1">' . $row['home_team'] . ' vs ' . $row['away_team'] . '</h5>';
                    echo '<p class="card-text1"><strong>Date:</strong> ' . date('M j, Y', strtotime($row['match_date'])) . '</p>';
                     echo '<p class="card-text1"><strong>Venue:</strong> ' . $row['venue'] . '</p>';
                    echo '<p class="card-text1"><strong>Status:</strong> Active</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col-12"><p>No upcoming matches found.</p></div>';
            }
            ?>
        </div>
        </div>
        <hr>

        <h2 class="match-title">Recent Matches</h2>
        <div class="container">
            <div class="container match-card">
            <?php
            // Display recent (past) matches
            if ($resultRecent->num_rows > 0) {
                while ($row = $resultRecent->fetch_assoc()) {
                    echo '<div class="col-md-6 mb-4">';
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title1">' . $row['home_team'] . ' vs ' . $row['away_team'] . '</h5>';
                    echo '<p class="card-text1"><strong>Date:</strong> ' . date('M j, Y', strtotime($row['match_date'])) . '</p>';
                    
                    echo '<p class="card-text1"><strong>Venue:</strong> ' . $row['venue'] . '</p>';
                    echo '<p class="card-text1"><strong>Status:</strong> Recent</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col-12"><p>No recent matches found.</p></div>';
            }
            ?>
        </div>
    </div>

    </div>
</section>
<section class="my-5">
    <div class="py-5">
        <h2 class="text-center">Gallary</h2>
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-12">
            <img src="images/images1.jpeg" class="img-fluid pb-4" alt="Image">
        </div>
        <div class="col-lg-4 col-md-4 col-12">
            <img src="images/img1.jpeg" class="img-fluid pb-4" alt="Image">
        </div>
        <div class="col-lg-4 col-md-4 col-12">
            <img src="images/img7.jpeg" class="img-fluid pb-4" alt="Image">
        </div>
        <div class="col-lg-4 col-md-4 col-12">
            <img src="images/img.jpeg" class="img-fluid pb-4" alt="Image">
        </div>
        <div class="col-lg-4 col-md-4 col-12">
            <img src="images/img4.jpeg" class="img-fluid pb-4" alt="Image">
        </div>
        <div class="col-lg-4 col-md-4 col-12">
            <img src="images/img6.jpeg" class="img-fluid pb-4" alt="Image">
        </div>
    </div>
    </div>

  </div>
</section>


    <section class="my-5">
        <div class="py-5">
                <h2 class="text-center">Upcoming Events</h2>
                <div class="container">
            <div class="container match-card">
            <?php
            // Loop through fetched events and display them
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $eventDate = strtotime($row['event_date']);
                    $currentDate = time();
                    $isExpired = ($currentDate > $eventDate);

                    echo '<div class="col-md-3 mb-3">';
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title1">' . $row['event_name'] . '</h5>';
                    echo '<p class="card-text1"><strong>Event Date:</strong> ' . date('M j, Y', $eventDate) . '</p>';
                    echo '<p class="card-text1"><strong>Location:</strong> ' . $row['event_location'] . '</p>';
                    echo '<p class="card-text1"><strong>Details:</strong>' . $row['event_description'] . '</p>';
                    
                    // Display status based on event date
                    if ($isExpired) {
                        echo '<p class="text-danger">Expired</p>';
                    } else {
                        echo '<p class="text-success">Active</p>';
                    }
                    
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col-12"><p>Events Coming soon...</p></div>';
            }
            ?>
        </div>
        </div>
            </div>
        </div>

    </section>
<section class="my-5" style="height: 500px;">
    <div class="py-5" style="height: 100%;">
        <h2 class="text-center">News</h2>
        <div class="conatiner ">
        <div class="news-list">
            <?php
            $host = '127.0.0.1:4306';
            $db = 'sports_db';
            $user = 'root';
            $pass = '';
            $charset = 'utf8mb4';

            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $pdo = new PDO($dsn, $user, $pass, $opt);

            $sql = "SELECT * FROM news ORDER BY id DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch()) {
                echo '<div class="news-item">';
                echo '<h2>' . htmlspecialchars($row['title']) . '</h2>';
                echo '<img src="Files/dashboard/admin/uploads/' . htmlspecialchars($row['image']) . '" alt="News Image">';
                echo '<p>' . htmlspecialchars($row['content']) . '</p>';
                echo '</div>';
            }
            ?>
        </div>
        </div>
        </div>
        </section>
 <?php include 'footer.php';?>

    <!-- Bootstrap JS and jQuery -->
   
</body>
</html>
