
<?php
require '../../include/db_conn.php';
page_protect();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>SPORTS CLUB| Add Grounds </title>
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

		<h3>New Grounds</h3>

		<hr />
        <form action="save_ground.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="ground_name">Ground Name:</label>
                <input type="text" class="form-control" id="ground_name" name="ground_name" required>
            </div>
            <div class="form-group">
                <label for="location_id">Location:</label>
                <select class="form-control" id="location_id" name="location_id" required>
                    <option value="">Select Location</option>
                    <?php
                    include "../../../db_conn.php";
                    $sql = "SELECT * FROM locations";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['location_name'] . "</option>";
                    }
                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="sport_type">Sport Type:</label>
                <input type="text" class="form-control" id="sport_type" name="sport_type" required>
            </div>
            <div class="form-group">
                <label for="rate">Rate</label>
                <input type="number" class="form-control" id="rate" name="rate" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Ground</button>
        </form>
    </div>
		
		   
		
		
		
		
    </div>

<?php include('footer.php'); ?>
    	

    </body>
</html>


				
