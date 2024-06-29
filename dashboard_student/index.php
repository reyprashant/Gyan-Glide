<?php
@require_once '../connectionSetup.php';
session_start();
if (!isset($_SESSION['current_user'])) {
  header('location:../loginpage.php');
  die();
}
// $_SESSION['current_user'] = $_COOKIE['current_user'];
// $_SESSION['email'] = $_COOKIE['email'];
$temp_email = $_SESSION['email'];

$sql = "SELECT * FROM students WHERE email= '$temp_email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_array($result);
} else {
    
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
  <title>Dashboard</title>
</head>

<body>
  <div class="dashboard page d-flex">
    <?php
    include_once 'dashboard_navbar.php';
    ?>


    <div class="content d-flex  column">
      <?php
      include_once 'dashboard_header.php';
      ?>

      <h1 class="p-relative mt-10">Dashboard</h1>
      <div class="container"> <!-- <div class="container grid "> -->

        <div class="welcome txt-c-mobile bg-white p-relative rad-10">
          <div class="title  between-flex p-20 bg-gray p-relative ">
            <div class="text">
              <h2>welcome</h2>
              <p class="c-gray"><span id="loggedUsername"><?php echo $_SESSION['current_user']; ?></span></p>
            </div>
            <img src="images/welcome.png" alt="">
            <img src="images/avatar.png" alt="" class="p-absolute">
          </div>
          <div class="data between-flex p-20 mb-20">
            <div class="name">
              <p><?php echo "USSER BIO"?></p>
              <span class="c-gray">ISO Certified College</span>
            </div>

          </div>
          <a href="settings.php" class="c-white p-20 bg-blue rad-6 fs-14 d-block fit-width">profile</a>
        </div>
        <div class="discription p-20 bg-white rad-6 mt-20 ml-20 mr-20 d-flex wrap">

          <div class="user flex-center column">


            <img src="../reviews/user2.png" alt="logo of college">
            <div class="popup" style=" width: 400px; background: white; position: relative; top: 50%; left: 50%; ">
            <h3 class="mt-10"><?php echo $row['name']; ?></h3>
            </div>
           

            <div class="progress p-relative mt-10"><span class="rad-6" style="width:70%;"></span></div>

          </div>


          <div class="boxes bg-white">
            <div class="box p-20">
              <h4 class="c-gray mb-10 ">General Information</h4>
              <div class="text grid">
                <p class="c-gray fs-15 mt-5 d-flex align-center">Full Name:<span class="c-black"><?php echo $_SESSION['current_user']; ?></span></p>
                <p class="c-gray fs-15 mt-5 d-flex align-center">City:<span class="c-black">Pokhara</span></p>
                <label class="d-flex align-center">
                  <input type="checkbox" class="checkbox-button p-relative" checked>
                </label>
              </div>
            </div>

            <div class="box p-20">
              <h4 class="c-gray mb-10 ">Other Information</h4>
              <div class="text grid">
                <p class="c-gray fs-15 mt-5 d-flex align-center">Title:<span class="c-black">ISO Certified College</span></p>

              </div>
            </div>

            <div class="box p-20">
              <h4 class="c-gray mb-10 ">Personal Information</h4>
              <div class="text grid">
                <p class="c-gray fs-15 mt-5 d-flex align-center">Email:<span class="c-black"><?php echo $row['email']; ?></span></p>
                <p class="c-gray fs-15 mt-5 d-flex align-center">Phone:<span class="c-black"><?php echo $row['phone']; ?></span></p>
                <p class="c-gray fs-15 mt-5 d-flex align-center">Address:<span class="c-black"><?php echo $row['address']; ?></span></p>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>



</body>

</html>