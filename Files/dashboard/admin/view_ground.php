<?php
require '../../include/db_conn.php';
page_protect();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>SPORTS CLUB  | View Grounds </title>
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
		.btn1,
.btn2 {
    display: inline-block;
    padding: 8px 16px;
    margin-right: 5px;
    text-decoration: none;
    color: #fff;
    border: none;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.btn1 {
    background-color: #007bff;
}

.btn2 {
    background-color: #dc3545;
}

.btn1:hover {
    background-color: #0056b3;
}
.btn2:hover{
	background-color:darkred;
}
.btn1:active,
.btn2:active {
    transform: translateY(1px);
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

		<h3>View Ground</h3>

		<hr />
        <div class="table-section">
        <table class="table">
            <thead>
                <tr>
                    <th>Ground Name</th>
                    <th>Location</th>
                    <th>Sport Type</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../../../db_conn.php";
                $sql = "SELECT g.*, l.location_name FROM grounds g JOIN locations l ON g.location_id = l.id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['ground_name'] . "</td>";
                        echo "<td>" . $row['location_name'] . "</td>";
                        echo "<td>" . $row['sport_type'] . "</td>";
                        echo "<td><img src='" . $row['image'] . "' style='max-width: 100px; max-height: 100px;' /></td>";
                        echo "<td>
                                <a href='edit_ground.php?id=" . $row['id'] . "' class='btn1 btn-sm btn-primary'>Edit</a>
                                <a href='delete_ground.php?id=" . $row['id'] . "' class='btn2 btn-sm btn-danger' onclick='return confirm(\"Are you sure?\");'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No grounds found.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    </div>
			<?php include('footer.php'); ?>
    	
    </body>
</html>





