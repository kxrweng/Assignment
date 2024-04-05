<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Add Font Awesome -->
    <link rel="stylesheet" href="Login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<?php
// Database configuration
$host = "localhost"; // Change this to your host
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "test_users"; // Change this to your database name

//$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
/*if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}*/

// Initialize variables
$email = $password = "";
$emailErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
    }

    // If all fields are valid, proceed with login
    if (empty($emailErr) && empty($passwordErr)) {
        // Check if user exists in the database
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            // Login successful, redirect to dashboard or home page
            header("Location: dashboard.php");
            exit();
        } else {
            $passwordErr = "Invalid email or password";
        }
    }
}

// Function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<div class="title"><h2>Online Book Exchange</h2></div>
<div class="login-in-container">
        <div class="sign-in">
            <h1>Sign In</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="sign-in-details">
                <p>Use your email account</p><br>
                <div class="inputFliedCon">
                <input type="text" id="username" name="username" placeholder="Username" required>
                <span id="usernameError" class="error" style="display: none;">Invalid username</span>
                <input type="text" id="email" name="email" placeholder="Email" required>
                <span id="emailError" class="error" style="display:none;">Invalid email</span>
                        <div class="password-eye">
                            <input type="password" id="showPass" name="password" placeholder="Password" required>
                            <i class="fas fa-eye" id="eye" onclick="togglePasswordVisibility()"></i>
                            <i class="fas fa-eye-slash" id="eye2" onclick="togglePasswordVisibility()" style="display: none;"></i>
                        </div>
                        <span id="passwordError" class="error" style="display: none;">Invalid password</span>
                        <div class="forgot-pass"><a href="forgotPassword.php">Forget password?</a></div>
                        <input type="submit" value="Sign in">
                        <p>OR</p>
                        <div class="create-account"><a href="createAccount.php">Create new account</a></div>
                        </div>
                </div>
            </form>
        </div>    
</div>

<div class="homeButton">
        <button><a href="../Home/index.html">Home</a></button>
</div>

<script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById("showPass");
        var eyeIcon = document.getElementById("eye");
        var eyeSlashIcon = document.getElementById("eye2");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.style.display = "none";
            eyeSlashIcon.style.display = "block";
        } else {
            passwordField.type = "password";
            eyeIcon.style.display = "block";
            eyeSlashIcon.style.display = "none";
        }
    }
</script>

</body>
</html>
