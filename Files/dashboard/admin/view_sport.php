
<?php
require '../../include/db_conn.php';
page_protect();
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>SPORTS CLUB  | View Sport</title>
    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
    <link href="a1style.css" type="text/css" rel="stylesheet">
    <style>
    	.page-container .sidebar-menu #main-menu li#paymnt > a {
    	background-color: #2b303a;
    	color: #ffffff;
		height:30px;
		}
	/* Style for sports list container */
ul {
    list-style-type: none;
    padding: 0;
}

/* Style for each sport item */
li {
    padding: 10px;
    margin-bottom: 10px;
    background-color: #f2f2f2;
    border-radius: 4px;
}

/* Style for sport name */
li strong {
    color: #007bff;
}

/* Style for sport description */
li span {
    color: #666;
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

		<h2>View Sports</h2>

		<hr />

        <?php
// Include database connection
include '../../../db_conn.php';

// Retrieve sports data from the database
$sql = "SELECT * FROM sports";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>List of Sports</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li><strong>{$row['sport_name']}</strong>: {$row['description']} (Price: {$row['price']})</li>";
    }
    echo "</ul>";
} else {
    echo "No sports found.";
}

// Close database connection
$conn->close();
?>
		</div>
			<?php include('footer.php'); ?>
    	

    </body>
</html>







