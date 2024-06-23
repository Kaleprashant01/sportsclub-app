<?php
require '../../db_conn.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>SPORTS CLUB  | Member View</title>
    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
   
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
 	#button1
	{
	width:126px;
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
		.a1, .a2{
            padding: 10px 20px;
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Cursor style */
            transition: background-color 0.3s; /* Smooth transition for background color */
			text-decoration: none; /* Remove underline from links */
			color: white; /* Text color */
        }
		.a1 i, .a2 i {
            margin-right: 15px; /* Add some spacing between the icon and text */
        }
		.a1:hover, .a2:hover {
            color:white;
            filter: brightness(0.9); /* Darken the button on hover */
        }
		.a1 {
            color:white;
            background-color: blue; /* Blue background color */
        }
		.a2 {
            color:white;
            background-color: red; /* Red background color */
        }
	</style>

</head>
<body>

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

            </tr>
        </thead>
        <tbody>
            <!-- PHP code to fetch and display matches -->
            <?php
            include "../../db_conn.php";

            $sql = "SELECT * FROM matches";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['match_date'] . "</td>";
                    echo "<td>" . $row['home_team'] . "</td>";
                    echo "<td>" . $row['away_team'] . "</td>";
                    echo "<td>" . $row['venue'] . "</td>";
                  
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
</body>
</html>
