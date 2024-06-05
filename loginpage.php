<?php

 require 'connectionSetup.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['signup'])) {
            // Signup form data
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];

            // Insert data into the signup table
            if ($password === $cpassword) {
                $sql = "INSERT INTO signup (c_name, email, upassword, ucpassword) VALUES ('$name', '$email', '$password', '$cpassword')";
                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Signup successful');</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "<script>alert('Passwords do not match');</script>";
            }
        }

        if (isset($_POST['login'])) {
            // Login form data
            $email = $_POST['username'];
            $password = $_POST['password'];

            // Check user credentials
            $sql = "SELECT * FROM signup WHERE email='$email' AND upassword='$password'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<script>window.location.href = './innerhome/innerhome.html';</script>";
            } else {
                echo "<script>alert('Invalid email or password');</script>";
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
         
    <title> Log In Gyan-Glide</title> 
</head>
<body>
        <div class="container">
            <div class="forms">
            <div class="form login">
                <span class="title">Login to Gyan-Glide</span>                
                <form action="loginpage.php" method="post">
                    <div class="input-field">
                        <input type="text" id="username" name="username" placeholder="Enter your email" required>
                        <!-- <i class="uil uil-envelope icon"></i> -->
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" id="password" class="password" placeholder="Enter your password" required>
                        <!-- <i class="uil uil-lock icon"></i> -->
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

                    <div id="error-message" class="error-message"></div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="#" class="text signup-link">Signup Now</a>
                    </span>
                </div>
            </div>

            <!-- Registration Form -->
            <div class="form signup">
                <span class="title">Register to Gyan-Glide</span>
                <form action="loginpage.php" method="post">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your name" name="name" required>
                        <
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="email" required>
                
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Create a password" name="password" required>
                 
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Confirm a password" name="cpassword" required>
                      
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="termCon">
                            <label for="termCon" class="text">I accepted all terms and conditions</label>
                        </div>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Signup" name="signup">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="#" class="text login-link">Login Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>


<script src="./login/script.js"></script>      
</body>
</html>
