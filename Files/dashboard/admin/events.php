
<?php
require '../../include/db_conn.php';
page_protect();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>SPORTS CLUB| Events</title>
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

							<!--<li>Welcome <?php echo $_SESSION['username']; ?> 
							</li>	-->					
						
							<li>
								<a href="logout.php">
									Log Out <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>
						
					</div>
					
				</div>

		<h3>Create Events</h3>

		<hr />

		
		
		<div class="container mt-5">
        <h2>Add New Event</h2>
        <form action="save_event.php" method="POST">
            <div class="form-group">
                <label for="event_name">Event Name:</label>
                <input type="text" class="form-control" id="event_name" name="event_name" required>
            </div>
            <div class="form-group">
                <label for="event_date">Event Date:</label>
                <input type="date" class="form-control" id="event_date" name="event_date" required>
            </div>
            <div class="form-group">
                <label for="event_description">Event Description:</label>
                <textarea class="form-control" id="event_description" name="event_description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="event_location">Event Location:</label>
                <input type="text" class="form-control" id="event_location" name="event_location">
            </div>
            <button type="submit" class="btn btn-primary">Add Event</button>
            <button type="submit" class="btn btn-primary"><a href="view_event.php">View Event</a></button>
        </form>
    </div>
      
    </div>
    </div>   
		
		
		
		
		


<?php include('footer.php'); ?>
    	</div>

    </body>
</html>


				
