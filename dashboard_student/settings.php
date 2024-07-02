<?php
@require_once '../connectionSetup.php';
session_start();

if ($_SESSION['edit_click']) {
  $updated_message = "General Info Updated Successfully";
} else {
  $updated_message = "";
}

if ($_SESSION['password_click']) {
  $password_message = "Password Changed Successfully";
} else {
  $password_message = "";
}

if ($_SESSION['social_click']) {
  $social_message = "Social Info Updated Successfully";
} else {
  $social_message = "";
}

$_SESSION['edit_click'] = false;
$_SESSION['password_click'] = false;
$_SESSION['social_click'] = false;


if (!isset($_SESSION['std_id'])) {
  header('location:../index.php');
  die();
} else {
  // $_SESSION['current_user'] = $_COOKIE['current_user'];
  // $_SESSION['email'] = $_COOKIE['email'];
  $std_id = $_SESSION['std_id'];

  $sql = "SELECT * FROM students WHERE std_id= '$std_id'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = mysqli_fetch_array($result);
  } else {
  }
}

//for password change
$passwordUpdateMessage = "";





$sql = "SELECT * FROM students WHERE std_id= '$std_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prev_email = $_POST['prev_email'];

    if (isset($_POST['changePassword'])) {
      // Password change form data
      $oldPassword = $_POST['oldPassword'];
      $password = $_POST['password'];

      // Check user credentials
      $passwordVerify = false;
      $sql = "SELECT * FROM login WHERE `email`='$prev_email' AND password='$oldPassword'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $passwordVerify = true;   //old password is correct
      } else {
        $passwordUpdateMessage = "Invalid old password";
      }

      if ($passwordVerify) {

        $sql = "UPDATE `login` SET `password`='$password' WHERE `email` = '$prev_email'";
        if ($conn->query($sql) === TRUE) {  // change password successfull
          $_SESSION['password_click'] = true;
          header('location: settings.php');
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
    }

    if (isset($_POST['update_user'])) {
      // update form data
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $name = $first_name . ' ' . $last_name;
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $prev_school = $_POST['prev_school'];
      $grade = $_POST['grade'];
      $bio = $_POST['bio'];
      //sql query for update
      $sql = "UPDATE `students` SET `name`='$name',`email`='$email',
          `phone`='$phone',`address`='$address',`prev_school`='$prev_school',`grade`='$grade',`bio`='$bio' WHERE `std_id` = '$std_id'";
      $sql1 = "UPDATE `login` SET `email`='$email' where `email` = '$prev_email'";

      if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE) { // update data into students table

        $_SESSION['edit_click'] = true;
        header('location: settings.php');
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    if (isset($_POST['update_social'])) {
      // update form data
      $facebook = $_POST['facebook'];
      $instagram = $_POST['instagram'];
      $linkedIn = $_POST['linkedIn'];
      $github = $_POST['github'];

      //sql query for update
      $sql = "UPDATE `students` SET `facebook`='$facebook',`instagram`='$instagram',
        `linkedIn`='$linkedIn',`github`='$github' WHERE `std_id` = '$std_id'";

      if ($conn->query($sql) === TRUE) { // update data into students table
        $_SESSION['social_click'] = true;
        header('location: settings.php');
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  }



  $row = mysqli_fetch_array($result);
} else {
  // $result->num_rows !> 0
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/framework.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Rubik:wght@300;400;600;900&family=Work+Sans:wght@300;400;500;600;800&display=swap" rel="stylesheet">
  <title>Settings</title>

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

    .data i.showHidePw {
      position: relative;
      bottom: 74%;
      left: 92%;
      cursor: pointer;
      padding: 10px;
    }
  </style>
</head>

<body style="background-color: rgb(173, 255, 255);">

  <div class="page settings d-flex">
    <?php
    require_once 'dashboard_navbar.php';
    ?>

    <div class="content d-flex  column">
      <?php
      require_once 'dashboard_header.php';
      ?>

      <h1 class="p-relative mt-10">Settings</h1>

      <div class="text" style="position: absolute; top:12%; left: 50%;">
        <H4><?php echo $social_message ?></H4>
        <H4><?php echo $updated_message ?></H4>
        <H4><?php echo $password_message ?></H4>
        <!-- <p class="c-gray fs-14 mt-5">Last Change On 25/10/2021</p> -->
      </div>

      <div class="container grid ">

        <div class="general-info bg-white p-20 rad-6 ">
          <h2 class="mb-20">General Info</h2>
          <p class=" c-gray">General Information About Your Account</p>

          <form id="update_user" action="settings.php" method="post">
            <input type="hidden" name="prev_email" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['email']; ?>">
            <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">First Name</label>
            <input type="text" name="first_name" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo explode(" ", $row['name'])[0]; ?>">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-15">last Name</label>
            <input type="text" name="last_name" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo explode(" ", $row['name'])[1]; ?>">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-15 ">Email</label>
            <input type="email" name="email" class="c-gray p-10 rad-6 f-width " value="<?php echo $row['email']; ?>">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-15">Phone</label>
            <input type="text" name="phone" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['phone']; ?>">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-15">Address</label>
            <input type="text" name="address" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['address']; ?>">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-15">Recently Graduated From</label>
            <input type="text" name="prev_school" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['prev_school']; ?>">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-15">Grade Obtained</label>
            <input type="text" name="grade" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['grade']; ?>">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-15">About Me</label>
            <textarea name="bio" class="c-gray p-10 rad-6 fs-14 f-width" value=""><?php echo $row['bio']; ?></textarea>

            <input type="submit" name="update_user" value="Update General Info" class="rad-6 c-white bg-blue p-5" style="margin:15px; position: relative;left: 30%;background-color: teal; color: white; border-radius: 6px; font-size: 14px; display: block; width: fit-content; text-decoration: none;">

          </form>
        </div>

        <div class="security-info bg-white p-20 rad-6 ">

          <h2 class="mb-20">Security Info</h2>
          <p class=" c-gray">General Information About Your Account</p>
          <div class="password between-flex pt-20 pb-20 ">
            <div class="text">
              <H4>Password</H4>
              <!-- <p class="c-gray fs-14 mt-5">Last Change On 25/10/2021</p> -->
            </div>
            <input type="checkbox" id="show">
            <label for="show"><span class="rad-6 c-white bg-blue p-5 " style="background-color: teal; color: white; border-radius: 6px; font-size: 14px; display: block; width: fit-content; text-decoration: none;">Change</span></label>

            <div class="popup">
              <label for="show" class="close-btn fas fa-times" title="close"></label>

              <div class="text">
                Change your password
              </div>
              <form action="settings.php" id="changePasswordForm" method="post">
                <input type="hidden" name="prev_email" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['email']; ?>">
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

          <div class="social-info bg-white p-20 rad-6 ">
            <h2 class="mb-20">Social Info</h2>
            <p class=" c-gray">General Information About Your Account</p>
            <form id="update_social" action="settings.php" method="post">

              <div class="facebook rad-6 mb-20 bg-f6 d-flex">
                <div class="icon  flex-center">
                  <i class="fa-brands fa-facebook c-gray "></i>
                </div>
                <input type="text" name="facebook" value="<?php echo $row['facebook']; ?>" class="c-gray p-10 rad-6 fs-14 bg-f6">
              </div>

              <div class="instagram rad-6 mb-20 mt-25 bg-f6 d-flex ">
                <div class="icon  flex-center">
                  <i class="fa-brands fa-instagram c-gray "></i>
                </div>
                <input type="text" name="instagram" value="<?php echo $row['instagram']; ?>" class="c-gray p-10 rad-6 fs-14 bg-f6">
              </div>

              <div class="linkedin rad-6 mb-20 bg-f6 d-flex">
                <div class="icon  flex-center">
                  <i class="fa-brands fa-linkedin c-gray "></i>
                </div>
                <input type="text" name="linkedIn" value="<?php echo $row['linkedIn']; ?>" class="c-gray p-10 rad-6 fs-14 bg-f6">
              </div>

              <div class="github rad-6 mb-20 bg-f6 d-flex">
                <div class="icon  flex-center">
                  <i class="fa-brands fa-github c-gray "></i>
                </div>
                <input type="text" name="github" value="<?php echo $row['github']; ?>" class="c-gray p-10 rad-6 fs-14 bg-f6">
              </div>
              <input type="submit" name="update_social" value="Update Social Info" class="rad-6 c-white bg-blue p-5" style="background-color: teal; color: white; border-radius: 6px; font-size: 14px; display: block; width: fit-content; text-decoration: none;">
            </form>
          </div>

        </div>

      </div>
    </div>
  </div>

  <script src="formValidation.js"></script>

  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>