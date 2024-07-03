<?php
@require_once '../connectionSetup.php';
session_start();
if (!isset($_SESSION['clz_id'])) {
  header('location:../index.php');
  die();
}

$clz_id = $_SESSION['clz_id'];
$sql = "SELECT * FROM college_info WHERE clz_id= $clz_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = mysqli_fetch_array($result);
  $selected_faculties = (explode(", ", $row['faculties']));

// if (empty($row['prev_school'])){
//   $prev_school = "N/A";
// }else{
//   $prev_school = $row['prev_school'];
// }

// if (empty($row['grade'])){
//   $grade = "N/A";
// }else{
//   $grade = $row['grade'];
// }
} else {
}

$sql = "SELECT * FROM college_main_images WHERE clz_id= $clz_id";
$college_image_data = $conn->query($sql);
if ($college_image_data->num_rows > 0) {
    $college_image_array = mysqli_fetch_array($college_image_data);
    $college_image = $college_image_array['main_img'];
    $college_logo = $college_image_array['logo'];
} else {
    $college_image = 'default.jpg';
    $college_logo = 'default.jpg';
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
  <title>Profile</title>
</head>

<body style="background-color: rgb(173, 255, 255);">
  <div class="profile page d-flex">
    <?php
    require_once 'dashboard_navbar.php';
    ?>

    <div class="content d-flex  column">

      <?php
      require_once 'dashboard_header.php';
      ?>
      <h1 class="p-relative mt-10">Dashboard</h1>
      <div class="discription p-20 bg-white rad-6 mt-20 ml-20 mr-20 d-flex wrap">
        <div class="user flex-center column">
          <img src="../image_upload/clz_logo/<?php echo $college_logo;?>" alt="logo of college">
          <h3 class="mt-10"><?php echo $row['name'];?></h3>
          <!-- <p class="c-gray fs-14 mt-10">Level 20</p> -->
          <!-- <div class="progress p-relative mt-10"><span class="rad-6" style="width:70%;"></span></div> -->
          <!-- <div class="icons mt-10">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div> -->
          <!-- <p class="c-gray fs-12 mt-10">550 rating</p> -->
        </div>
        <div class="boxes bg-white">
          <div class="box p-20">
            <h4 class="c-gray mb-10 ">General Information</h4>
            <div class="text grid">
              <p class="c-gray fs-15 mt-5 d-flex align-center">Full Name:<span class="c-black"><?php echo $row['name'];?></span></p>
              <!-- <p class="c-gray fs-15 mt-5 d-flex align-center">Gender:<span class="c-black">Male</span></p> -->
              <span class="c-gray fs-15 mt-5 d-flex align-center">City:<span class="c-black"><?php echo $row['address'];?></span></span>
            </div>
          </div>

          <div class="box p-20">
            <h4 class="c-gray mb-10 ">Other Information</h4>
            <div class="text grid">
              <p class="c-gray fs-15 mt-5 d-flex align-center">Title:<span class="c-black"><?php echo $row['certification'];?></span></p>
            </div>
          </div>

          <div class="box p-20">
            <h4 class="c-gray mb-10 ">Personal Information</h4>
            <div class="text grid">
              <p class="c-gray fs-15 mt-5 d-flex align-center">Email:<span class="c-black"><?php echo $row['email'];?></span></p>
              <p class="c-gray fs-15 mt-5 d-flex align-center">Phone:<span class="c-black"><?php echo $row['phone'];?></span></p>
              <span class="c-gray fs-15 mt-5 d-flex align-center">Address:<span class="c-black"><?php echo $row['address'];?></span></span>
            </div>
          </div>
        </div>

      </div>
      <div class="d-flex wrap">
        <div class="skills bg-white p-20 rad-6 mt-20 ml-20 mr-20">
          <h2>Faculties</h2>
          <?php
          $faculty_text = "";
          foreach ($selected_faculties as $faculty) {
            if (!strcmp($faculty,"BBA")){
              $faculty_text = "Bachelors in Business Administration(BBA)";
            }
            if (!strcmp($faculty,"BCA")){
              $faculty_text = "Bachelors in Computer Application(BCA)";
            }
            if (!strcmp($faculty,"BPH")){
              $faculty_text = "Bachelors in Public Health(BPH)";
            }
            if (!strcmp($faculty,"BBS")){
              $faculty_text = "Bachelors in Business Studies(BBS)";
            }
            if (!strcmp($faculty,"Engineering")){
              $faculty_text = "Engineering";
            }
            if (!strcmp($faculty,"BALLB")){
              $faculty_text = "Bachelors of Arts Bachelors of Laws(BALLB)";
            }
            
            ?>
                      <div class="skill p-10 d-flex align-center bg-white">

            <span><?php echo $faculty_text;?></span>
          </div>
            
            <?php
          }
          $statusvalue = $row['status'];
          $dis = 'none';
          if ($row['status']){
            $dis = 'flex';
          }
          ?>
        </div>
        <div class="activities bg-white rad-6 mt-20 p-20 mr-20">
          <h2>Latest Achievements</h2>
          <p class="c-gray fs-14 mb-20">Latest Achievements of you</p>
          <div class="activity p-10 d-flex align-center f-width">
          </div>

          <div class="activity p-10 d-flex align-center f-width">
            <img src="images/activity-02.png" class="flex-center" alt="">
            <div>
              <div class="text between-flex c-black">
                <p>Activity</p>
                <!-- <p>08:50</p> -->
              </div>
              <div class="text between-flex c-gray mt-10">
                <p>Got The <?php echo $row['certification'];?></p>
                <!-- <p>Yesterday</p> -->
              </div>
            </div>
          </div>

          <div class="activity p-10 d-flex align-center f-width" style="display:<?php echo $dis;?>;">
            <img src="images/activity-03.png" class="flex-center" alt="">
            <div>
              <div class="text between-flex c-black">
                <p>Verified</p>
              </div>
              <div class="text between-flex c-gray mt-10">
                <p>You are verified by Gyan-Glide.</p>
              </div>
            </div>
          </div>
          <!-- 
                <div class="activity p-10 d-flex align-center f-width">
                    <img src="images/activity-01.png" class="flex-center" alt="">
                    <div>
                        <div class="text between-flex c-black">
                            <p>Store</p>
                            <p>18:10</p>
                        </div>
                        <div class="text between-flex c-gray mt-10">
                            <p>Bought The Typescript Course</p>
                            <p>Yesterday</p>
                        </div>
                    </div>
                </div> -->
        </div>
      </div>
    </div>
  </div>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>