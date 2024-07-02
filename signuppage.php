<?php
session_start();
$emailError = "";
require 'connectionSetup.php';

if($_SESSION['signuperror']){
    $emailError = "The user with this email already exists.";
    $_SESSION['signup'] = false;
}else{
    $emailError = "";
}

if($_SESSION['signup']){
    $emailError = "Signup Successful";
}
$_SESSION['signup'] = false;
$_SESSION['signuperror'] = false;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['signup'])) {
        // Signup form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['confirmPassword'];
        $user_type = $_POST['userType'];

        $sql = "SELECT * FROM login WHERE email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $_SESSION['signuperror'] = true;
            header('location: signuppage.php');
            die();
            // http_response_code(409);
            // $emailError = "The user with this email already exists.";
        }

        if ($user_type) { 
            $sql = "INSERT INTO `college_info`(`name`,`email`) VALUES ('$name','$email')";
        } else{
            $sql = "INSERT INTO `students`(`name`,`email`) VALUES ('$name','$email')";
        }

        $sql2 = "INSERT INTO login (email, password, user_type) VALUES ('$email', '$password', '$user_type')";


        if ($conn->query($sql2) === TRUE && $conn->query($sql) === TRUE) { // Insert data into login table
            $emailError = "Signup Successful";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
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
    <title>Register to Gyan-Glide</title>
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form signup">
                <span class="title">Register to Gyan-Glide</span>
                <form id="signupform" action="signuppage.php" method="post">

                    <div class="input-field">

                        <select name="userType">
                        <option value='0'>Student</option>
                        <option value='1'>College</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your name" id="name" name="name" required>
                    </div>
                    <div id="error-message" class="error-message">
                    <span id="nameError" class="error"></span>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" id="email" name="email" required>
                    </div>
                    <div id="error-message" class="error-message">
                    <span id="emailError" class="error"></span>
                    </div>
                    <div class="input-field">
                        <input type="password" id="password" class="password" placeholder="Create a password" name="password" required>
                    </div>
                    <div id="error-message" class="error-message">
                    <span id="passwordError" class="error"></span>
                    </div>

                    <div class="input-field">
                        <input type="password" class="password" placeholder="Confirm a password" id="confirmPassword"name="confirmPassword" required>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    
                    <div id="error-message" class="error-message">
                    <span id="confirmPasswordError" class="error"></span>
                    </div>
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="termCon">
                            <label for="termCon" class="text">I accepted all <a href="terms.html">terms and conditions</a></label>
                        </div>
                    </div>
                    <div id="error-message" class="error-message">
                    <span id="checkboxError" class="error"></span>
                    </div>
                    <div class="input-field button">
                        <input type="submit" value="Signup" name="signup">
                    </div>
                    <div id="error-message" class="error-message">
                    <span><?php echo $emailError; ?></span>
                    </div>
                </form>
                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="loginpage.php" class="text login-link">Login Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <script src="./login/script.js"></script>
    <script src="./login/formValidation.js"></script>
</body>
</html>
