<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Half Slider - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/half-slider.css" rel="stylesheet">
  <link rel="stylesheet" href="../dashboard_college/css/all.min.css">
  <link rel="stylesheet" href="../dashboard_college/css/framework.css">
  <link rel="stylesheet" href="../dashboard_college/css/normalize.css">
  <link rel="stylesheet" href="../dashboard_college/css/index.css">

</head>

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
            <div class="carousel-item active" style="background-image: url('amarsingh.jpeg')">
              <div class="carousel-caption d-none d-md-block">
                <h3>First Slide</h3>
                <p>This is a description for the first slide.</p>
              </div>
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('college.jpg')">
              <div class="carousel-caption d-none d-md-block">
                <h3>Second Slide</h3>
                <p>This is a description for the second slide.</p>
              </div>
            </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('Collge\ Fit3.jpg')">
              <div class="carousel-caption d-none d-md-block">
                <h3>Third Slide</h3>
                <p>This is a description for the third slide.</p>
              </div>
            </div>

            <div class="carousel-item" style="background-image: url('kma.jpeg')">
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




  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>