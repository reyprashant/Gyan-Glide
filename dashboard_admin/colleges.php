<?php
@require_once '../connectionSetup.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:../index.php');
    die();
}

$sql = "SELECT * FROM college_info";
$result = $conn->query($sql);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['ban_college'])) {
        $clz_id = $_POST['clz_id'];

        $sql = "UPDATE `college_info` SET `status`= NOT status  WHERE `clz_id` = '$clz_id'";
        if ($conn->query($sql) === TRUE) { // update data into college_info table
            $updated_message = "Operation Completed Successfully";
            header("Location: colleges.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    if (isset($_POST['delete_college'])) {
        $clz_id = $_POST['clz_id'];
        $sql1 = "DELETE FROM `college_info` WHERE clz_id = $clz_id";
        $sql2 = "DELETE FROM `college_images` WHERE clz_id = $clz_id";
        $sql3 = "DELETE FROM `college_main_images` WHERE clz_id = $clz_id";
        $sql4 = "DELETE FROM `liked_colleges` WHERE clz_id = $clz_id";

        if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE && $conn->query($sql4) === TRUE) { // update data into college_info table
            $updated_message = "College Deleted Successfully";
            header("Location: colleges.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


    if (isset($_POST['update_college'])) {

        // update form data
        $clz_id = $_POST['clz_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $estd = $_POST['estd'];
        $certification = $_POST['certification'];
        $college_type = $_POST['college_type'];
        $website = $_POST['website'];
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
        $sql = "UPDATE `college_info` SET `name`='$name',`email`='$email',`phone`='$phone',
        `address`='$address',`estd`='$estd',
        `certification`='$certification',`college_type`='$college_type',`website`='$website',`faculties`='$faculties',`facilities`='$facilities' WHERE `clz_id` = $clz_id";

        if ($conn->query($sql) === TRUE) { // update data into college_info table
            $updated_message = "College Info Updated Successfully";
            header("Refresh:0");
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
    <title>Colleges</title>
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
            width: 80%;
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
            max-width: 50%;
        }

        @media screen and (max-width: 1120px) {
            .popup-content {
                max-width: 90%;
            }
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
        include_once 'dashboard_navbar.php';
        ?>
        <div class="content d-flex  column">
            <?php
            include_once 'dashboard_header.php';
            ?>
            <h1 class="p-relative mt-10">Colleges</h1>

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


                <?php if ($result->num_rows > 0) {
                ?>
                    <table>
                        <thead>

                            <tr>
                                <th>S No.</th>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Website</th>
                                <th>College Type</th>
                                <th>Status</th>
                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                     if (isset($_GET['search'])) {
                        $filtervalues = $_GET['search'];
                        $sql12 = "SELECT * FROM college_info WHERE CONCAT(name,email,phone,address,faculties) LIKE '%$filtervalues%' ";

                        $college1 = $conn->query($sql12);

                        if ($college1->num_rows > 0) {
                           $result = $college1;
                        }

                     }

                            $i = 1;
                            while ($row = $result->fetch_assoc()) {

                                $all_college_types = array('Profitable', 'Non-Profitable', 'Private', 'Government', 'NGO', 'INGO');
                                $selected_type = $row['college_type'];
                                $selected_faculties = (explode(", ", $row['faculties']));
                                $facilities = (explode(", ", $row['facilities']));

                                $clz_id = $row['clz_id'];

                                $std_status = $row['status'];  //0 banned 1 not banned
                                if ($std_status) {
                                    $status_text = "Accepted";
                                    $action_button_text = "Reject";
                                } else {
                                    $status_text = "Not Accepted";
                                    $action_button_text = "Accept";
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
                                <div class="overlay" id="overlay<?php echo $clz_id ?>" style="z-index: 1000;">
                                    <div class="popup">
                                        <button class="close-btn" id="closeBtn<?php echo $clz_id ?>">&times;</button>
                                        <div class="popup-content">
                                            <div class="general-info bg-white p-20 rad-6 ">
                                                <h2 class="mb-20">General Info</h2>
                                                <p class=" c-gray">General Information About This Account</p>


                                                <form action="colleges.php" method="post">
                                                    <div style="height:200px; width: 200px; display:grid; position:relative; left:20%; overflow:hidden;">
                                                        <img style="height:100%; width:100%; object-fit:contain; align-self:center;" src="../image_upload/clz_logo/<?php echo $college_logo; ?>" />
                                                    </div>
                                                    <!-- sending college id to backend -->
                                                    <input type="hidden" name="clz_id" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $clz_id; ?>">

                                                    <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">Name</label>
                                                    <input type="text" name="name" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['name']; ?>">

                                                    <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">Estd. Year</label>
                                                    <input type="text" name="estd" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['estd']; ?>">

                                                    <label for="" class="fs-14 c-gray mb-10 d-block mt-15 ">Email</label>
                                                    <input type="email" name="email" class="c-gray p-10 rad-6 f-width " value="<?php echo $row['email']; ?>">

                                                    <label for="" class="fs-14 c-gray mb-10 d-block mt-15">Phone</label>
                                                    <input type="text" name="phone" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['phone']; ?>">

                                                    <label for="" class="fs-14 c-gray mb-10 d-block mt-15">website</label>
                                                    <input type="text" name="website" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['website']; ?>">

                                                    <label for="" class="fs-14 c-gray mb-10 d-block mt-15">Address</label>
                                                    <input type="text" name="address" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['address']; ?>">

                                                    <label for="" class="fs-14 c-gray mb-10 d-block mt-15">Certification</label>
                                                    <input type="text" name="certification" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['certification']; ?>">

                                                    <label for="" class="fs-14 c-gray mb-10 d-block mt-15">College Type</label>
                                                    <select name="college_type">
                                                        <?php
                                                        foreach ($all_college_types as $value) {
                                                            if ($selected_type == $value) {
                                                                echo "<option selected='selected' value='$value'>$value</option>";
                                                            } else {
                                                                echo "<option value='$value'>$value</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>

                                                    <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">Faculties/ Courses you offer</label>

                                                    <input type="checkbox" id="faculty1" name="faculty[]" value="BBA" <?php if (in_array("BBA", $selected_faculties)) {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                                                    <label>BBA</label><br>
                                                    <input type="checkbox" id="faculty2" name="faculty[]" value="BCA" <?php if (in_array("BCA", $selected_faculties)) {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                                                    <label>BCA</label><br>
                                                    <input type="checkbox" id="faculty3" name="faculty[]" value="BPH" <?php if (in_array("BPH", $selected_faculties)) {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                                                    <label>BPH</label><br>
                                                    <input type="checkbox" id="faculty4" name="faculty[]" value="BBS" <?php if (in_array("BBS", $selected_faculties)) {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                                                    <label>BBS</label><br>
                                                    <input type="checkbox" id="faculty5" name="faculty[]" value="Engineering" <?php if (in_array("Engineering", $selected_faculties)) {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>>
                                                    <label>Engineering</label><br>
                                                    <input type="checkbox" id="faculty6" name="faculty[]" value="BALLB" <?php if (in_array("BALLB", $selected_faculties)) {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                                                    <label>BALLB</label><br>

                                                    <label class="fs-14 c-gray mb-10 d-block mt-20 ">Top Facilities in your College</label>
                                                    <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" name="facility[]" value="<?php if (isset($facilities[0])) {
                                                                                                                                            echo $facilities[0];
                                                                                                                                        } ?>">
                                                    <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" name="facility[]" value="<?php if (isset($facilities[1])) {
                                                                                                                                            echo $facilities[1];
                                                                                                                                        } ?>">
                                                    <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" name="facility[]" value="<?php if (isset($facilities[2])) {
                                                                                                                                            echo $facilities[2];
                                                                                                                                        } ?>">
                                                    <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" name="facility[]" value="<?php if (isset($facilities[3])) {
                                                                                                                                            echo $facilities[3];
                                                                                                                                        } ?>">
                                                    <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" name="facility[]" value="<?php if (isset($facilities[4])) {
                                                                                                                                            echo $facilities[4];
                                                                                                                                        } ?>">

                                                    <label for="" class="fs-14 c-gray mb-10 d-block mt-15">Facebook</label>
                                                    <input type="text" name="facebook" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['facebook']; ?>">

                                                    <label for="" class="fs-14 c-gray mb-10 d-block mt-15">Instagram</label>
                                                    <input type="text" name="instagram" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $row['instagram']; ?>">

                                                    <input type="submit" name="update_college" value="Update" class="rad-6 c-white bg-blue p-5" style="margin:15px; position: relative;left: 30%">

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><img src="../image_upload/clz_logo/<?php echo $college_logo; ?>" /></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['website']; ?></td>
                                    <td><?php echo $row['college_type']; ?></td>
                                    <td><?php echo $status_text ?></td>
                                    <td><button id="openPopupBtn<?php echo $clz_id ?>">View</button></td>
                                    <td>
                                        <form action="colleges.php" method="post">
                                            <input type="hidden" name="clz_id" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $clz_id; ?>">
                                            <button id="ban<?php echo $clz_id ?>" name="ban_college"><?php echo $action_button_text; ?></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="colleges.php" method="post">
                                            <input type="hidden" name="clz_id" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $action_button_text; ?>">
                                            <button id="delete<?php echo $clz_id ?>" name="delete_college">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                        <?php
                                $i++;
                            }
                        }
                        ?>
                        </tbody>
                    </table>
            </div>

        </div>
    </div>

    <script>
        for (let i = 7; i < 100; i++) {
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