<?php

$passwordUpdateMessage = "";
require '../connectionSetup.php';
session_start();

if(!empty($_POST['changePassword'])) {
    echo '
        <script type="text/javascript">
       jQuery(document).ready(function(){
        jQuery("#show").prop("checked", true);
    });

    </script>
    ';
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['changePassword'])) {
        // Password change form data
        $oldPassword = $_POST['oldPassword'];
        $password = $_POST['password'];
        $email = $_SESSION['email'];

        // Check user credentials
        $passwordVerify = false;
        $sql = "SELECT * FROM students WHERE email='$email' AND password='$oldPassword'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $passwordVerify = true;   //old password is correct
        } else {
            $passwordUpdateMessage = "Invalid old password";
        }



        if ($passwordVerify) {

            $sql = "UPDATE `students` SET `password`='$password' WHERE `email` = '$email'";
            if ($conn->query($sql) === TRUE) {  // change password successfull
                $passwordUpdateMessage = "Password Changed Successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }
    }else {
        $passwordUpdateMessage = "post has no value";
    }
}

?>





<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Popup Login Form Design | CodingNepal</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <style>
        .show-btn {
            background: #fff;
            padding: 10px 20px;
            font-size: 20px;
            font-weight: 500;
            color: #3498db;
            cursor: pointer;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .show-btn,
        .popup {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        input[type="checkbox"] {
            display: none;
        }

        .popup {
            display: none;
            background: #fff;
            width: 410px;
            padding: 30px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }

        #show:checked~.popup {
            display: block;
        }

        .popup .close-btn {
            position: absolute;
            right: 20px;
            top: 15px;
            font-size: 18px;
            cursor: pointer;
        }

        .popup .close-btn:hover {
            color: #3498db;
        }

        .popup .text {
            font-size: 35px;
            font-weight: 600;
            text-align: center;
        }

        .popup form {
            margin-top: -20px;
        }

        .popup form .data {
            height: 45px;
            width: 100%;
            margin: 40px 0;
        }

        form .data label {
            font-size: 18px;
        }

        form .data input {
            height: 100%;
            width: 100%;
            padding-left: 10px;
            font-size: 17px;
            border: 1px solid silver;
        }

        form .data input:focus {
            border-color: #3498db;
            border-bottom-width: 2px;
        }

        form .forgot-pass {
            margin-top: -8px;
        }

        form .forgot-pass a {
            color: #3498db;
            text-decoration: none;
        }

        form .forgot-pass a:hover {
            text-decoration: underline;
        }

        form .btn {
            margin: 30px 0;
            height: 45px;
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        form .btn .inner {
            height: 100%;
            width: 300%;
            position: absolute;
            left: -100%;
            z-index: -1;
            background: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
            transition: all 0.4s;
        }

        form .btn:hover .inner {
            left: 0;
        }

        form .btn button {
            height: 100%;
            width: 100%;
            background: none;
            border: none;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
        }

        form .signup-link {
            text-align: center;
        }

        form .signup-link a {
            color: #3498db;
            text-decoration: none;
        }

        form .signup-link a:hover {
            text-decoration: underline;
        }

        .data i.showHidePw {
            position: relative;
            bottom: 74%;
            left: 92%;
            cursor: pointer;
            padding: 10px;
        }
    </style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="center">
        <input type="checkbox" id="show">
        <label for="show" class="show-btn">View Form</label>
        <div class="popup">
            <label for="show" class="close-btn fas fa-times" title="close"></label>

            <div class="text">
                Change your password
            </div>
            <form action="#" id="changePasswordForm" method="post">

                <div class="data">
                    <label>Old Password</label>
                    <input type="password" id="oldPassword" class="password" placeholder="Old Password" name="oldPassword" required>
                </div>

                <div class="data">
                    <label>New Password</label>
                    <input type="password" id="password" class="password" placeholder="New password" name="password" required>
                </div>
                <div id="error-message" class="error-message">
                    <span id="passwordError" class="error"></span>
                </div>


                <div class="data">
                    <label>Confirm Password</label>
                    <input type="password" id="confirmPassword" class="password" placeholder="Confirm password" name="confirmPassword" required>
                    <i class="uil uil-eye-slash showHidePw"></i>
                </div>
                <div id="error-message" class="error-message">
                    <span id="confirmPasswordError" class="error"></span>
                </div>




                <div class="btn">
                    <div class="inner"></div>
                    <button type="submit" name="changePassword">Confirm</button>
                </div>

                <div class="data">
                    <label><?php echo $passwordUpdateMessage; ?></label>
                </div>

            </form>
        </div>
    </div>

    <script src="formValidation.js"></script>
    <script type="text/javascript">
       jQuery(document).ready(function(){
        jQuery("#show").prop("checked", true);
    });

    </script>
</body>

</html>