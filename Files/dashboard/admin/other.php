
<?php
require '../../include/db_conn.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>SPORTS CLUB| Other Links</title>
    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
    <link href="a1style.css" rel="stylesheet" type="text/css">
    <style>
      .page-container .sidebar-menu #main-menu li#routinehassubopen > a {
      background-color: #2b303a;
      color: #ffffff;
    }
    .container{
        display: flex;
    gap: 10px;
    }
    button{
        font-size:1rem;
        border:none;
        outline:none;
        padding:10px 16px;
        border-radius:10px;
        background-color:#011c39;
        color:white;
        
    }
    a:hover{
    color:white; /* Blue color for the text */
    text-decoration: none; /* Remove underline */
    font-weight: bold; 

    }
    </style>
</head>
     <body class="page-body  page-fade" onload="collapseSidebar()">

    	<div class="page-container sidebar-collapsed" id="navbarcollapse">	
	
		<div class="sidebar-menu">
	
			<header class="logo-env">
			
			<!-- logo -->
			<div class="logo">
				<a href="main.php">
					<img src="logo1.png" alt="" width="192" height="80" />
				</a>
			</div>
			
					<!-- logo collapse icon -->
					<div class="sidebar-collapse" onclick="collapseSidebar()">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
							
			
		
			</header>
    		<?php include('nav.php'); ?>
    	</div>

    		<div class="main-content">
		
				<div class="row">
					
					<!-- Profile Info and Notifications -->
					<div class="col-md-6 col-sm-8 clearfix">	
							
					</div>
					
					
					<!-- Raw Links -->
					<div class="col-md-6 col-sm-4 clearfix hidden-xs">
						
						<ul class="list-inline links-list pull-right">

							<!-- <li>Welcome <?php echo $_SESSION['username']; ?> 
							</li>	-->					
						
							<li>
								<a href="logout.php">
									Log Out <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>
						
					</div>
					
				</div>

		<h3>Other Links</h3>

		<hr />

		<div class="container">
       <button> <a href="booking.php" class="a1"><i class="entypo-ticket"></i><span>Booking</span></a></button><br>
       <button> <a href="players.php" class="a2"><i class="entypo-user"></i><span>Players</span></a></button><br>
       <button>  <a href="teams.php" class="a3"><i class="entypo-users"></i><span>Teams</span></a></button><br>
       <button><a href="matches.php" class="a4"><i class="entypo-plus"></i><span>Matches</span></a></button><br>
       <button> <a href="grounds.php" class="a1"><i class="entypo-home"></i><span>Grounds</span></a></button><br>
       <button><a href="events.php" class="a5"><i class="entypo-calendar"></i><span>Events</span></a></button><br>
       <button><a href="score.php" class="a5"><i class="entypo-newspaper"></i><span>Score</span></a></button><br>
       <button><a href="add_facility.php" class="a5"><i class="entypo-star"></i><span>Facility</span></a></button><br>
       <button><a href="news.php" class="a5"><i class="entypo-newspaper"></i><span>News</span></a></button><br>
       <button><a href="location.php" class="a5"><i class="entypo-map"></i><span>Location</span></a></button>
       <button><a href="sports.php" class="a5"><i class="entypo-calendar"></i><span>Sports</span></a></button><br>
        </div>

		
    </div>
		
		
		
		


<?php include('footer.php'); ?>
    	

    </body>
</html>


				
