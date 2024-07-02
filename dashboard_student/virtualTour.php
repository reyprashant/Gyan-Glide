<?php
@require_once '../connectionSetup.php';
session_start();
if (!isset($_SESSION['std_id'])) {
    header('location:../loginpage.php');
    die();
  }

$std_id = $_SESSION['std_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Half Slider - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="../virtual_tour_file/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../virtual_tour_file/css/half-slider.css" rel="stylesheet">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/framework.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Rubik:wght@300;400;600;900&family=Work+Sans:wght@300;400;500;600;800&display=swap" rel="stylesheet">
 

</head>
<style>
    a:hover{
        text-decoration: none;
        color: black;
    }
    li{
        width: 165px;
    }
</style>
<body>

  <div class="courses page d-flex">
    <?php
    require_once '../dashboard_student/dashboard_navbar.php';
    ?>

    <div class="content d-flex  column">
      <?php
      require_once '../dashboard_student/dashboard_header.php';
      ?>
      <h1 class="p-relative mt-10">Virtual Tour</h1>
      <header class="">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background-image: url('../virtual_tour_file/amarsingh.jpeg')">
              <div class="carousel-caption d-none d-md-block">
                <h3>First Slide</h3>
                <p>This is a description for the first slide.</p>
              </div>
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('../virtual_tour_file/college.jpg')">
              <div class="carousel-caption d-none d-md-block">
                <h3>Second Slide</h3>
                <p>This is a description for the second slide.</p>
              </div>
            </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('../virtual_tour_file/Collge\ Fit3.jpg')">
              <div class="carousel-caption d-none d-md-block">
                <h3>Third Slide</h3>
                <p>This is a description for the third slide.</p>
              </div>
            </div>

            <div class="carousel-item" style="background-image: url('../virtual_tour_file/kma.jpeg')">
              <div class="carousel-caption d-none d-md-block">
                <h3>Forth Slide</h3>
                <p>This is a description for the Forth slide.</p>
              </div>
            </div>


          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </header>
    </div>
  </div>




  <script src="../virtual_tour_file/vendor/jquery/jquery.min.js"></script>
  <script src="../virtual_tour_file/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>