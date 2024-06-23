<?php
include "../../../db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $match_id = $_POST['id'] ?? '';
    $match_date = $_POST['match_date'];
    $home_team = $_POST['home_team'];
    $away_team = $_POST['away_team'];
    $venue = $_POST['venue'];
    $status = $_POST['status'];

    if ($match_id) {
        // Update match
        $sql = "UPDATE matches SET match_date='$match_date', home_team='$home_team', away_team='$away_team', venue='$venue', status='$status', WHERE id=$match_id";
    } else {
        // Add new match
        $sql = "INSERT INTO matches (match_date, home_team, away_team, venue, status) VALUES ('$match_date', '$home_team', '$away_team', '$venue','$status')";
    }

    if ($conn->query($sql) === TRUE) {
       
        header("Location: view_match.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
