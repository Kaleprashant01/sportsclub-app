<?php
require '../../include/db_conn.php';
page_protect();
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>SPORTS CLUB  | Payments</title>
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

		<h2>Payments</h2>

		<hr />
		<div class="table-section">
		<table class="table table-bordered text-center" id="table-1" border=1>
			<thead>
				<tr>
					<th>Sl.No</th>
					<th>Membership Expiry</th>
					<th>Name</th>
					<th>Member ID</th>
					<th>Phone</th>
					<th>E-Mail</th>
					<th>Gender</th>
					<th>Action</th>
				</tr>
			</thead>

				<tbody>

				<?php


					$query  = "select * from enrolls where renewal='yes' ORDER BY expire";
					//echo $query;
					$result = mysqli_query($con, $query);
					$sno    = 1;

					if (mysqli_affected_rows($con) != 0) {
					    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

					        $uid   = $row['uid'];
					        $planid=$row['pid'];
					        $query1  = "select * from users WHERE userid='$uid'";
					        $result1 = mysqli_query($con, $query1);
					        if (mysqli_affected_rows($con) == 1) {
					            while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
					                
					                 echo "<tr><td>".$sno."</td>";
					                echo "<td>" . $row['expire'] . "</td>";
					                echo "<td>" . $row1['username'] . "</td>";
					                echo "<td>" . $row1['userid'] . "</td>";
					                echo "<td>" . $row1['mobile'] . "</td>";
					                echo "<td>" . $row1['email'] . "</td>";
					                echo "<td>" . $row1['gender'] . "</td>";
					                
					                $sno++;
					                
					                echo "<td><form action='make_payments.php' method='post'><input type='hidden' name='userID' value='" . $uid . "'/>
					                <input type='hidden' name='planID' value='" . $planid . "'/><input type='submit' class='a1-btn a1-blue' value='Add Payment ' class='btn btn-info'/></form></td></tr>";
									
					                $uid = 0;
					            }
					        }
					    }
					}

					?>									
				</tbody>

		</table>
		</div>

			<?php include('footer.php'); ?>
    	</div>

    </body>
</html>


