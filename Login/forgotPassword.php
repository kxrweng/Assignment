<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password</title>
    <!-- Add Font Awesome -->
    <link rel="stylesheet" href="forgotPassword.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<div class="forgotPassImg1">
<img src="forgetPass1.jpg">
</div>
<div class="forgot-pass-container">
    <div class="header-pass">
        <div class="title">
            <h1>Forget password</h1>
            <h2>Enter your recovery email address</h2>
        </div>
        <form method="post" action="readDatabase.php">
            <input type="text" id="email" name="email" placeholder="Email email address" required>
        </form>
        <div class="submit">
            <input type="submit" value="Submit">
        </div>
    <p>or</p>
    <div class="log-in"><a href="Log-in.php">Back to sign in</a></div>
</div>
</div>
<div class="homeButton">
    <button><a href="../Home/index.html">Home</a></button>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST['email'];
    $subject = "Forgot password";
    $message = "You have forgotten your password.";
    $headers = "From: BookXpress.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send message. Please try again later.";
    }
}
?>