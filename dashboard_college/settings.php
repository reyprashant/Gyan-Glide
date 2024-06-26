<?php
@require_once '../connectionSetup.php';
include_once 'data_uploader.php';
session_start();
$clz_id = 1;



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
      $allowed_exs = array('jpg', 'jpeg', 'png');


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
        $stmt->execute([1, $new_img_name]);


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

// if (!isset($_SESSION['email'])) {
//   header('location:../loginpage.php');
//   die();
// } else {
//   // $_SESSION['current_user'] = $_COOKIE['current_user'];
//   // $_SESSION['email'] = $_COOKIE['email'];
//   $temp_email = $_SESSION['email'];

//   $sql = "SELECT * FROM students WHERE email= '$temp_email'";
//   $result = $conn->query($sql);

//   if ($result->num_rows > 0) {
//     $row = mysqli_fetch_array($result);
//   } else {
//   }
// }

$sql = "SELECT * FROM college_info WHERE clz_id= $clz_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = mysqli_fetch_array($result);
} else {
  //nothing
}
$all_college_types = array('Profitable', 'Non-Profitable', 'Private', 'Government', 'NGO', 'INGO');
$selected_type = $row['college_type'];

$selected_faculties = (explode(", ", $row['faculties']));
$facilities = (explode("**** ", $row['facilities']));


//for password change

$passwordUpdateMessage = "";





$updated_message = "";
$sql = "SELECT * FROM college_info WHERE clz_id= $clz_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['update_social'])) {
      // update social data
      $facebook = $_POST['facebook'];
      $instagram = $_POST['instagram'];
      $linkedIn = $_POST['linkedIn'];
      $github = $_POST['github'];

      //sql query for update
      $sql = "UPDATE `students` SET `facebook`='$facebook',`instagram`='$instagram',
        `linkedIn`='$linkedIn',`github`='$github' WHERE `email` = '$temp_email'";

      // update data into students table
      if ($conn->query($sql) === TRUE) {
        $updated_message = "Social Info Updated Successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    $sql = "SELECT * FROM college_info WHERE clz_id= $clz_id";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Rubik:wght@300;400;600;900&family=Work+Sans:wght@300;400;500;600;800&display=swap" rel="stylesheet">
  <title>Settings</title>
</head>

<body>

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


            <label for="" class=" fs-14 c-gray mb-10 d-block mt-20 ">College Name</label>
            <input type=" text" name="college_name" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['name']; ?>">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">College Address</label>
            <input type="text" name="address" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['address']; ?>">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">Establised Date</label>
            <input type="text" name="estd" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['estd']; ?>">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">Certifications</label>
            <input type="text" name="certification" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['certification']; ?>">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-15">Organization Type</label>
            <select name="college_type" id="1">

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


            <input type="checkbox" id="faculty1" name="faculty[]" value="BBA" <?php if (in_array("BBA", $selected_faculties)) {
                                                                                echo "checked";
                                                                              } ?>>
            <label for="vehicle1">BBA</label><br>
            <input type="checkbox" id="faculty2" name="faculty[]" value="BCA" <?php if (in_array("BCA", $selected_faculties)) {
                                                                                echo "checked";
                                                                              } ?>>
            <label for="vehicle2">BCA</label><br>
            <input type="checkbox" id="faculty3" name="faculty[]" value="BPH" <?php if (in_array("BPH", $selected_faculties)) {
                                                                                echo "checked";
                                                                              } ?>>
            <label for="vehicle3">BPH</label><br>
            <input type="checkbox" id="faculty4" name="faculty[]" value="BBS" <?php if (in_array("BBS", $selected_faculties)) {
                                                                                echo "checked";
                                                                              } ?>>
            <label for="vehicle1">BBS</label><br>
            <input type="checkbox" id="faculty5" name="faculty[]" value="Engineering" <?php if (in_array("Engineering", $selected_faculties)) {
                                                                                        echo "checked";
                                                                                      } ?>>
            <label for="vehicle2">Engineering</label><br>
            <input type="checkbox" id="faculty6" name="faculty[]" value="BALLB" <?php if (in_array("BALLB", $selected_faculties)) {
                                                                                  echo "checked";
                                                                                } ?>>
            <label for="vehicle3">BALLB</label><br>

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

            <textarea name="" id="" class="c-gray p-10 rad-6 fs-14 f-width" placeholder="your thought"></textarea>
            <!-- <input type="submit" value="save" class="c-white bg-blue p-5 rad-6 bg-blue d-block fit-width fs-14"> -->

            <!-- </div> -->
            <button type="submit" name="update_college">Update General Info</button>
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
            <a href="#" class="rad-6 c-white bg-blue p-5 ">Change</a>
          </div>

          <div class="social-info bg-white p-20 rad-6 ">
            <h2 class="mb-20">Social Info</h2>
            <p class=" c-gray">General Information About Your Account</p>
            <form action="">
              <div class="instagram rad-6 mb-20 mt-25 bg-f6 d-flex ">
                <div class="icon  flex-center">
                  <i class="fa-brands fa-instagram c-gray "></i>
                </div>
                <input type="text" value="Instagram username" class="c-gray p-10 rad-6 fs-14 bg-f6">
              </div>

              <div class="facebook rad-6 mb-20 bg-f6 d-flex">
                <div class="icon  flex-center">
                  <i class="fa-brands fa-facebook c-gray "></i>
                </div>
                <input type="text" value="facebook username" class="c-gray p-10 rad-6 fs-14 bg-f6">
              </div>

              <div class="linkedin rad-6 mb-20 bg-f6 d-flex">
                <!-- <div class="icon  flex-center">
                  <i class="fa-brands fa-linkedin c-gray "></i>
                </div> -->
                <input type="text" value="website url" class="c-gray p-10 rad-6 fs-14 bg-f6">
              </div>

              <div class="youtube rad-6 mb-20 bg-f6 d-flex">
                <!-- <div class="icon  flex-center">
                  <i class="fa-brands fa-youtube c-gray "></i>
                </div> -->
                <input type="text" value="email address" class="c-gray p-10 rad-6 fs-14 bg-f6">
              </div>
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

</body>