<?php
require '../../include/db_conn.php';
page_protect();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>SPORTS CLUB  | Member View</title>
    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
	<link href="a1style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
 	#button1
	{
	width:126px;
	}

	.page-container .sidebar-menu #main-menu li#hassubopen > a {
	background-color: #2b303a;
	color: #ffffff;
	}
	.table-section{
			display: flex;
      justify-content: center;
      align-items: center;
		border-collapse:collapse;
		margin:25px 0;
		font-size:0.9rem;
		min-width:400px;
	 border-radius:5px 5px 0 0;
	 overflow:hidden;
	 box-shadow: 0 0 20px rgba(0,0,0,0.15);

		}
		.table{
		border-collapse: collapse;
		margin:25px 0;
		font-size:0.9rem; 
		min-width:400px; 	
		border: none;
		}
		thead tr{
			background-color: #009879;
			color:#fdfefe;
			text-align:left;
			font-weight:600;
		}
		th, td{
			padding:12px 15px;
			border: none;
		}
		tbody tr{
			border-bottom:1px solid #ddd;
		}
		tbody tr td{
			font-size: 15px;
			
		}
		tbody tr:nth-of-type(even) {
			background-color: #f3f3f3;
		}
		tbody tr:last-of-type{
			border-bottom:2px solid #009;
		}
		.a1{
            padding: 10px 20px;
            background-color: blue; /* Blue background color */
            color: white; /* White text color */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Cursor style */
            transition: background-color 0.3s; /* Smooth transition for background color */
        }
		  .a1:hover {
            background-color: darkblue; /* Darker blue background color on hover */
        }
		.a1 i {
            margin-right: 15px; 
			justify-content:space-between;/* Add some spacing between the icon and text */
        }

		.a2{
            padding: 10px 20px;
            background-color: red; /* Blue background color */
            color: white; /* White text color */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Cursor style */
            transition: background-color 0.3s; /* Smooth transition for background color */
        }
		  .a2:hover {
            background-color: darkred; /* Darker blue background color on hover */
        }
		.a2 i {
            margin-right: 15px; /* Add some spacing between the icon and text */
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

		<h3>View Match</h3>

		<hr />
        <div class="table-section">
        <table class="table">
            <thead>
                <tr>
                    <th>Match Date</th>
                    <th>Home Team</th>
                    <th>Away Team</th>
                    <th>Venue</th>
					<th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP code to fetch and display matches -->
                <?php
                include "../../../db_conn.php";

                $sql = "SELECT * FROM matches";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['match_date'] . "</td>";
                        echo "<td>" . $row['home_team'] . "</td>";
                        echo "<td>" . $row['away_team'] . "</td>";
                        echo "<td>" . $row['venue'] . "</td>";
						echo "<td>" . $row['status'] . "</td>";
                        echo "<td><button class='a1'><i class='fas fa-edit'><a href='edit_match.php?match_id=" . $row['id'] . "'>Edit</a></i></button> | <button class='a2'><i class='fas fa-trash'><a href='delete_match.php?match_id=" . $row['id'] . "'>Delete</a></i></button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No matches found.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

			<?php include('footer.php'); ?>
    	</div>
    </body>
</html>





