<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Match - Sports Club</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Match</h2>
        <?php
        include "../../../db_conn.php";

        if (isset($_GET['match_id'])) {
            $id = $_GET['match_id'];
            $sql = "SELECT * FROM matches WHERE id=$id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <form action="save_match.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label for="match_date">Match Date:</label>
                        <input type="date" class="form-control" id="match_date" name="match_date" value="<?php echo $row['match_date']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="home_team">Home Team:</label>
                        <input type="text" class="form-control" id="home_team" name="home_team" value="<?php echo $row['home_team']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="away_team">Away Team:</label>
                        <input type="text" class="form-control" id="away_team" name="away_team" value="<?php echo $row['away_team']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="venue">Venue:</label>
                        <input type="text" class="form-control" id="venue" name="venue" value="<?php echo $row['venue']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Match</button>
                </form>
                <?php
            } else {
                echo "Match not found.";
            }
        } else {
            echo "Invalid request.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
