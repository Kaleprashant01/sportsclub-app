<?php
include '../../../db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['match_id']) && $_POST['match_id'] !== '') {
        // Update existing record
        $stmt = $conn->prepare("UPDATE scores SET team1 = ?, team2 = ?, score1 = ?, score2 = ?, match_date = ?, batsman1 = ?, batsman2 = ?, striker = ?, non_striker = ?, bowler = ?, overs = ?, no_balls = ?, wide_balls = ?, wickets = ? WHERE id = ?");
        $stmt->bind_param("ssissssssssiiii", $_POST['team1'], $_POST['team2'], $_POST['score1'], $_POST['score2'], $_POST['match_date'], $_POST['batsman1'], $_POST['batsman2'], $_POST['striker'], $_POST['non_striker'], $_POST['bowler'], $_POST['overs'], $_POST['no_balls'], $_POST['wide_balls'], $_POST['wickets'], $_POST['match_id']);
    } else {
        // Insert new record
        $stmt = $conn->prepare("INSERT INTO scores (team1, team2, score1, score2, match_date, batsman1, batsman2, striker, non_striker, bowler, overs, no_balls, wide_balls, wickets) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssissssssssiii", $_POST['team1'], $_POST['team2'], $_POST['score1'], $_POST['score2'], $_POST['match_date'], $_POST['batsman1'], $_POST['batsman2'], $_POST['striker'], $_POST['non_striker'], $_POST['bowler'], $_POST['overs'], $_POST['no_balls'], $_POST['wide_balls'], $_POST['wickets']);
    }
    $stmt->execute();
    $stmt->close();
}

if (isset($_POST['action']) && $_POST['action'] === 'delete') {
    $stmt = $conn->prepare("DELETE FROM scores WHERE id = ?");
    $stmt->bind_param("i", $_POST['id']);
    $stmt->execute();
    $stmt->close();
}

$result = $conn->query("SELECT * FROM scores");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td class='id'>{$row['id']}</td>
            <td class='team1'>{$row['team1']}</td>
            <td class='team2'>{$row['team2']}</td>
            <td class='score1'>{$row['score1']}</td>
            <td class='score2'>{$row['score2']}</td>
            <td class='match_date'>{$row['match_date']}</td>
            <td class='batsman1'>{$row['batsman1']}</td>
            <td class='batsman2'>{$row['batsman2']}</td>
            <td class='striker'>{$row['striker']}</td>
            <td class='non_striker'>{$row['non_striker']}</td>
            <td class='bowler'>{$row['bowler']}</td>
            <td class='overs'>{$row['overs']}</td>
            <td class='no_balls'>{$row['no_balls']}</td>
            <td class='wide_balls'>{$row['wide_balls']}</td>
            <td class='wickets'>{$row['wickets']}</td>
            <td>
                <button class='btn btn-info edit-btn'>Edit</button>
                <button class='btn btn-danger delete-btn' data-id='{$row['id']}'>Delete</button>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='16' class='text-center'>No data available</td></tr>";
}

$conn->close();
?>
