<?php
@require_once '../connectionSetup.php';
session_start();
// $_SESSION['clz_id'] = 1;
if (!isset($_SESSION['clz_id'])) {
  header('location:../index.php');
  die();
}

$clz_id = $_SESSION['clz_id'];

include_once 'data_uploader.php';


if (isset($_POST['update_college'])) {
  // $prev_email = $_POST['prev_email'];
  // update form data
  $name = $_POST['college_name'];
  // $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $estd = $_POST['estd'];
  $certification = $_POST['certification'];
  $college_type = $_POST['college_type'];
  $description = $_POST['description'];
  $chk = "";
  if (isset($_POST['faculty'])) {
    $faculty = $_POST['faculty'];
    $faculties = implode(", ", $faculty);
  }
  if (isset($_POST['facility'])) {
    $facility = $_POST['facility'];
    $facilities = implode(", ", $facility);
  }

  //sql query for update
  $sql = "UPDATE `college_info` SET `name`='$name',`phone`='$phone',
    `address`='$address',`estd`='$estd',
    `certification`='$certification',`college_type`='$college_type',`faculties`='$faculties',`facilities`='$facilities',`description`='$description' WHERE `clz_id` = $clz_id";

  if ($conn->query($sql) === TRUE) { // update data into college_info table
    // $_SESSION['email'] = $email;
    $updated_message = "General Info Updated Successfully";
    // echo '<script>alert("Inserted Successfully")</script>';
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

if (isset($_POST['upload'])) {
  $images = $_FILES['images'];

  $num_of_imgs = count($images['name']);
  echo $num_of_imgs;

  for ($i = 0; $i < $num_of_imgs; $i++) {

    # get the image info and store them in var
    $image_name = $images['name'][$i];
    $tmp_name   = $images['tmp_name'][$i];
    $error      = $images['error'][$i];

    # if there is not error occurred while uploading
    if ($error === 0) {
      # get image extension store it in var
      $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);

      /** 
    convert the image extension into lower case 
    and store it in var 
       **/
      $img_ex_lc = strtolower($img_ex);



      /** 
    crating array that stores allowed
    to upload image extensions.
       **/
      $allowed_exs = array('jpg', 'jpeg', 'png', 'jiff');


      /** 
    check if the the image extension 
    is present in $allowed_exs array
       **/



      if (in_array($img_ex_lc, $allowed_exs)) {
        /** 
       renaming the image name with 
       with random string
         **/
        $new_img_name = uniqid('IMG-', true) . '.' . $img_ex_lc;



        # crating upload path on root directory
        $img_upload_path = '../image_upload/uploads/' . $new_img_name;

        # inserting imge name into database
        $sql  = "INSERT INTO college_images (clz_id, img_name) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$clz_id, $new_img_name]);


        # move uploaded image to 'uploads' folder
        move_uploaded_file($tmp_name, $img_upload_path);

        # redirect to 'index.php'
        header("Location: settings.php");
      } else {
        # error message
        $em = "You can't upload files of this type";

        /*
        redirect to 'index.php' and 
        passing the error message
          */

        header("Location: settings.php?error=$em");
      }
    } else {
      # error message
      $em = "Unknown Error Occurred while uploading";

      /*
      redirect to 'index.php' and 
      passing the error message
        */

      header("Location: settings.php?error=$em");
    }
  }
}

$sql = "SELECT * FROM college_info WHERE clz_id= $clz_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = mysqli_fetch_array($result);
  $prev_email = $row['email'];
} else {
  //nothing
}
$all_college_types = array('Profitable', 'Non-Profitable', 'Private', 'Government', 'NGO', 'INGO');
$selected_type = $row['college_type'];

$selected_faculties = (explode(", ", $row['faculties']));
$facilities = (explode(", ", $row['facilities']));


//for password change

$passwordUpdateMessage = "";





$updated_message = "";
$sql = "SELECT * FROM college_info WHERE clz_id= $clz_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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

    if (isset($_POST['update_social'])) {
      $prev_email = $_POST['prev_email'];
      // update social data
      $facebook = $_POST['facebook'];
      $instagram = $_POST['instagram'];
      $website = $_POST['website'];
      $email = $_POST['email'];

      //sql query for update
      $sql = "UPDATE `college_info` SET `facebook`='$facebook',`instagram`='$instagram',`website`='$website',`email`='$email' WHERE `clz_id` = '$clz_id'";
      $sql2 = "UPDATE `login` SET `email`='$email' WHERE `email`='$prev_email'";

      // update data into students table
      if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
        $updated_message = "Social Info Updated Successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  }
} else {
  // $result->num_rows = 0
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
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
  <style>

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
      <div class="container grid ">

        <div class="general-info bg-white p-20 rad-6 ">
          <h2 class="mb-20">General Info</h2>
          <p class=" c-gray">General Information About Your College</p>

          <form id="update_clz" action="settings.php" method="post" enctype="multipart/form-data>
            <input type=" hidden" name="prev_email" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['email']; ?>">

            <label class=" fs-14 c-gray mb-10 d-block mt-20 ">College Name</label>
            <input type=" text" name="college_name" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['name']; ?>">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">College Address</label>
            <input type="text" name="address" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['address']; ?>">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">Phone Number</label>
            <input type="text" name="phone" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['phone']; ?>">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">Establised Date</label>
            <input type="text" name="estd" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['estd']; ?>">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">Certifications</label>
            <input type="text" name="certification" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['certification']; ?>">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-15">Organization Type</label>
            <select name="college_type">

              <?php
              foreach ($all_college_types as $value) {
                if ($selected_type == $value) {
                  echo "<option selected='selected' value='$value'>$value</option>";
                } else {
                  echo "<option value='$value'>$value</option>";
                }
              }

              ?>
            </select>



            <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">Faculties/ Courses you offer</label>
            <!-- <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" placeholder="Faculty">
            <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" placeholder="Faculty">
            <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" placeholder="Faculty">
            <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" placeholder="Faculty">
            <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" placeholder="Faculty"> -->


            <input style="display: inline;" type="checkbox" id="faculty1" name="faculty[]" value="BBA" <?php if (in_array("BBA", $selected_faculties)) {
                                                                                                          echo "checked";
                                                                                                        } ?>>
            <label>BBA</label><br>
            <input style="display: inline;" type="checkbox" id="faculty2" name="faculty[]" value="BCA" <?php if (in_array("BCA", $selected_faculties)) {
                                                                                                          echo "checked";
                                                                                                        } ?>>
            <label>BCA</label><br>
            <input style="display: inline;" type="checkbox" id="faculty3" name="faculty[]" value="BPH" <?php if (in_array("BPH", $selected_faculties)) {
                                                                                                          echo "checked";
                                                                                                        } ?>>
            <label>BPH</label><br>
            <input style="display: inline;" type="checkbox" id="faculty4" name="faculty[]" value="BBS" <?php if (in_array("BBS", $selected_faculties)) {
                                                                                                          echo "checked";
                                                                                                        } ?>>
            <label>BBS</label><br>
            <input style="display: inline;" type="checkbox" id="faculty5" name="faculty[]" value="Engineering" <?php if (in_array("Engineering", $selected_faculties)) {
                                                                                                                  echo "checked";
                                                                                                                } ?>>
            <label>Engineering</label><br>
            <input style="display: inline;" type="checkbox" id="faculty6" name="faculty[]" value="BALLB" <?php if (in_array("BALLB", $selected_faculties)) {
                                                                                                            echo "checked";
                                                                                                          } ?>>
            <label>BALLB</label><br>

            <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">Top Facilities in your College</label>
            <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" name="facility[]" value="<?php if (isset($facilities[0])) {
                                                                                                  echo $facilities[0];
                                                                                                } ?>">
            <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" name="facility[]" value="<?php if (isset($facilities[1])) {
                                                                                                  echo $facilities[1];
                                                                                                } ?>">
            <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" name="facility[]" value="<?php if (isset($facilities[2])) {
                                                                                                  echo $facilities[2];
                                                                                                } ?>">
            <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" name="facility[]" value="<?php if (isset($facilities[3])) {
                                                                                                  echo $facilities[3];
                                                                                                } ?>">
            <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" name="facility[]" value="<?php if (isset($facilities[4])) {
                                                                                                  echo $facilities[4];
                                                                                                } ?>">

            <br>
            <br>


            <!-- <div class="draft txt-c-mobile p-20 column bg-white p-relative rad-10"> -->

            <label for="" class="fs-14 c-gray mb-10 d-block mt-15 ">Description of your College</label>
            <!-- <input type="textbox" class="c-gray p-10 rad-6 fs-14 " placeholder="Description of your College"> -->

            <textarea name="description" id="" class="c-gray p-10 rad-6 fs-14 f-width" placeholder="your thought"><?php echo $row['description']; ?></textarea>
            <!-- <input type="submit" value="save" class="c-white bg-blue p-5 rad-6 bg-blue d-block fit-width fs-14"> -->

            <!-- </div> -->
            <button type="submit" name="update_college" style="background-color: teal; color: white; border-radius: 6px; font-size: 15px; display: block; width: fit-content; text-decoration: none; margin-top:10px">Update General Info</button>
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
            <label for="show"><span class="rad-6 c-white bg-blue p-5" style="background-color: teal; color: white; border-radius: 6px; font-size: 14px; display: block; width: fit-content; text-decoration: none;">Change</span></label>

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
            <form action="settings.php" method="post">
              <input type="hidden" name="prev_email" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['email']; ?>">
              <div class="instagram rad-6 mb-20 mt-25 bg-f6 d-flex ">
                <div class="icon  flex-center">
                  <i class="fa-brands fa-instagram c-gray "></i>
                </div>
                <input type="text" name="instagram" value="<?php echo $row['instagram']; ?>" class="c-gray p-10 rad-6 fs-14 bg-f6">
              </div>

              <div class="facebook rad-6 mb-20 bg-f6 d-flex">
                <div class="icon  flex-center">
                  <i class="fa-brands fa-facebook c-gray "></i>
                </div>
                <input type="text" name="facebook" value="<?php echo $row['facebook']; ?>" class="c-gray p-10 rad-6 fs-14 bg-f6">
              </div>

              <div class="linkedin rad-6 mb-20 bg-f6 d-flex">
                <!-- <div class="icon  flex-center">
                  <i class="fa-brands fa-linkedin c-gray "></i>
                </div> -->
                <input type="text" name="website" value="<?php echo $row['website']; ?>" class="c-gray p-10 rad-6 fs-14 bg-f6">
              </div>

              <div class="youtube rad-6 mb-20 bg-f6 d-flex">
                <!-- <div class="icon  flex-center">
                  <i class="fa-brands fa-youtube c-gray "></i>
                </div> -->
                <input type="email" name="email" value="<?php echo $row['email']; ?>" class="c-gray p-10 rad-6 fs-14 bg-f6" required>
              </div>
              <button type="submit" name="update_social" style="background-color: teal; color: white; border-radius: 6px; font-size: 15px; display: block; width: fit-content; text-decoration: none; margin-top:10px">Update Social Info</button>

            </form>

            <form method="post" action="settings.php" enctype="multipart/form-data">
              <?php
              if (isset($_GET['error'])) {
                echo "<p class='error'>";
                echo htmlspecialchars($_GET['error']);
                echo "</p>";
              }
              ?>
              <label for="" class=" fs-14 c-gray mb-10 d-block mt-20 ">Upload picture of your college </label>
              <input type="file" id="main_img" name="main_img" accept="image/*">
              <button type="submit" name="upload_main">Upload</button>
            </form>

            <form method="post" action="settings.php" enctype="multipart/form-data">
              <?php
              if (isset($_GET['error'])) {
                echo "<p class='error'>";
                echo htmlspecialchars($_GET['error']);
                echo "</p>";
              }
              ?>
              <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">Upload Logo of your College</label>
              <input type="file" id="logo" name="logo" accept="image/*">
              <button type="submit" name="upload_logo">Upload</button>
            </form>

            <form method="post" action="settings.php" enctype="multipart/form-data">
              <?php
              if (isset($_GET['error'])) {
                echo "<p class='error'>";
                echo htmlspecialchars($_GET['error']);
                echo "</p>";
              }
              ?>
              <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">Upload ambience/glimpse of your college</label>
              <input type="file" name="images[]" multiple id="">
              <button type="submit" name="upload">Upload</button>
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>

  <script src="../dashboard_student/formValidation.js"></script>

  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>