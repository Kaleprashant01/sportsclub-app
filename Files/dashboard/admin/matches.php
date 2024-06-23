<?php
require '../../include/db_conn.php';
page_protect();
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>SPORTS CLUB | Add Match</title>
    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
    <link href="a1style.css" type="text/css" rel="stylesheet">
    <style>
    	.page-container .sidebar-menu #main-menu li#regis > a {
    	background-color: #2b303a;
    	color: #ffffff;
		height:20px;
		}
       #boxx
	{
		width:220px;
	}</style>

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
							</li>-->
						
							<li>
								<a href="logout.php">
									Log Out <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>
						
					</div>
					
				</div>

		
        	<h3>Add Match</h3>

		<hr />
        
        <div class="container mt-5">
        <h2>Add New Match</h2>
        <form action="save_match.php" method="POST">
            <div class="form-group">
                <label for="match_date">Match Date:</label>
                <input type="date" class="form-control" id="match_date" name="match_date" required>
            </div>
            <div class="form-group">
                <label for="home_team">Home Team:</label>
                <input type="text" class="form-control" id="home_team" name="home_team" required>
            </div>
            <div class="form-group">
                <label for="away_team">Away Team:</label>
                <input type="text" class="form-control" id="away_team" name="away_team" required>
            </div>
            <div class="form-group">
                <label for="venue">Venue:</label>
                <input type="text" class="form-control" id="venue" name="venue" required>
            </div>
			<div class="form-group">
        <label for="status">Status:</label>
        <select class="form-control" id="status" name="status">
            <option value="Open">Open</option>
            <option value="Closed">Closed</option>
        </select>
    </div>
            <button type="submit" class="btn btn-primary">Add Match</button>
           <button type="submit" class="btn btn-primary"> <a href="view_match.php">View Match</a></button>
        </form>
    </div>
    </div>
			<?php include('footer.php'); ?>
    	
</body>
</html>

