<?php
// Establish connection to database
include '../../../db_conn.php';

// Insert data into Matches table
$match_n = $_POST['match_name'];
$date = $_POST['date'];
$venue = $_POST['venue'];

$sql = "INSERT INTO Matches (match_id, date, venue)
VALUES ('$match_id', '$date', '$venue')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully for Matches";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Insert data into Teams table
$team_name = $_POST['team_name'];
$captain_id = $_POST['captain_id'];
$coach_id = $_POST['coach_id'];

$sql = "INSERT INTO Teams (team_name, captain_id, coach_id)
VALUES ('$team_name', '$captain_id', '$coach_id')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully for Teams";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Insert data into Players table
$player_name = $_POST['player_name'];
$team_id = $_POST['team_id'];
$role = $_POST['role'];

$sql = "INSERT INTO Players (player_name, team_id, role)
VALUES ('$player_name', '$team_id', '$role')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully for Players";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Insert data into Scorecard table
$runs_scored = $_POST['runs_scored'];
$balls_faced = $_POST['balls_faced'];
$overs_bowled = $_POST['overs_bowled'];
$wickets_taken = $_POST['wickets_taken'];

$sql = "INSERT INTO Scorecard (runs_scored, balls_faced, overs_bowled, wickets_taken)
VALUES ('$runs_scored', '$balls_faced', '$overs_bowled', '$wickets_taken')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully for Scorecard";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
