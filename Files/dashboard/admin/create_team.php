<?php
// Include database connection and session management
require '../../include/db_conn.php';
page_protect();
session_start();

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $teamName = mysqli_real_escape_string($con, $_POST['teamName']);
    $sport = mysqli_real_escape_string($con, $_POST['sport']);
    $captainName = mysqli_real_escape_string($con, $_POST['captainName']);

    // Handle file upload for team logo
    if (isset($_FILES['teamlogo'])) {
        $file = $_FILES['teamlogo'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileType = $file['type'];

        // Check if file is an image
        if (strpos($fileType, 'image') !== false) {
            // Move uploaded file to desired directory
            $uploadPath = 'uploads/';
            $targetFile = $uploadPath . $fileName;
            move_uploaded_file($fileTmpName, $targetFile);

            // Insert team data into database
            $query = "INSERT INTO teams (team_name, sport, captain_name, team_logo) VALUES ('$teamName', '$sport', '$captainName', '$targetFile')";
            mysqli_query($con, $query);

            // Redirect to a success page or display a success message
            header('Location: view_team.php');
            exit;
        } else {
            // Handle invalid file type error
            echo "Error: Please upload only image files.";
        }
    } else {
        // Handle file upload error
        echo "Error: File upload failed.";
    }
}
?>
