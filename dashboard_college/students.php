<?php
require_once '../connectionSetup.php';
session_start();
if (!isset($_SESSION['clz_id'])) {
   header('location:../index.php');
   die();
}
$clz_id = $_SESSION['clz_id'];
$sql = "SELECT std_id FROM admission where clz_id = $clz_id";
$result22 = $conn->query($sql);
$student_ids = [];
if ($result22->num_rows > 0) {
   while ($rowww = $result22->fetch_array()) {
      array_push($student_ids, $rowww['std_id']);
   }
   $std_ids = implode(', ', $student_ids);
   $sql = "SELECT * from students where `std_id` IN (" . $std_ids . ")";
} else {
   //no admission applied
}

$result = $conn->query($sql);

if (isset($_GET['search'])) {
   $filtervalues = $_GET['search'];
   $sql12 = "SELECT * FROM students WHERE CONCAT(name,email,phone,address) LIKE '%$filtervalues%' and std_id IN (" . $std_ids . ")";
   $student1 = $conn->query($sql12);

   if ($student1->num_rows > 0) {
      $result = $student1;
   }

}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   if (isset($_POST['delete'])) {
      $std_id = $_POST['std_id'];
      $sql1 = "DELETE FROM `admission` WHERE std_id = $std_id and clz_id = $clz_id";

      if ($conn->query($sql1) === TRUE) { // update data into college_info table
         $updated_message = "Admission Deleted Successfully";
         header("Location: students.php");
      } else {

         echo "Error: " . $sql . "<br>" . $conn->error;
      }
   }
   if (isset($_POST['accept'])) {
      $std_id = $_POST['std_id'];
      $sql1 = "UPDATE `admission` SET `status` = NOT status WHERE std_id = $std_id and clz_id = $clz_id";

      if ($conn->query($sql1) === TRUE) { // update data into college_info table
         $status_message = "Admission Status Updated Successfully";
         header("Location: students.php");
      } else {

         echo "Error: " . $sql . "<br>" . $conn->error;
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
   <link rel="stylesheet" href="css/normalize.css">
   <link rel="stylesheet" href="css/index.css">
   <link rel="stylesheet" href="css/table_style.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Rubik:wght@300;400;600;900&family=Work+Sans:wght@300;400;500;600;800&display=swap" rel="stylesheet">
   <title>Students</title>

   <style>
      .overlay {
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: rgba(0, 0, 0, 0.5);
         backdrop-filter: blur(5px);
         display: none;
         justify-content: center;
         align-items: center;
      }

      .openPopupBtn {
         padding: 10px 20px;
         font-size: 1rem;
         cursor: pointer;
         border: none;
         background-color: #007bff;
         color: white;
         border-radius: 5px;
      }

      .popup {
         background: white;
         width: 50%;
         height: 80%;
         border-radius: 10px;
         overflow-y: auto;
         position: relative;
         padding: 20px;
         box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
         display: flex;
         flex-direction: column;
         align-items: center;
      }

      .topbar {
         border-bottom: 1px solid black;
         margin-top: 20px;
         display: flex;
         align-items: center;
         justify-content: space-between;
         padding: 10px;
         margin-bottom: 5px;
      }

      .collegeimg {
         background-image: url("college1.jpg");
         height: 300px;
         object-fit: cover;
         display: flex;
         align-items: first baseline;

      }

      .collegelogo {
         height: 80px;
         width: 80px;
         border-radius: 10px;
         background-image: url("images.jpg");
         border: 1px solid black;
         box-shadow: 0px 10px 0px 0px rgba(132, 132, 132, 0.1);
      }

      .popup h1 {
         margin-top: 0;
         text-align: left;
      }

      .popup-content {
         text-align: left;
         max-width: 90%;
      }

      .popup-image {
         width: 100%;
         max-height: 300px;
         object-fit: cover;
         border-radius: 10px;
      }

      .popup-text p,
      .popup-text ul {
         text-align: left;
         margin: 10px 0;
         text-align: justify;
      }

      .popup-text ul {
         padding-left: 50px;
         list-style: disc;
      }

      .close-btn {
         position: absolute;
         top: 10px;
         right: 10px;
         background: none;
         border: none;
         font-size: 1.5rem;
         cursor: pointer;
         color: #000;
      }



      .image img {
         max-width: 100%;
         border-radius: 10px;
         margin-left: 100px;
      }

      .section {
         max-width: 800px;
         margin: 50px auto;
         text-align: left;
      }

      .section h2 {
         font-size: 2em;
         font-weight: bold;
         margin-bottom: 20px;
      }

      .section p {
         font-size: 1.2em;
         color: #4a5568;
      }



      .img_box img {
         max-width: 100%;
         height: 400px;
         border-radius: 20px;
      }

      .slider_container .container {
         padding: 0 15px;
         width: 1100px;
         margin: 0 auto;
      }

      .card_slider {
         padding: 50px 0;

      }

      .custom-image {
         width: 350px;
         height: 250px;
      }
   </style>

</head>

<body style="background-color: rgb(173, 255, 255);">

   <div class="courses page d-flex">
      <?php
      require_once 'dashboard_navbar.php';
      ?>

      <div class="content d-flex  column">
         <?php
         require_once 'dashboard_header.php';
         ?>
         <h1 class="p-relative mt-10">Students Applied for Admission</h1>

         <form action="" method="GET">

<div style="display: flex; align-items: center; justify-content: center; margin: 20px 0; position: absolute; top: 35px; right: 20px;">
   <input name="search" type="text" value="<?php if (isset($_GET['search'])) {
                                                echo $_GET['search'];
                                             } ?>" placeholder="Search..." style="width: 300px; padding: 10px; border: 1px solid #ccc; border-radius: 4px; outline: none;">
   <button type="submit" style="padding: 10px 20px; margin-left: 10px; border: none; background-color: teal; color: white; border-radius: 4px; cursor: pointer; outline: none; ">
      Search
   </button>
</div>
</form>

         <div class="header_fixed">


            <table>
               <thead>

                  <tr>
                     <th>S No.</th>
                     <th>Image</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Phone</th>
                     <th>Grade</th>
                     <th>Status</th>
                     <th colspan="3">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     if (isset($_GET['search'])) {
                        $filtervalues = $_GET['search'];
                        $sql12 = "SELECT * FROM students WHERE CONCAT(name,email,phone,address) LIKE '%$filtervalues%' ";

                        $student1 = $conn->query($sql12);

                        if ($student1->num_rows > 0) {
                           $result = $student1;
                        }

                     }

                  $i = 1;
                  while ($row = $result->fetch_assoc()) {

                     $std_id = $row['std_id'];
                     $sql = "SELECT status FROM admission where std_id = $std_id and clz_id = $clz_id";
                     $result22 = $conn->query($sql);
                     $admission_status = $result22->fetch_assoc();
                     $std_status = $admission_status['status'];    //0 not accepted 1 accepted
                     if ($std_status) {
                        $status_text = "Accepted";
                        $action_button_text = "Reject";
                     } else {
                        $status_text = "Not Accepted";
                        $action_button_text = "Accept";
                     }

                     $sql = "SELECT * FROM student_images WHERE std_id= $std_id";
                     $image_data = $conn->query($sql);
                     if ($image_data->num_rows > 0) {
                        $image_array = mysqli_fetch_array($image_data);
                        $image = $image_array['img_name'];
                     } else {
                        $image = 'default.jpg';
                     }

                  ?>
                     <div class="overlay" id="overlay<?php echo $std_id ?>" style="z-index: 1000;">
                        <div class="popup">
                           <button class="close-btn" id="closeBtn<?php echo $std_id ?>">&times;</button>
                           <div class="popup-content">
                              <div class="general-info bg-white p-20 rad-6 ">
                                 <h2 class="mb-20">General Info</h2>
                                 <p class=" c-gray">General Information About Your Account</p>

                                    <div style="height:200px; width: 200px; display:grid; position:relative; left:20%; overflow:hidden;">
                                       <img style="height:100%; width:100%; object-fit:contain; align-self:center;" src="../image_upload/std_uploads/<?php echo $image; ?>" />
                                    </div>

                                    <!-- sending student id to backend -->
                                    <input type="hidden" name="std_id" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $std_id; ?>">

                                    <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">Name: <?php echo $row['name']; ?></label>

                                    <label for="" class="fs-14 c-gray mb-10 d-block mt-15 ">Email: <?php echo $row['email']; ?></label>

                                    <label for="" class="fs-14 c-gray mb-10 d-block mt-15">Phone: <?php echo $row['phone']; ?></label>

                                    <label for="" class="fs-14 c-gray mb-10 d-block mt-15">Address: <?php echo $row['address']; ?></label>

                                    <label for="" class="fs-14 c-gray mb-10 d-block mt-15">Recently Graduated From: <?php echo $row['prev_school']; ?></label>

                                    <label for="" class="fs-14 c-gray mb-10 d-block mt-15">Grade: <?php echo $row['grade']; ?></label>

                                    <label for="" class="fs-14 c-gray mb-10 d-block mt-15">LinkedIn: <?php echo $row['linkedIn']; ?></label>

                                    <label for="" class="fs-14 c-gray mb-10 d-block mt-15">Github: <?php echo $row['github']; ?></label>

                                 </div>

                           </div>
                        </div>
                     </div>
                     <tr>
                        <td><?php echo $i; ?></td>
                        <td><img src="../image_upload/std_uploads/<?php echo $image; ?>" /></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['grade']; ?></td>
                        <td><?php echo $status_text ?></td>
                        <td><button id="openPopupBtn<?php echo $std_id ?>">View</button></td>
                        <td>
                           <form action="students.php" method="post">
                              <input type="hidden" name="std_id" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $std_id; ?>">
                              <button id="accept<?php echo $std_id ?>" name="accept"><?php echo $action_button_text; ?></button>
                           </form>
                        </td>
                        <td>
                           <form action="students.php" method="post">
                              <input type="hidden" name="std_id" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $std_id; ?>">
                              <button id="delete<?php echo $std_id ?>" name="delete">Delete</button>
                           </form>
                        </td>
                     </tr>

                  <?php
                     $i++;
                  }

                  ?>
               </tbody>
            </table>
         </div>

      </div>
   </div>


   <script>
      for (let i = 6; i < 100; i++) {
         document.getElementById("openPopupBtn" + i).addEventListener("click", function() {
            document.getElementById("overlay" + i).style.display = "flex";
         });
         document.getElementById("closeBtn" + i).addEventListener("click", function() {
            document.getElementById("overlay" + i).style.display = "none";
         });

      }
   </script>

   <script>
      if (window.history.replaceState) {
         window.history.replaceState(null, null, window.location.href);
      }
   </script>
</body>

</html>