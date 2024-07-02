<?php

$clz_id = $_SESSION['clz_id'];

$sql = "SELECT * FROM college_info WHERE clz_id= $clz_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = mysqli_fetch_array($result);
} else {
  $email = $row['email'];
  $sql1 = "UPDATE `students` SET `email`='$email' where `email` = '$prev_email'";
}

if (isset($_POST['changePassword'])) {
  // Password change form data
  $oldPassword = $_POST['oldPassword'];
  $password = $_POST['password'];

  // Check user credentials
  $passwordVerify = false;
  $sql = "SELECT * FROM login WHERE `email`='$prev_email' AND password='$oldPassword'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $passwordVerify = true;   //old password is correct
  } else {
    $passwordUpdateMessage = "Invalid old password";
  }

  if ($passwordVerify) {

    $sql = "UPDATE `login` SET `password`='$password' WHERE `email` = '$prev_email'";
    if ($conn->query($sql) === TRUE) {  // change password successfull
      $_SESSION['password_click'] = true;
      header('location: settings.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}



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
    $allowed_exs = array('jpg', 'jpeg', 'png');


    /** 
        check if the the image extension 
        is present in $allowed_exs array
     **/



    if (in_array($img_ex_lc, $allowed_exs)) {
      /** 
             renaming the image name with std id
       **/
      $new_img_name = $clz_id . '.' . $img_ex_lc;



      $sql = "SELECT * FROM college_main_images WHERE clz_id= $clz_id";
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
    $allowed_exs = array('jpg', 'jpeg', 'png');


    /** 
        check if the the image extension 
        is present in $allowed_exs array
     **/



    if (in_array($img_ex_lc, $allowed_exs)) {
      /** 
             renaming the image name with std id
       **/
      $new_img_name = $clz_id . '.' . $img_ex_lc;

      $sql = "SELECT * FROM college_main_images WHERE clz_id= $clz_id";
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

if (isset($_POST['update_college'])) {
    // $prev_email = $_POST['prev_email'];
  // update form data
  $name = $_POST['college_name'];
  // $email = $_POST['email'];
  // $phone = $_POST['phone'];
  $address = $_POST['address'];
  $estd = $_POST['estd'];
  $certification = $_POST['certification'];
  $college_type = $_POST['college_type'];
  $chk = "";
  if (isset($_POST['faculty'])) {
    $faculty = $_POST['faculty'];
    $faculties = implode(", ", $faculty);
  }
  if (isset($_POST['facility'])) {
    $facility = $_POST['facility'];
    $facilities = implode(", ", $facility);
  }

  //sql query for update
  $sql = "UPDATE `college_info` SET `name`='$name',
      `address`='$address',`estd`='$estd',
      `certification`='$certification',`college_type`='$college_type',`faculties`='$faculties',`facilities`='$facilities' WHERE `clz_id` = $clz_id";
       
  if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) { // update data into college_info table
    // $_SESSION['email'] = $email;
    $updated_message = "General Info Updated Successfully";
    echo '<script>alert("Inserted Successfully")</script>';
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

}
