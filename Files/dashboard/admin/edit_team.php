

<?php
require '../../include/db_conn.php';
page_protect();
 session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>SPORTS CLUB | Update Teams</title>
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
	}
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

h1 {
    text-align: center;
}

form {
    margin-bottom: 20px;
}

input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
}

button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
}

#teamList {
    border-top: 1px solid #ccc;
    padding-top: 20px;
}
/* styles.css */

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    padding: 20px;
}

.container {
    max-width: 800px;
    margin: 0 auto;
}

h1, h2 {
    text-align: center;
}

.team-form {
    background-color: #fff;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.team-view {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
}

input, select {
    width: 100%;
    padding: 8px;
    margin-bottom: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
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

		
        	<h3>Update Teams</h3>

		<hr />
        <?php
		$id=$_GET['id'];
		$sql="Select * from teams t Where t.id=$id";
		$res=mysqli_query($con, $sql);
		
					 if($res){
						      	$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
				
						      }
						
		?>
        
        	
        <div class="container">
        <h1>Update Teams</h1>
        <form id="createTeamForm" action="update_team.php" method="post" enctype="multipart/form-data">
    <label for="teamName">Team Name:</label>
    <input type="text" id="teamName" name="teamName" placeholder="Enter Team Name" value='<?php echo $row['team_name'] ?>' required><br>

    <label for="sport">Sport:</label>
    <input type="text" id="sport" name="sport" placeholder="Enter Sports Name" value='<?php echo $row['sport'] ?>' required><br>

    <label for="captainName">Captain's Name:</label>
    <input type="text" id="captainName" name="captainName" placeholder="Enter Captain's Name" value='<?php echo $row['captain_name'] ?>' required><br>

    <label for="teamLogo">Team Logo:</label>
    <input type="file" id="teamLogo" name="teamlogo" accept="image/*" value='<?php echo $row['team_logo'] ?>' required><br>


    <button type="submit">Update</button>
   
</form>
</div>

			<?php include('footer.php'); ?>

    </body>
</html>


