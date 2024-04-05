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
<?php
$email = $password = "";
$emailErr = $passwordErr = "";
?>

<body>
<div class="title"><h2>Online Book Exchange</h2></div><br>
<div class="login-in-container">
        <div class="sign-up">
            <h3>Create an account</h3>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="sign-up-details">
                <p>Use your email account</p><br>
                <div class="inputFliedCon">

                    <input type="text" id="username" name="username" placeholder="Username" required>
                    <span id="usernameError" class="error" style="display: none;">Invalid username</span>
                    <input type="text" id="email" name="email" placeholder="Email" required>
                    <span id="emailError" class="error" style="display:none;">Invalid email</span>
                    <div class="password-eye1">
                        <input type="password" id="showPass1" name="password1" placeholder="Password" required>
                        <span id="passwordError" class="error" style="display: none;">Invalid password</span>
                        <i class="fas fa-eye" id="eye1" onclick="togglePasswordVisibility1()"></i>
                        <i class="fas fa-eye-slash" id="eye2" onclick="togglePasswordVisibility1()" style="display: none;"></i>
                    </div>

                    <div class="password-eye2">
                        <input type="password" id="showPass2" name="password2" placeholder="Confirm password" required>
                        <span id="passwordError" class="error" style="display: none;">Invalid password</span>
                        <i class="fas fa-eye" id="eye3" onclick="togglePasswordVisibility2()"></i>
                        <i class="fas fa-eye-slash" id="eye4" onclick="togglePasswordVisibility2()" style="display: none;"></i>
                    </div>
                </div>
            </div>
                <span class="error"></span><br>
                <input type="submit" value="Sign up">

                <div class="log-in"><a href="Log-in.php">Back to sign in</a></div>
                </div>
            </form>
        </div>    
</div>

<div class="homeButton">
        <button><a href="../Home/index.html">Home</a></button>
</div>

<script>
    function togglePasswordVisibility1() {
        var passwordField = document.getElementById("showPass1");
        var eyeIcon = document.getElementById("eye1");
        var eyeSlashIcon = document.getElementById("eye2");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.style.display = "block";
            eyeSlashIcon.style.display = "none";
        } else {
            passwordField.type = "password";
            eyeIcon.style.display = "none";
            eyeSlashIcon.style.display = "block";
        }
    }
    function togglePasswordVisibility2() {
        var passwordField = document.getElementById("showPass2");
        var eyeIcon = document.getElementById("eye3");
        var eyeSlashIcon = document.getElementById("eye4");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.style.display = "block";
            eyeSlashIcon.style.display = "none";
        } else {
            passwordField.type = "password";
            eyeIcon.style.display = "none";
            eyeSlashIcon.style.display = "block";
        }
    }
</script>

</body>
</html>