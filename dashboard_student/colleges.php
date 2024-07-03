<?php

require '../connectionSetup.php';
session_start();
if (!isset($_SESSION['std_id'])) {
    header('location:../loginpage.php');
    die();
}

$sql = "SELECT * FROM college_info where Status = 1";
$college = $conn->query($sql);
$heart_shape = "";
$std_id = $_SESSION['std_id'];

if (isset($_POST['apply'])) {
    $clz_id = $_POST['clz_id'];
    $first_apply = true;
    $sql1 = "SELECT `std_id`,`clz_id` FROM `admission` where `std_id` = '$std_id' and `clz_id` = '$clz_id'";
    $resultt = $conn->query($sql1);
    if ($resultt->num_rows > 0) {
        $first_apply = false;   //old password is correct
    } else {
        //   $passwordUpdateMessage = "Invalid old password";
    }

    if ($first_apply) {


        $sql22 = "INSERT INTO `admission` (`std_id`,`clz_id`) VALUES ('$std_id','$clz_id')";

        if ($conn->query($sql22) === TRUE) {  // apply successful

            header('location:colleges.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_review'])) {

        $rating = $_POST['rating'];
        $clz_id = $_POST['clz_id'];
        $new_review = $_POST['new_review'];

        // $message = $_POST['review_msg'];
        if ($new_review) {
            $sql = "INSERT INTO `college_rating`(`std_id`, `clz_id`, `rating`) VALUES ($std_id,'$clz_id','$rating')";
        } else {
            $sql = "UPDATE `college_rating` SET `rating`='$rating' WHERE std_id = $std_id and clz_id = $clz_id";
        }

        if ($conn->query($sql)) {
            $review_status = "Rating recorded Successfully";
            echo "<script>alert('{$review_status}');</script>";
            header("Location: colleges.php");
        } else {
            $review_status = "Failed to update rating. Please try again.";
            echo "<script>alert('{$review_status}');</script>";
            header("Location: colleges.php?error=$em");
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
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Rubik:wght@300;400;600;900&family=Work+Sans:wght@300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <title>Colleges</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<style>
    .f-width {
        height: 60%;
    }

    @media screen and (max-width: 888px) {
        .f-width {
            height: 60%;
        }
    }

    @media screen and (max-width: 500px) {
        .f-width {
            height: 50%;
        }
    }

    @media screen and (max-width: 375px) {
        .f-width {
            width: 35%;
        }
    }

    @media screen and (max-width: 960px) {
        .rating_stars {
            position: relative;
            left:0px;
            top: 0px;
        }
    }
</style>

<body style="background-color: rgb(173, 255, 255);">

    <div class="courses page d-flex">
        <?php
        require_once 'dashboard_navbar.php';
        ?>

        <div class="content d-flex  column">
            <?php
            require_once 'dashboard_header.php';
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
            <div class="container grid">
                <?php

                //search code

                if (isset($_GET['search'])) {
                    $filtervalues = $_GET['search'];
                    $sql12 = "SELECT * FROM college_info WHERE CONCAT(name,address,college_type,website,faculties) LIKE '%$filtervalues%' ";

                    $college1 = $conn->query($sql12);

                    if ($college1->num_rows > 0) {
                        $college = $college1;
                    }
                }

                while ($colleges_row = mysqli_fetch_assoc($college)) {
                    $clz_id = $colleges_row['clz_id'];
                    $sql20 = "SELECT * FROM `college_main_images` where `clz_id` = '$clz_id'";
                    $clz_images = $conn->query($sql20);
                    if ($clz_images->num_rows > 0) {

                        $clz_main_img = mysqli_fetch_assoc($clz_images);
                        $clz_logo = $clz_main_img['logo'];
                        // echo "<script>alert('{$clz_logo}')</script>";
                        $clz_img = $clz_main_img['main_img'];
                    } else {
                        $clz_logo = 'default.jpg';
                        $clz_img = 'default.jpg';
                    }

                    # fetching images
                    $sql3  = "SELECT * FROM `college_images` where `clz_id` = $clz_id ";
                    $image_result = $conn->query($sql3);

                    if ($image_result->num_rows > 0) {
                        $images_ambience = true;
                    } else {
                        $images_ambience = false;
                    }



                    $stmt = $conn->prepare($sql3);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $images = $result->fetch_all(MYSQLI_ASSOC);



                    $liked_by = $colleges_row['liked_by'];
                    $likeOrLikes = "";
                    if ($liked_by < 2) {
                        $likeOrLikes = "like";
                    } else {
                        $likeOrLikes = "likes";
                    }


                    $sql1 = "SELECT `std_id`,`clz_id` FROM `liked_colleges` where `std_id` = '$std_id' and `clz_id` = '$clz_id'";
                    $liked_result = $conn->query($sql1);
                    if ($liked_result->num_rows == 0) {
                        $heart_shape = "regular";
                    } else if ($liked_result->num_rows == 1) {
                        $heart_shape = "solid";
                    }

                    $sql1 = "SELECT `std_id`,`clz_id` FROM `admission` where `std_id` = '$std_id' and `clz_id` = '$clz_id'";
                    $apply_result = $conn->query($sql1);
                    if ($apply_result->num_rows == 0) {
                        $apply_message = "Apply for this College";
                        $disabled = "";
                    } else if ($apply_result->num_rows == 1) {
                        $apply_message = "Applied";
                        $disabled = "disabled";
                    }

                ?>
                    <div class="course rad-6 bg-white p-relative" style="padding:7px;">
                        <button? ?>
                            <img src="../image_upload/clz_main/<?php echo $clz_img ?>" alt="image" class="f-width" style="height:65%">
                            <img src="../image_upload/clz_logo/<?php echo $clz_logo ?>" alt="logo" class="p-absolute">

                            <div class="heart" id="<?php echo $colleges_row['clz_id']; ?>">
                                <i class="fa-<?php echo $heart_shape; ?> fa-heart" onclick="replaceClass(this)"></i>

                            </div>



                            <div class="text p-20 pb-30">
                                <div class="card-body">
                                    <h3><?php echo $colleges_row['name']; ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="card-footer-item">
                                        <span><?php echo $colleges_row['address']; ?></span>
                                        <!-- <span><?php echo $colleges_row['level']; ?></span> -->
                                        <div>

                                            <?php
                                            $faculties = (explode(", ", $colleges_row['faculties']));
                                            if (sizeof($faculties) == 0) {
                                                echo "<p>N/A</p>";
                                                echo "<p>N/A</p>";
                                                echo "<p>N/A</p>";
                                            } else {
                                                // foreach ($faculties as $faculty) {
                                                    $fac = $colleges_row['faculties'];
                                                    echo "<span>$fac; </span>";
                                                // }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="card-footer-item">
                                        <span><?php echo $colleges_row['certification']; ?></span>
                                    </div>
                                    <div class="card-footer-item">


                                    </div>
                                </div>
                            </div>
                            <div class="info between-flex p-10 p-relative p-10">
                                <h5 class="p-5  c-white rad-6">
                                    <!-- style="position: relative; bottom: 5px;" -->
                                    <button id="openPopupBtn<?php echo $clz_id ?>" class="openPopupBtn p-5 bg-blue c-white rad-6" style="background-color: teal; color: white; border-radius: 6px; font-size: 14px; display: block; width: fit-content; text-decoration: none;">
                                        College Info
                                    </button>
                                </h5>
                                <div class="overlay" id="overlay<?php echo $clz_id ?>" style="z-index: 1000;">
                                    <?php
                                    $sql = "SELECT * from college_rating Where std_id = $std_id and clz_id = $clz_id";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        $row = mysqli_fetch_array($result);
                                        $prev_rating = $row['rating'];
                                        // $prev_message = $row['message'];
                                        $new_review = false;
                                    } else {
                                        $prev_rating = "2.5";
                                        // $prev_message = "";
                                        $new_review = true;
                                    }
                                    $total_rating = 0;
                                    $sql = "SELECT * from college_rating Where clz_id = $clz_id";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($rated = mysqli_fetch_assoc($result)) {
                                            $total_rating = $total_rating + $rated['rating'];
                                        }
                                    }


                                    ?>
                                    <div class="popup">
                                        <form action="colleges.php" method="post">

                                            <button class="close-btn" id="closeBtn<?php echo $clz_id ?>">&times;</button>
                                        </form>
                                        <div class="popup-content">
                                            <div class="topbar">
                                                <div><i class="fa-solid fa-arrow-left"></i>&nbsp;&nbsp;
                                                    <strong><?php echo $colleges_row['name']; ?></strong>
                                                </div>

                                                <div class="heart" id="<?php echo $colleges_row['clz_id']; ?>"><i class="fa-<?php echo $heart_shape; ?> fa-heart" onclick="replaceClass(this)"></i></div>

                                            </div>
                                            <div class="collegeimg" style="background-image: url('../image_upload/clz_main/<?php echo $clz_img ?>'); background-size:contain; align-self:center;">
                                                <!-- <img src="../image_upload/clz_logo/" alt="college_image" class="popup-image"> -->
                                                <div><img src="../image_upload/clz_logo/<?php echo $clz_logo ?>" alt="logo" class="collegelogo"></div>
                                                <!-- <div><img src="../image_upload/clz_logo/<?php echo $clz_img ?>" alt="main" class="collegelogo"></div> -->

                                            </div>
                                            <div class="popup-text">
                                                <form action="colleges.php" method="post">
                                                    <input type="hidden" name="clz_id" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $colleges_row['clz_id']; ?>">
                                                    <button type="submit" name="apply" <?php echo $disabled; ?>><span class="rad-6 c-white bg-blue p-5 msg" style="background-color: teal; color: white; border-radius: 6px; font-size: 14px; display: block; width: fit-content; text-decoration: none; position: absolute; right: 80px; ">
                                                            <?php echo $apply_message; ?>
                                                        </span>
                                                    </button>
                                                </form>

                                                <h1><?php echo $colleges_row['name']; ?> (★ <?php echo $total_rating; ?> )</h1>

                                                <form class = "rating_stars" style="position:absolute; bottom: 55px; right: 270px;" action="colleges.php" method="post">
                                                    <input type="hidden" name="clz_id" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $colleges_row['clz_id']; ?>">
                                                    <input type="hidden" name="new_review" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $new_review; ?>">
                                                    <div class="rateyo" id="rating" data-rateyo-rating="<?php echo $prev_rating; ?>" data-rateyo-num-stars="5" data-rateyo-score="3">
                                                    </div>
                                                    <!-- <span class='result'>0</span> -->
                                                    <input type="hidden" name="rating" value="<?php echo $prev_rating; ?>">
                                                    <input type="submit" name="add_review" value="Give Rating" style="background-color: teal; color: white; border-radius: 6px; font-size: 15px; display: block; text-decoration: none; margin-top: 10px; padding:6px">

                                                </form>
                                                







                                                <p><strong><?php echo $colleges_row['estd']; ?> A.D.</strong></p>
                                                <p><strong><?php echo $colleges_row['college_type']; ?> College</strong></p>
                                                <p><strong><?php echo $colleges_row['certification']; ?></strong></p>
                                                <p><strong><?php echo $colleges_row['address']; ?></strong></p>
                                                <hr>
                                                <p><?php echo $colleges_row['description']; ?></p>

                                                <!-- <p>Tracing back to its history, KMA was established in 2058 BS. At Shiva Chowk,
                                                Pokhara-10, with 90
                                                students and 9 teaching staff with the sacred motto "Learn through reality,
                                                attend in humanity."
                                                It was established by Mr. Ram Bahadur Mochi, the erstwhile Lecturer in English,
                                                P.N. Campus,
                                                Pokhara. Since its inception, Mr. Ram Bahadur Mochi has been the Principal and
                                                sole founder of
                                                KMA.</p> -->
                                                <hr>
                                                <h2>Our faculties:</h2>
                                                <ul>
                                                    <?php
                                                    $faculties = (explode(", ", $colleges_row['faculties']));
                                                    if (sizeof($faculties) == 0) {
                                                        echo "<li>N/A</li>";
                                                    } else {
                                                        foreach ($faculties as $faculty) {
                                                            echo "<li>$faculty</li>";
                                                        }
                                                    }

                                                    ?>
                                                </ul>
                                                <h2>Our facilities:</h2>
                                                <ul>
                                                    <?php
                                                    $facilities = (explode(", ", $colleges_row['facilities']));
                                                    if (sizeof($facilities) == 0) {
                                                        echo "<li>N/A</li>";
                                                    } else {
                                                        foreach ($facilities as $facility) {
                                                            echo "<li>$facility</li>";
                                                        }
                                                    }

                                                    ?>
                                                </ul>

                                            </div>

                                            <!-- <h2>Virtual Tour of College:</h2> -->


                                            <section class="slider_container">
                                                <h1 style="text-align: center; font-size: 30px;">Ambience of our college</h1>
                                                <div class="container">
                                                    <div class="swiper card_slider">
                                                        <div class="swiper-wrapper">
                                                            <?php
                                                            if (!$images_ambience) {
                                                                for ($i = 0; $i < 8; $i++) {
                                                                    # code...

                                                            ?>
                                                                    <div class="swiper-slide">
                                                                        <div class="img_box">
                                                                            <img src="../image_upload/uploads/default.png" class="custom-image" style="max-width:100%; height: 400px;border-radius: 20px; width: 350px;">
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="img_box">
                                                                            <img src="../image_upload/uploads/default.png" class="custom-image" style="max-width:100%; height: 400px;border-radius: 20px; width: 350px;">
                                                                        </div>
                                                                    </div>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                            <?php
                                                            while ($clz_imagess = mysqli_fetch_assoc($image_result)) { ?>
                                                                <div class="swiper-slide">
                                                                    <div class="img_box">
                                                                        <img src="../image_upload/uploads/<?php echo $clz_imagess['img_name'] ?>" class="custom-image" style="max-width:100%; height: 400px;border-radius: 20px; width: 350px;">
                                                                    </div>
                                                                </div>

                                                            <?php } ?>


                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        </section>




                                        <hr>
                                        <hr>
                                        <div class="popup_footer" style="margin-top: 20px;">
                                            <h2 style="text-align: left;">Contact Info:</h2>
                                            <ul style="list-style: none; line-height: 30px; color: rgb(78, 105, 78);">
                                                <li><i class="fa-solid fa-phone"></i>&nbsp; &nbsp; &nbsp; <?php echo $colleges_row['phone']; ?></li>
                                                <li><i class="fa-solid fa-envelope"></i>&nbsp; &nbsp; &nbsp;
                                                    <?php echo $colleges_row['email']; ?></li>
                                                <li><i class="fa-solid fa-globe"></i>&nbsp; &nbsp; &nbsp;
                                                    <?php echo $colleges_row['website']; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>



                            </div>
                    </div>
                <?php
                }
                ?>




            </div>
        </div>

    </div>

    <script>
        for (let i = 7; i < 1000; i++) {
            document.getElementById("openPopupBtn" + i).addEventListener("click", function() {
                document.getElementById("overlay" + i).style.display = "flex";
            });
            document.getElementById("closeBtn" + i).addEventListener("click", function() {
                document.getElementById("overlay" + i).style.display = "none";
            });

        }
    </script>


    <!--swiper js-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!--initialize swiper-->
    <script type="text/javascript">
        var swiper = new Swiper(".card_slider", {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            speed: 1000,
            // autoplay:{delay:2000, },-->//

            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            //iuiuhiu
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

        });
    </script>

    <script>
    </script>
    <script src="formValidation.js"></script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script>
        $(function() {
            $(".rateyo").rateYo().on("rateyo.change", function(e, data) {
                var rating = data.rating;
                $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
                $(this).parent().find('.result').text('rating :' + rating);
                $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
            });
        });
    </script>
</body>

</html>