
<?php
require '../../include/db_conn.php';
page_protect();
 session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>SPORTS CLUB | New Sports</title>
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
	/* Style for form container */
form {
    width: 50%;
    margin: 0 auto;
    padding: 20px;
    background-color: #f2f2f2;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style for form labels */
label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

/* Style for form inputs */
input[type="text"],
input[type="number"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

/* Style for buttons */
button[type="submit"] {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

button[type="submit"] a {
    color: #fff;
    text-decoration: none;
}

button[type="submit"] a:hover {
    text-decoration: underline;
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

		
        	<h3>New Sports</h3>
		<hr />
        
        <h2>Add New Sport</h2>
    <form action="process_sport.php" method="POST">
        <label for="sport_name">Sport Name:</label>
        <input type="text" id="sport_name" name="sport_name" required><br><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>
        
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required><br><br>
        
        <button type="submit">Add Sport</button>
        <button type="submit"><a href="view_sport.php">View Sport</a></button>
    </form>
        
        
        	
</div>
        
			<?php include('footer.php'); ?>
    	

    </body>
</html>








