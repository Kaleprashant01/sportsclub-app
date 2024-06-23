<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        form {
            margin-top: 20px;
            justify-content:center;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        select, input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        #selected_values {
            margin-top: 20px;
        }
    </style>
    <title>Cricket Score Update Form</title>
</head>
<body>
    <h2>Cricket Score Update Form</h2>
    <form action="save_score.php" method="post">
    <h3>Scorecard</h3>

    <label for="runs_scored">Runs Scored:</label><br> 
    <select id="runs_scored" name="runs_scored">
        <?php 
        // Populate runs scored from 0 to 100
        for ($i = 0; $i <= 100; $i++) {
            echo "<option value='$i'>$i</option>";
        } 
        ?>
    </select><br>

    <label for="balls_faced">Balls Faced:</label><br> 
    <select id="balls_faced" name="balls_faced">
        <?php 
        // Populate balls faced from 0 to 300
        for ($i = 0; $i <= 6; $i++) {
            echo "<option value='$i'>$i</option>";
        } 
        ?>
    </select><br>

    <label for="overs_bowled">Overs Bowled:</label><br> 
    <select id="overs_bowled" name="overs_bowled">
        <?php 
        // Populate overs bowled from 0 to 50
        for ($i = 0; $i <= 50; $i += 0.1) {
            echo "<option value='$i'>$i</option>";
        } 
        ?>
    </select><br>

    <label for="wickets_taken">Wickets Taken:</label><br> 
    <select id="wickets_taken" name="wickets_taken">
        <?php 
        // Populate wickets taken from 0 to 10
        for ($i = 0; $i <= 10; $i++) {
            echo "<option value='$i'>$i</option>";
        } 
        ?>
    </select><br>

    <!-- Add other fields similarly -->

    <input type="submit" value="Submit">
</form>


    <!-- Display selected values -->
    <div id="selected_values">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo "<h3>Selected Values</h3>";
                echo "Runs Scored: " . $_POST["runs_scored"] . "<br>";
                echo "Balls Faced: " . $_POST["balls_faced"] . "<br>";
                echo "Overs Bowled: " . $_POST["overs_bowled"] . "<br>";
                echo "Wickets Taken: " . $_POST["wickets_taken"] . "<br>";
            }
        ?>
    </div>

    <!-- JavaScript to update selected values -->
    <script>
        document.getElementById("runs_scored").addEventListener("change", updateSelectedValues);
        document.getElementById("balls_faced").addEventListener("change", updateSelectedValues);
        document.getElementById("overs_bowled").addEventListener("change", updateSelectedValues);
        document.getElementById("wickets_taken").addEventListener("change", updateSelectedValues);

        function updateSelectedValues() {
            var runsScored = document.getElementById("runs_scored").value;
            var ballsFaced = document.getElementById("balls_faced").value;
            var oversBowled = document.getElementById("overs_bowled").value;
            var wicketsTaken = document.getElementById("wickets_taken").value;

            document.getElementById("selected_values").innerHTML = "<h3>Selected Values</h3>" +
                "Runs Scored: " + runsScored + "<br>" +
                "Balls Faced: " + ballsFaced + "<br>" +
                "Overs Bowled: " + oversBowled + "<br>" +
                "Wickets Taken: " + wicketsTaken + "<br>";
        }
    </script>
</body>
</html>
