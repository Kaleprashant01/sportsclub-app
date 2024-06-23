<?php
require '../../include/db_conn.php';
page_protect();

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>SPORTS CLUB | Edit Event</title>
    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
	<link href="a1style.css" rel="stylesheet" type="text/css">
	
	<style>
 	#button1
	{
	width:126px;
	}
	#boxxe
	{
		width:230px;
	}
	.page-container .sidebar-menu #main-menu li#hassubopen > a {
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


							<li>Welcome <?php echo $_SESSION['username']; ?> 
							</li>							
						
							<li>
								<a href="logout.php">
									Log Out <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>
					</div>
			</div>
			<h3>Edit Event Details</h3>
			<hr/>
            <?php
        include "../../../db_conn.php";

        if (isset($_GET['event_id'])) {
            $event_id = $_GET['event_id'];
            $sql = "SELECT * FROM events WHERE event_id=$event_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <form action="update_event.php" method="POST">
                    <input type="hidden" name="event_id" value="<?php echo $row['event_id']; ?>">
                    <div class="form-group">
                        <label for="event_name">Event Name:</label>
                        <input type="text" class="form-control" id="event_name" name="event_name" value="<?php echo $row['event_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="event_date">Event Date:</label>
                        <input type="date" class="form-control" id="event_date" name="event_date" value="<?php echo $row['event_date']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="event_description">Event Description:</label>
                        <textarea class="form-control" id="event_description" name="event_description" rows="3"><?php echo $row['event_description']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="event_location">Event Location:</label>
                        <input type="text" class="form-control" id="event_location" name="event_location" value="<?php echo $row['event_location']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Event</button>
                </form>
                <?php
            } else {
                echo "Event not found.";
            }
        } else {
            echo "Invalid request.";
        }

        $conn->close();
        ?>
			</div>		

			<?php include('footer.php'); ?>
    	

  
</body>
</html>	


