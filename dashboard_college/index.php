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
              <p class="c-gray">LA GRANDEE International College</p>
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

        <div class="draft txt-c-mobile p-20 column bg-white p-relative rad-10">
          <h2>Quick Draft</h2>
          <p class="c-gray fs-18">write a summary that describe your college</p>
          <form action="">
            <textarea name="" id="" placeholder="title" class="f-width  bg-gray rad-10 p-10 fs-14"></textarea>
            <textarea name="" id="" placeholder="your thought" class="c-white f-width rad-10 p-10 mt-10 bg-gray fs-14"></textarea>
            <input type="submit" value="save" class="c-white bg-blue p-5 rad-6 bg-blue d-block fit-width fs-14">
          </form>
        </div>

        <div class="targets p-20 bg-white rad-10">
          <h2>Your Sumary</h2>
          <p class="c-gray fs-18 mt-20">Your infos</p>
          <div class="mt-10 money d-flex">
            <i class="fa-solid   d-flex align-center justify-center">R</i>
            <div class="text f-width ">
              <p class="c-gray mt-5">Revenue from students</p>
              <h4 class="mt-10">20000</h4>
              <div class="p-relative bg-blue ">
                <span class="p-absolute f-height" style="width: 80%;">
                  <span class="p-absolute bg-blue c-white p-5 rad-6 fs-12">80%</span>
                </span>
              </div>
            </div>
          </div>
          <div class="projects mt-20 d-flex">
            <i class="fa-solid fa-code bg-orange  d-flex align-center justify-center"></i>
            <div class="text f-width">
              <p class="c-gray mt-5">Scholarships you provided</p>
              <h4 class="mt-10">24</h4>
              <div class="bg-orange p-relative">
                <span class="p-absolute f-height" style="width:55%;">
                  <span class="p-absolute bg-orange c-white p-5 rad-6 fs-12 ">65%</span>
                </span>
              </div>
            </div>
          </div>
          <div class="team mt-20 d-flex">
            <i class="fa-solid fa-user bg-green  d-flex align-center justify-center"></i>
            <div class="text f-width">
              <p class="c-gray mt-5">Number of students enrolled to you from Gyan-Glide</p>
              <h4 class="mt-10">12 out of 15</h4>
              <div class="bg-green p-relative">
                <span class="p-absolute f-height" style="width:75%;">
                  <span class="p-absolute bg-green c-white p-5 rad-6 fs-12">75%</span>
                </span>
              </div>
            </div>
          </div>
        </div>

        <div class="tickets p-20 bg-white rad-6">
          <h2>Student Statistics</h2>
          <p class="c-gray fs-18 mt-20">Everything about students</p>
          <div class="tickets-holder grid mt-20">
            <div class="ticket flex-center column  p-20 rad-6">
              <i class="fa-solid fa-list c-orange mb-10"></i>
              <h2>50</h2>
              <p class="c-gray">Total</p>
            </div>

            <div class="ticket p-20 flex-center column  rad-6">
              <i class="fa-regular fa-circle-check c-green mb-10"></i>
              <h2>12</h2>
              <p class="c-gray">Closed</p>
            </div>

            <div class="ticket flex-center column p-20 rad-6">
              <i class="fa-solid fa-spinner c-blue mb-10"></i>
              <h2>5</h2>
              <p class="c-gray">Pending</p>
            </div>

            <div class="ticket flex-center column p-20 rad-6">
              <i class="fa-regular fa-square-xmark c-red mb-10"></i>
              <h2>2500</h2>
              <p class="c-gray">Total students in Gyan-Glide</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>