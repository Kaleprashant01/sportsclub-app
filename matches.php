<?php include 'menu.php'; 

$currentDate = date('Y-m-d');
$sqlActive = "SELECT * FROM matches WHERE match_date >= '$currentDate' ORDER BY match_date ASC";
$resultActive = $conn->query($sqlActive);

// Fetch recent matches (past) from database
$sqlRecent = "SELECT * FROM matches WHERE match_date < '$currentDate' ORDER BY match_date DESC LIMIT 5";
$resultRecent = $conn->query($sqlRecent);

?>
<style>
    .match{
  padding: 32px 0;
  margin-top: 2rem;
}
.match-title {
  text-align: center;
  margin-bottom: 1rem;
}
.container {
    display: flex;
  align-items: center;
  justify-content: center;
}
.card-title1{
    text-align: center;
  margin-bottom: 1rem;
  text-transform:uppercase;
}
.card-text1{
    padding: 0.4rem;
}
.container {
  text-align: center;
  width: 21.875rem;
  padding: 1rem;
}
.match-card {
    text-align: center;
  width: 21.875rem;
  padding: 1rem;
}
</style>

<section class="match bg-light" id="match">
        <h2 class="match-title">Matches</h2>
        <h2 class="match-title">Upcoming Matches</h2>
        <div class="container">
            <div class="container match-card">
        
        <?php
            // Display upcoming (active) matches
            if ($resultActive->num_rows > 0) {
                while ($row = $resultActive->fetch_assoc()) {
                    echo '<div class="col-md-6 mb-4">';
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title1">' . $row['home_team'] . ' vs ' . $row['away_team'] . '</h5>';
                    echo '<p class="card-text1"><strong>Date:</strong> ' . date('M j, Y', strtotime($row['match_date'])) . '</p>';
                     echo '<p class="card-text1"><strong>Venue:</strong> ' . $row['venue'] . '</p>';
                    echo '<p class="card-text1"><strong>Status:</strong> Active</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col-12"><p>No upcoming matches found.</p></div>';
            }
            ?>
        </div>
        </div>
        <hr>

        <h2 class="match-title">Recent Matches</h2>
        <div class="container">
            <div class="container match-card">
            <?php
            // Display recent (past) matches
            if ($resultRecent->num_rows > 0) {
                while ($row = $resultRecent->fetch_assoc()) {
                    echo '<div class="col-md-6 mb-4">';
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title1">' . $row['home_team'] . ' vs ' . $row['away_team'] . '</h5>';
                    echo '<p class="card-text1"><strong>Date:</strong> ' . date('M j, Y', strtotime($row['match_date'])) . '</p>';
                    echo '<p class="card-text1"><strong>Score:</strong> ' . $row['score'] . '</p>';
                    echo '<p class="card-text1"><strong>Result:</strong> ' . $row['result'] . '</p>';
                    echo '<p class="card-text1"><strong>Venue:</strong> ' . $row['venue'] . '</p>';
                    echo '<p class="card-text1"><strong>Status:</strong> Recent</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col-12"><p>No recent matches found.</p></div>';
            }
            ?>
        </div>
    </div>

    </div>
</section>
<?php include 'footer.php'; ?>