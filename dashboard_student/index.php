<?php
@require_once '../connectionSetup.php';
session_start();
if (!isset($_SESSION['std_id'])) {
  header('location:../index.php');
  die();
}

$std_id = $_SESSION['std_id'];
$sql = "SELECT * FROM students WHERE std_id= $std_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = mysqli_fetch_array($result);

if (empty($row['prev_school'])){
  $prev_school = "N/A";
}else{
  $prev_school = $row['prev_school'];
}

if (empty($row['grade'])){
  $grade = "N/A";
}else{
  $grade = $row['grade'];
}




} else {
}

$sql = "SELECT * FROM student_images WHERE std_id= $std_id"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $student_image = mysqli_fetch_array($result);
} else{
  $new_student = true;
}


if (isset($_POST['upload'])) {

  $image = $_FILES['image'];

  # get the image info and store them in var
  
  $image_name = $image['name'];
  $tmp_name   = $image['tmp_name'];
  $error      = $image['error'];

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
				 renaming the image name with std id
       **/
      $new_img_name = $std_id . '.' . $img_ex_lc;

      # crating upload path on root directory
      $img_upload_path = '../image_upload/std_uploads/' . $new_img_name;

      # inserting imge name into database
      if($new_student){
        $sql  = "INSERT INTO student_images VALUES ($std_id, '$new_img_name')";
        if($conn->query($sql)){
              # move uploaded image to 'uploads' folder
          move_uploaded_file($tmp_name, $img_upload_path);
        }else{

          header("Location: index.php?error=$em");
  
        }
      }
       else{

        $sql  = "UPDATE `student_images` SET `img_name`='$new_img_name' WHERE std_id = $std_id";
        if ($conn->query($sql)) {
          # move uploaded image to 'uploads' folder
          move_uploaded_file($tmp_name, $img_upload_path);
        }
        
      }


      # redirect to 'index.php'
      header("Location: index.php");
    } else {
      # error message
      $em = "You can't upload files of this type";

      /*
		    	redirect to 'index.php' and 
		    	passing the error message
		        */

      header("Location: index.php?error=$em");
    }
  }
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
<style>
      @media screen and (max-width: 570px) {
        .imginput {
            position: relative;
            left: 0px;
            top : 0px;
        }
    }
</style>

</head>

<body style="background-color: rgb(173, 255, 255);">
  <div class="dashboard page d-flex">
    <?php
    include_once 'dashboard_navbar.php';
    ?>


    <div class="content d-flex  column">
      <?php
      include_once 'dashboard_header.php';
      

      $sql20 = "SELECT * FROM `student_images` where `std_id` = '$std_id'";
      $std_image = $conn->query($sql20);
      if ($std_image->num_rows > 0) {
          $main_img = mysqli_fetch_assoc($std_image);
          $std_img = $main_img['img_name'];
          } else {
            $std_img = 'default.jpg';
          }
      ?>

      <h1 class="p-relative mt-10">Dashboard</h1>
      <div class="container"> <!-- <div class="container grid "> -->

        <div class="welcome txt-c-mobile bg-white p-relative rad-10">
          <div class="title  between-flex p-20 bg-gray p-relative " style="background-color: transparent;">
            <div class="text">
              <h2>welcome</h2>
              <p class="c-gray"><span id="loggedUsername"><?php echo $row['name']; ?></span></p>
            </div>
            <img src="images/welcome.png" alt="">
            <img src="../image_upload/std_uploads/<?php echo $std_img?>" alt="" class="p-absolute">
          </div>
          <div class="data between-flex p-20 mb-20">
            <div class="name">
              <p><?php echo $row['bio']; ?></p>
              <!-- <span class="c-gray">ISO Certified College</span> -->
            </div>

          </div>
          <!-- <a href="settings.php" class="c-white p-20 bg-blue rad-6 fs-14 d-block fit-width">profile</a> -->
          <a href="settings.php" class="c-white p-20 bg-blue rad-6 fs-14 d-block fit-width" style="background-color: teal; color: white; border-radius: 6px; font-size: 14px; display: block; width: fit-content; text-decoration: none;">profile</a>
        </div>
        <div class="discription p-20 bg-white rad-6 mt-20 ml-20 mr-20 d-flex wrap">

          <div class="user flex-center column">


            <img src="../image_upload/std_uploads/<?php echo $std_img?>" alt="logo of college" style="max-width: 25%; border-radius: 100px">
            <div class="popup" style=" width: 400px; background: white; position: relative; top: 50%; left: 50%; ">
            </div>
            <!-- <h3 class="mt-10"><?php echo $row['name']; ?></h3> -->

            <div>
              <form method="post" action="index.php" enctype="multipart/form-data">
                <?php
                // if (isset($_GET['error'])) {
                // 	echo "<p class='error'>";
                // 	    echo htmlspecialchars($_GET['error']);
                // 	echo "</p>";
                // }
                ?>
                <input class="imginput" style="position: relative; left: 60px;" type="file" name="image" id="">
                <button class= "imginput1" style="position: relative; top: 33px; right: 177px;" type="submit" name="upload">Upload</button>
              </form>
            </div>
            <div class="progress p-relative mt-10"><span class="rad-6" style="width:70%;"></span></div>

          </div>


          <div class="boxes bg-white">
            <div class="box p-20">
              <h4 class="c-gray mb-10 ">General Information</h4>
              <div class="text grid">
                <p class="c-gray fs-15 mt-5 d-flex align-center">Full Name:<span class="c-black"><?php echo $row['name']; ?></span></p>
                <p class="c-gray fs-15 mt-5 d-flex align-center">City:<span class="c-black">Pokhara</span></p>
                <label class="d-flex align-center">
                  <input type="checkbox" class="checkbox-button p-relative" checked>
                </label>
              </div>
            </div>

            <div class="box p-20">
              <h4 class="c-gray mb-10 ">Other Information</h4>
              <div class="text grid">
                <p class="c-gray fs-15 mt-5 d-flex align-center">Recently Graduated from:<span class="c-black"><?php echo $prev_school; ?></span></p>
                <p class="c-gray fs-15 mt-5 d-flex align-center">Grade:<span class="c-black"><?php echo $grade; ?></span></p>

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

  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

</body>

</html>