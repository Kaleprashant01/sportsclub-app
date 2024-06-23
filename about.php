<?php include "menu.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>About Us - Sports Club</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
}

.container {
    width: 80%;
    margin: 30px auto;
}

h2 {
    color: #333;
}

.team-member {
    margin-bottom: 20px;
}

.team-member img {
    width: 100px;
    border-radius: 50%;
    margin-bottom: 10px;
}

    </style>
</head>
<body>
    
<div class="container mt-5">
        <h2>About Us</h2>
        <p>Welcome to our sports club! We are dedicated to promoting sports and fitness in our community.</p>
        
        <h3>Our History</h3>
        <p>Our club was founded in [year] with the aim of providing a platform for sports enthusiasts to come together...</p>

        <h3>Our Mission</h3>
        <p>Our mission is to...</p>

        <h3>Meet Our Team</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="team-member">
                    <img src="team_member1.jpg" class="img-fluid rounded-circle" alt="Team Member 1">
                    <h4>John Doe</h4>
                    <p>Position: Coach</p>
                    <p>Bio: Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-member">
                    <img src="team_member2.jpg" class="img-fluid rounded-circle" alt="Team Member 2">
                    <h4>Jane Smith</h4>
                    <p>Position: Captain</p>
                    <p>Bio: Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                </div>
            </div>
            <!-- Add more team members as needed -->
        </div>
    </div>

    <?php include "footer.php"; ?>
    <script src="script.js"></script>
</body>
</html>
