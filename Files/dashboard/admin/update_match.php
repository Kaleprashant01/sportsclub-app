<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Match - Sports Club</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Update Match</h2>
        <form action="save_match.php" method="POST">
            <input type="hidden" name="match_id" value="<?php echo $match_id; ?>">
            <div class="form-group">
                <label for="match_date">Match Date:</label>
                <input type="date" class="form-control" id="match_date" name="match_date" value="<?php echo $match_date; ?>" required>
            </div>
            <div class="form-group">
                <label for="home_team">Home Team:</label>
                <input type="text" class="form-control" id="home_team" name="home_team" value="<?php echo $home_team; ?>" required>
            </div>
            <div class="form-group">
                <label for="away_team">Away Team:</label>
                <input type="text" class="form-control" id="away_team" name="away_team" value="<?php echo $away_team; ?>" required>
            </div>
            <div class="form-group">
                <label for="venue">Venue:</label>
                <input type="text" class="form-control" id="venue" name="venue" value="<?php echo $venue; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Match</button>
        </form>
    </div>
</body>
</html>
