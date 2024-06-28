<?php
@require_once '../connectionSetup.php';
session_start();
if (!isset($_SESSION['email'])) {
  header('location:../loginpage.php');
  die();
} else {
  // $_SESSION['current_user'] = $_COOKIE['current_user'];
  // $_SESSION['email'] = $_COOKIE['email'];
  $temp_email = $_SESSION['email'];

  $sql = "SELECT * FROM students WHERE email= '$temp_email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = mysqli_fetch_array($result);
  } else {
  }
}


$updated_message = "";
  $sql = "SELECT * FROM students WHERE email= '$temp_email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['update_user'])) {
        // update form data
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $name = $first_name.' '.$last_name;
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        
        //sql query for update
        $sql = "UPDATE `students` SET `name`='$name',`email`='$email',
          `phone`='$phone',`address`='$address' WHERE `email` = '$email'";

        if ($conn->query($sql) === TRUE) { // update data into students table
          $updated_message = "Updated Successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // $sql = "UPDATE `students` SET `name`='',`email`='[value-2]',`password`='[value-3]',
        // `phone`='[value-4]',`address`='[value-5]',`facebook`='[value-6]',`instagram`='[value-7]',
        // `linkedIn`='[value-8]',`youtube`='[value-9]' WHERE 1";


      }
    }



    $row = mysqli_fetch_array($result);
  }
   else {
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
          <p class=" c-gray">General Information About Your Account</p>
          <form id="update_form" action="settings.php" method="post">

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

            <!-- <input type="submit" value="Change" class="fs-18 c-blue bg-white"> -->


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

              <div class="facebook rad-6 mb-20 bg-f6 d-flex">
                <div class="icon  flex-center">
                  <i class="fa-brands fa-facebook c-gray "></i>
                </div>
                <input type="text" value="<?php echo $row['facebook']; ?>" class="c-gray p-10 rad-6 fs-14 bg-f6">
              </div>

              <div class="instagram rad-6 mb-20 mt-25 bg-f6 d-flex ">
                <div class="icon  flex-center">
                  <i class="fa-brands fa-instagram c-gray "></i>
                </div>
                <input type="text" value="<?php echo $row['instagram']; ?>" class="c-gray p-10 rad-6 fs-14 bg-f6">
              </div>

              <div class="linkedin rad-6 mb-20 bg-f6 d-flex">
                <div class="icon  flex-center">
                  <i class="fa-brands fa-linkedin c-gray "></i>
                </div>
                <input type="text" value="<?php echo $row['linkedIn']; ?>" class="c-gray p-10 rad-6 fs-14 bg-f6">
              </div>

              <div class="youtube rad-6 mb-20 bg-f6 d-flex">
                <div class="icon  flex-center">
                  <i class="fa-brands fa-youtube c-gray "></i>
                </div>
                <input type="text" value="<?php echo $row['youtube']; ?>" class="c-gray p-10 rad-6 fs-14 bg-f6">
              </div>
            </form>
            <input type="submit" form="update_form" name="update_user" value="Update" class="rad-6 c-white bg-blue p-5">
            <div class="text" style="display: inline-block;">
              <H4><?php echo $updated_message ?></H4>
              <!-- <p class="c-gray fs-14 mt-5">Last Change On 25/10/2021</p> -->
            </div>
          </div>

        </div>
      </div>

</body>