<?php
// Include database connection
require_once '../../include/db_conn.php';
session_start();

// Retrieve form data
$team_name = mysqli_real_escape_string($con, $_POST['team_name']);
$sport = mysqli_real_escape_string($con, $_POST['sport']);

$captain_name = mysqli_real_escape_string($con, $_POST['captain_name']);
$team_logo = mysqli_real_escape_string($con, $_POST['team_logo']);

// Update team details in the database
$query = "UPDATE teams SET team_name = '$team_name', sport = '$sport', captain_name = '$captain_name', team_logo = '$team_logo' WHERE team_id  = $id";
mysqli_query($con, $query);

// Redirect back to view_teams.php after updating
header('Location: view_teams.php');
exit;
?>
