<?php
require '../../include/db_conn.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>SPORTS CLUB  | View Event </title>
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
            background-color: #007bff; /* Blue background color */
            color: white; /* White text color */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Cursor style */
            transition: background-color 0.3s; /* Smooth transition for background color */
        }
		  .a1:hover {
            background-color: #0056b3; /* Darker blue background color on hover */
        }
		.a1 i {
            margin-right: 1rem; /* Add some spacing between the icon and text */
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
            margin-right: 5px; /* Add some spacing between the icon and text */
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
							</li>-->								
						
							<li>
								<a href="logout.php">
									Log Out <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>
						
					</div>
					
				</div>

		<h3>View Event</h3>

		<hr />
        <div class="table-section">
        <table class="table">
            <thead>
                <tr>
                <th>Event ID</th>
                    <th>Event Name</th>
                    <th>Event Date</th>
                    <th>Event Desc.</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP code to fetch and display teams -->
                <?php
                include "../../../db_conn.php";

                $sql = "SELECT * FROM events";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['event_id'] . "</td>";
                        echo "<td>" . $row['event_name'] . "</td>";
                        echo "<td>" . $row['event_date'] . "</td>";
                        echo "<td>" . $row['event_description'] . "</td>";
						
                        echo "<td><a class='a1'  href='edit_event.php?event_id=" . $row['event_id'] . "'><i class='fas fa-edit'>Edit</i></a> | <a class= 'a2' href='delete_event.php?event_id=" . $row['event_id'] . "'><i class='fas fa-trash'>Delete</i></a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No Events found.</td></tr>";
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





