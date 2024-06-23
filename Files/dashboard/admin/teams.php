

<?php
require '../../include/db_conn.php';
page_protect();
 session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>SPORTS CLUB | New Teams</title>
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

		
        	<h3>New Teams</h3>

		<hr />
        
        
        	
        <div class="container">
        <h1>Create a New Team</h1>
        <form id="createTeamForm" action="create_team.php" method="post" enctype="multipart/form-data">
    <label for="teamName">Team Name:</label>
    <input type="text" id="teamName" name="teamName" placeholder="Enter Team Name" required><br>

    <label for="sport">Sport:</label>
    <input type="text" id="sport" name="sport" placeholder="Enter Sports Name" required><br>

    <label for="captainName">Captain's Name:</label>
    <input type="text" id="captainName" name="captainName" placeholder="Enter Captain's Name" required><br>

    <label for="teamLogo">Team Logo:</label>
    <input type="file" id="teamLogo" name="teamlogo" accept="image/*" required><br>

    <button type="submit">Create Team</button>
    <button type="submit"><a href="view_team.php">View Team</a></button>
</form>


        <div id="teamList">
            <!-- Newly created teams will be displayed here -->
        </div>
    </div>
        
			<?php include('footer.php'); ?>
    	</div>
<script>
    // scripts.js

document.addEventListener('DOMContentLoaded', function() {
    // Fetch players from database and populate the select dropdown
    fetchPlayers();

    // Load teams initially on page load
    loadTeams();
});

// Function to fetch players from the database
function fetchPlayers() {
    fetch('fetch_players.php')
        .then(response => response.json())
        .then(players => {
            const playersSelect = document.getElementById('players');
            players.forEach(player => {
                const option = document.createElement('option');
                option.value = player.id;
                option.textContent = `${player.name} (${player.sport})`;
                playersSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching players:', error));
}

// Function to add a new team
function addTeam() {
    const teamName = document.getElementById('teamName').value;
    const sport = document.getElementById('sport').value;
    const captainName = document.getElementById('captainName').value;
    const selectedPlayers = Array.from(document.getElementById('players').selectedOptions).map(option => option.value);

    // Create a new team object
    const team = {
        teamName,
        sport,
        captainName,
        players: selectedPlayers
    };

    // Send team data to server for processing
    fetch('add_team.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(team)
    })
    .then(response => response.json())
    .then(data => {
        console.log('Team added successfully:', data);
        // Reload teams after adding a new team
        loadTeams();
    })
    .catch(error => console.error('Error adding team:', error));
}

// Function to load and display teams
function loadTeams() {
    fetch('fetch_teams.php')
        .then(response => response.json())
        .then(teams => {
            const teamList = document.getElementById('teamList');
            teamList.innerHTML = ''; // Clear existing teams

            teams.forEach(team => {
                const teamItem = document.createElement('div');
                teamItem.innerHTML = `
                    <p><strong>${team.teamName}</strong> - ${team.sport} (Captain: ${team.captainName})</p>
                    <button onclick="editTeam(${team.id})">Edit</button>
                `;
                teamList.appendChild(teamItem);
            });
        })
        .catch(error => console.error('Error fetching teams:', error));
}

// Function to handle editing of a team
function editTeam(teamId) {
    // Redirect to edit page with teamId (or implement inline editing)
    window.location.href = `edit_team.php?id=${teamId}`;
}

</script>
    </body>
</html>


