<?php
$nameError = "";
$emailError = "";
$passwordError = "";
require 'connectionSetup.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['signup'])) {
        // Signup form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

//         $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

// if (preg_match($pattern, $email)) {
//     echo "The email address '$email' is considered valid.";
// } else {
//     echo "The email address '$email' is considered invalid.";
// }



        if (!empty($email)) {
            $sql = "SELECT * FROM signup WHERE email='$email'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                http_response_code(409);
                $emailError = "The user with this email already exists.";
            } elseif ($password === $cpassword) { // Check for password and confirm password
                $sql = "INSERT INTO signup (c_name, email, upassword, ucpassword) VALUES ('$name', '$email', '$password', '$cpassword')";
                if ($conn->query($sql) === TRUE) { // Insert data into signup table
                    $emailError = "Signup Successful";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                http_response_code(403);
                $emailError = "Password donot match";
            }
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
                        <input type="text" placeholder="Enter your name" name="name" required>
                        <span><?php echo $nameError; ?></span>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="email" required>
                        <span><?php echo $emailError; ?></span>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Create a password" name="password" required>
                        <span><?php echo $passwordError; ?></span>
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
</body>
</html>
