<?php
@require_once '../connectionSetup.php';
session_start();
$_SESSION['clz_id'] = 1;
if (!isset($_SESSION['clz_id'])) {
  header('location:../index.php');
  die();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/framework.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Rubik:wght@300;400;600;900&family=Work+Sans:wght@300;400;500;600;800&display=swap" rel="stylesheet">
  <title>plans</title>
</head>

<body style="background-color: rgb(173, 255, 255);">
  <div class="plans page d-flex">
    <?php
    require_once 'dashboard_navbar.php';
    ?>

    <div class="content d-flex  column">

      <?php
      require_once 'dashboard_header.php';
      ?>
      <h1 class="p-relative mt-10">Plans</h1>
      <!-- <div class="container grid">
                <div class="plan bg-white p-20">
                    <div class="price c-white flex-center column bg-green">
                        <h3 >Free</h3>
                        <h2><sup class="fs-18">$</sup>0.00</h2>
                    </div>
                    <ul class="bg-white mt-30">
                      <li class="available between-flex">
                        <p>Access All Text Lessons</p>
                        <i class="fa-solid fa-circle-exclamation"></i>
                      </li>
                      <li class="available between-flex">
                        <p>Access All Videos Lessons</p>
                        <i class="fa-solid fa-circle-exclamation"></i>
                      </li>
                      <li class="available between-flex">
                        <p>Appear On Leaderboard</p>
                        <i class="fa-solid fa-circle-exclamation"></i>
                      </li>
                      <li class="unavailable between-flex">
                        <p>Browse Content Without Ads</p>
                        <i class="fa-solid fa-circle-exclamation"></i>
                      </li>
                      <li class="unavailable between-flex">
                        <p>Browse Content Without Ads</p>
                        <i class="fa-solid fa-circle-exclamation"></i>
                      </li>
                      <li class="unavailable between-flex">
                        <p>Access All Assignments</p>
                        <i class="fa-solid fa-circle-exclamation"></i>
                      </li>
                      <li class="unavailable between-flex">
                        <p>Get Daily Prizes</p>
                        <i class="fa-solid fa-circle-exclamation"></i>
                      </li>
                      <li class="unavailable between-flex">
                        <p>Earn Certificate</p>
                        <i class="fa-solid fa-circle-exclamation"></i>
                      </li>
                      <li class="unavailable between-flex">
                        <p>1 GB Space For Hosting Files</p>
                        <i class="fa-solid fa-circle-exclamation"></i>
                      </li>
                      <li class="unavailable between-flex">
                        <p> Access Badge System</p>
                        <i class="fa-solid fa-circle-exclamation"></i>
                      </li>
                        
                    </ul>
                    <a href="#" class="bg-green rad-6 p-10 c-white" >Join</a>

                </div>

                <div class="plan bg-white p-20">
                  <div class="price c-white flex-center column bg-blue">
                      <h3 >Basic</h3>
                      <h2><sup class="fs-18">$</sup>8.99</h2>
                  </div>
                  <ul class="bg-white mt-30 ">
                    <li class="available between-flex">
                      <p>Access All Text Lessons</p>
                      <i class="fa-solid fa-circle-exclamation"></i>
                    </li>
                    <li class="available between-flex">
                      <p>Access All Videos Lessons</p>
                      <i class="fa-solid fa-circle-exclamation"></i>
                    </li>
                    <li class="available between-flex">
                      <p>Appear On Leaderboard</p>
                      <i class="fa-solid fa-circle-exclamation"></i>
                    </li>
                    <li class="available between-flex">
                      <p>Browse Content Without Ads</p>
                      <i class="fa-solid fa-circle-exclamation"></i>
                    </li>
                    <li class="available between-flex">
                      <p>Browse Content Without Ads</p>
                      <i class="fa-solid fa-circle-exclamation"></i>
                    </li>
                    <li class="available between-flex">
                      <p>Access All Assignments</p>
                      <i class="fa-solid fa-circle-exclamation"></i>
                    </li>
                    <li class="available between-flex">
                      <p>Get Daily Prizes</p>
                      <i class="fa-solid fa-circle-exclamation"></i>
                    </li>
                    <li class="unavailable between-flex">
                      <p>Earn Certificate</p>
                      <i class="fa-solid fa-circle-exclamation"></i>
                    </li>
                    <li class="unavailable between-flex">
                      <p>1 GB Space For Hosting Files</p>
                      <i class="fa-solid fa-circle-exclamation"></i>
                    </li>
                    <li class="unavailable between-flex">
                      <p> Access Badge System</p>
                      <i class="fa-solid fa-circle-exclamation"></i>
                    </li>
                      
                  </ul>
                  <a href="#" class="bg-blue p-10 rad-6 c-white ">Join</a>
                </div>

                <div class="plan bg-white p-20">
                  <div class="price c-white flex-center column bg-orange">
                      <h3 >Premium</h3>
                      <h2><sup class="fs-18">$</sup>18.99</h2>
                  </div>
                  <ul class="bg-white mt-30">
                    <li class="available between-flex">
                      <p>Access All Text Lessons</p>
                      <i class="fa-solid fa-circle-exclamation"></i>
                    </li>
                    <li class="available between-flex">
                      <p>Access All Videos Lessons</p>
                      <i class="fa-solid fa-circle-exclamation"></i>
                    </li>
                    <li class="available between-flex">
                      <p>Appear On Leaderboard</p>
                      <i class="fa-solid fa-circle-exclamation"></i>
                    </li>
                    <li class="available between-flex">
                      <p>Browse Content Without Ads</p>
                      <i class="fa-solid fa-circle-exclamation"></i>
                    </li>
                    <li class="available between-flex">
                      <p>Browse Content Without Ads</p>
                      <i class="fa-solid fa-circle-exclamation"></i>
                    </li>
                    <li class="available between-flex">
                      <p>Access All Assignments</p>
                      <i class="fa-solid fa-circle-exclamation"></i>
                    </li>
                    <li class="available between-flex">
                      <p>Get Daily Prizes</p>
                      <i class="fa-solid fa-circle-exclamation"></i>
                    </li>
                    <li class="available between-flex">
                      <p>Earn Certificate</p>
                      <i class="fa-solid fa-circle-exclamation"></i>
                    </li>
                    <li class="available between-flex">
                      <p>1 GB Space For Hosting Files</p>
                      <i class="fa-solid fa-circle-exclamation"></i>
                    </li>
                    <li class="available between-flex">
                      <p> Access Badge System</p>
                      <i class="fa-solid fa-circle-exclamation"></i>
                    </li>
                      
                  </ul>

                  <p class="fs-15 txt-c c-gray ">This Is Your Current Plan</p> -->
    </div>
  </div>
</body>

</html>