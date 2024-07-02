<?php

$clz_id = $_SESSION['clz_id'];

  ///image upload
if (isset($_POST['upload_main'])) {

  $image = $_FILES['main_img'];

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
    $allowed_exs = array('jpg', 'jpeg', 'png', 'jiff');


    /** 
        check if the the image extension 
        is present in $allowed_exs array
     **/



    if (in_array($img_ex_lc, $allowed_exs)) {
      /** 
             renaming the image name with std id
       **/
      $new_img_name = uniqid('IMG-', true) . '.' . $img_ex_lc;



      $sql = "SELECT main_img FROM college_main_images WHERE clz_id= $clz_id";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          // $college_image = mysqli_fetch_array($result);
      } else {
        $first_main_image = true;
      }

      # crating upload path on root directory
      $img_upload_path = '../image_upload/clz_main/' . $new_img_name;

      # inserting imge name into database
      if ($first_main_image) {
        $sql  = "INSERT INTO college_main_images (`clz_id`,`main_img`) VALUES ($clz_id, '$new_img_name')";
        if ($conn->query($sql)) {
          # move uploaded image to 'uploads' folder
          move_uploaded_file($tmp_name, $img_upload_path);
        } else {

          header("Location: settings.php?error=$em");
        }
      } else {

        $sql  = "UPDATE `college_main_images` SET `main_img`='$new_img_name' WHERE clz_id = $clz_id";
        if ($conn->query($sql)) {
          # move uploaded image to 'uploads' folder
          move_uploaded_file($tmp_name, $img_upload_path);
        }

      }


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
  }
}

if (isset($_POST['upload_logo'])) {

  $image = $_FILES['logo'];

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
    $allowed_exs = array('jpg', 'jpeg', 'png', 'jiff');


    /** 
        check if the the image extension 
        is present in $allowed_exs array
     **/



    if (in_array($img_ex_lc, $allowed_exs)) {
      /** 
             renaming the image name with std id
       **/
      $new_img_name = uniqid('IMG-', true) . '.' . $img_ex_lc;

      $sql = "SELECT logo FROM college_main_images WHERE clz_id= $clz_id";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // $college_image = mysqli_fetch_array($result);
      } else {
        $first_logo = true;
      }

      # crating upload path on root directory
      $img_upload_path = '../image_upload/clz_logo/' . $new_img_name;

      # inserting imge name into database
      if ($first_logo) {
        $sql  = "INSERT INTO college_main_images (`clz_id`,`logo`) VALUES ($clz_id, '$new_img_name')";
        if ($conn->query($sql)) {
          # move uploaded image to 'uploads' folder
          move_uploaded_file($tmp_name, $img_upload_path);
        } else {

          header("Location: settings.php?error=$em");
        }
      } else {

        $sql  = "UPDATE `college_main_images` SET `logo`='$new_img_name' WHERE clz_id = $clz_id";
        if ($conn->query($sql)) {
          # move uploaded image to 'uploads' folder
          move_uploaded_file($tmp_name, $img_upload_path);
        }

      }


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
  }
}

