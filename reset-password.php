<?php
// Check if email is submitted
if(isset($_POST['email'])) {
    $email = $_POST['email'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: forgot-password.php?error=Invalid email address");
        exit();
    }

    // Check if email exists in the database (replace with your database logic)
    $userExists = true; // Example: Assume email exists

    if($userExists) {
        // Generate a unique token (you can use better methods for production)
        $token = md5(uniqid(rand(), true));

        // Save token in the database along with email (replace with your database logic)
        // This is just an example, you need to handle database connection and insertion properly
       $sql = "INSERT INTO password_reset_tokens (email, token) VALUES ('$email', '$token')";
        
        // Send reset link to user's email
        // You should implement proper email sending functionality here
        $resetLink = "http://example.com/reset-password.php?token=$token";
      mail($email, "Password Reset", "Click the link to reset your password: $resetLink");

        // Redirect to a success page or show a success message
        header("Location: forgot-password-success.php");
        exit();
    } else {
        // If email does not exist, show an error message
        header("Location: forgot-password.php?error=Email address not found");
        exit();
    }
} else {
    // If email is not submitted, redirect back to the forgot password page
    header("Location: forgot-password.php");
    exit();
}
?>
