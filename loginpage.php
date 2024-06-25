<?php
require_once 'connectionSetup.php';
session_start();
if ( isset( $_SESSION['current_user'])){
    header('location:dashboard_student/index.php');
    die();
}

// if ( isset( $_COOKIE['current_user'])){
//     echo $_COOKIE['current_user'];
//     // header('location:dashboard_student/index.php');
//     // die();
// }


$loginError = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        // Login form data
        $email = $_POST['username'];
        $password = $_POST['password'];

        // Check user credentials
        $sql = "SELECT * FROM signup WHERE email='$email' AND upassword='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = mysqli_fetch_array($result);
            $_SESSION['current_user'] = $row['c_name'];
            // setcookie('current_user',$row['c_name'],time()+3600,'/');
            header('location:dashboard_student/index.php');
            die();
        } else {
            $loginError = "Invalid email or password";
            
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="./login/style.css">
    <title>Log In Gyan-Glide</title>
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login to Gyan-Glide</span>
                <form action="loginpage.php" method="post">
                    <div class="input-field">
                        <input type="text" id="username" name="username" placeholder="Enter your email" required>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" id="password" class="password" placeholder="Enter your password" required>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>
                        <a href="#" class="text">Forgot password?</a>
                    </div>
                    <div class="input-field button">
                        <input type="submit" name="login" id="login-form" value="Login">
                    </div>
                    <div id="error-message" class="error-message">
                    <span><?php echo $loginError; ?></span>
                    </div>
                </form>
                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="signuppage.php" class="text signup-link">Signup Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <script src="./login/script.js"></script>
</body>
</html>
