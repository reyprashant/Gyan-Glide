<?php
@include 'connectionSetup.php';
session_start();
if (!isset($_COOKIE['current_user'])) {
  header('location:../loginpage.php');
  die();
}
$_SESSION['current_user'] = $_COOKIE['current_user'];

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
      <div class="container grid ">
        
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
              <p>LA GRANDEE International College</p>
              <span class="c-gray">ISO Certified College</span>
            </div>
            <div class="projects">
              <p>800</p>
              <span class="c-gray">Students</span>
            </div>
            <!-- <div class="earn">
              <p>$8500</p>
              <span class="c-gray">earned</span>
            </div> -->
          </div>
          <a href="profile.html" class="c-white p-20 bg-blue rad-6 fs-14 d-block fit-width">profile</a>
        </div>


      </div>
    </div>
  </div>
</body>

</html>