<?php
require_once 'connectionSetup.php';
session_start();
$_SESSION['edit_click'] = false;
$_SESSION['password_click'] = false;
$_SESSION['social_click'] = false;
if($_SESSION['loginerror']){
    $loginError = "Invalid email or password";
}else{
    $loginError = "";

}
$_SESSION['loginerror'] = false;

if ( isset( $_SESSION['clz_id'])){
    header('location:dashboard_college/index.php');
    die();
}
if ( isset( $_SESSION['std_id'])){
    header('location:dashboard_student/index.php');
    die();
}

if ( isset( $_SESSION['admin'])){
    header('location:dashboard_admin/index.php');
    die();
}

// if ( isset( $_COOKIE['current_user'])){
//     echo $_COOKIE['current_user'];
//     // header('location:dashboard_student/index.php');
//     // die();
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        // Login form data
        $email = $_POST['username'];
        $password = $_POST['password'];

        if((!strcmp($email,"admin")) && (!strcmp($password,"admin"))){
            $_SESSION['admin'] = 'admin';
            header('location:dashboard_admin/index.php');
            die();

        }
        // Check user credentials //student login
        $sql = "SELECT * FROM login WHERE email='$email' AND password='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_array($result);
            $user_type = $row['user_type'];  //0 student 1 college
            $logged_email = $row['email'];
            if ($user_type){         //college
                $sql = "SELECT `clz_id` from `college_info` where `email` ='$email'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = mysqli_fetch_array($result);
                    $_SESSION['clz_id'] = $row['clz_id'];
                    header('location:dashboard_college/index.php');
                    die();
                }
            } else {

                $sql = "SELECT * FROM students WHERE email='$email'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = mysqli_fetch_array($result);
                    if($row['status'] == 1){
                        $_SESSION['std_id'] =  $row['std_id'];
                        header('location:dashboard_student/index.php');
                        die();
                    }else {
                        $_SESSION['loginerror'] = true;
                    }
                }
            }

        } else {
            $_SESSION['loginerror'] = true;
            
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
                        <!-- <a href="#" class="text">Forgot password?</a> -->
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
