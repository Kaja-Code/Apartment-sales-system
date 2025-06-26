<?php
require_once "configuration.php";
require_once "header.php";
session_start();
?>

<?php

$errors = array();

// Check if form is submitted
if (isset($_POST["btn_login"])) {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if email exists in the database
    $sql = "SELECT * FROM Details WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Email exists, now check password
        $row = $result->fetch_assoc();
        if ($row['password'] == $password) {
            // Password matches, set session and redirect to home page
            $_SESSION['user_email'] = $email;
			$_SESSION['success_login'] = true;

            setcookie('user_email', $email, time() + (86400 * 30), "/");
            // Cookie set to expire in 30 days
            header('Location: success.php');
            exit();
        } else {
            $errors[] = 'Incorrect password.';
        }
    } else {
        $errors[] = 'Email does not exist.';
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Apartments - Login</title>
    <link rel="stylesheet" href="css/login.css" /> 

    
       
</head>

<body>

    <div id="container">
	<h1>Login</h1>
    <!-- Error Display Section -->
    <div id="errors">
        <?php
        if (!empty($errors)) {
            echo '<ul>';
            foreach ($errors as $error) {
                echo "<li>$error</li>";
            }
            echo '</ul>';
        }
        ?>
    </div>
    <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email"  required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" minlength="8" onkeyup="validatepassword1()" required>
        <div id="password-validation1" class="validation-message"></div>

        <input type="submit" value="Login" name="btn_login">
    </form>
   
        <p>Forgot your password? <a href="forgot_password.php">Reset here</a></p>
        <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
    
</div>
<script src="js/login.js">
    </script>
</body>



</html>
<?php

require_once "footer.php";


?>