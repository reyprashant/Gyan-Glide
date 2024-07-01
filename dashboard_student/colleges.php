<?php

require '../connectionSetup.php';
session_start();

$sql = "SELECT * FROM college_info";
$college = $conn->query($sql);
$collegeCount = 0;
$heart_shape = "";
$std_id = $_SESSION['std_id'];


# fetching images
$sql3  = "SELECT img_name FROM
	         college_images ORDER BY img_name DESC";

$stmt = $conn->prepare($sql3);
$stmt->execute();
$result = $stmt->get_result();
$images = $result->fetch_all(MYSQLI_ASSOC);

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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Rubik:wght@300;400;600;900&family=Work+Sans:wght@300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <title>Colleges</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <div class="courses page d-flex">
        <?php
        require_once 'dashboard_navbar.php';
        ?>

        <div class="content d-flex  column">
            <?php
            require_once 'dashboard_header.php';
            ?>
            <h1 class="p-relative mt-10">Colleges</h1>
            <div class="container grid">
                <?php
                while ($colleges_row = mysqli_fetch_assoc($college)) {
                    $collegeCount = $collegeCount + 1;
                    $clz_id = $colleges_row['clz_id'];
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

                ?>
                    <div class="course rad-6 bg-white p-relative">
                        <img src="../cardcollege/kma.jpeg" alt="" class="f-width">
                        <img src="images/team-01.png" alt="" class="p-absolute">

                        <div class="heart" id="<?php echo $colleges_row['clz_id']; ?>">
                            <i class="fa-<?php echo $heart_shape; ?> fa-heart" onclick="replaceClass(this)"></i>
                            <p id="total_likes"><?php echo $colleges_row['liked_by']; ?> <?php echo $likeOrLikes; ?></p>
                        </div>




                        <div class="text p-20 pb-30">
                            <div class="card-body">
                                <h3><?php echo $colleges_row['name'];
                                    echo $collegeCount; ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="card-footer-item">
                                    <span><?php echo $colleges_row['address']; ?></span>
                                </div>
                                <div class="card-footer-item">
                                    <span><?php echo $colleges_row['certification']; ?></span>
                                </div>
                                <div class="card-footer-item">
                                    <span><?php echo $colleges_row['level']; ?></span>
                                    <span><?php echo $colleges_row['faculties']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="info between-flex p-10 p-relative p-10">
                            <h5 class="p-5 bg-blue c-white rad-6">
                                <button id="openPopupBtn<?php echo $collegeCount ?>" class="openPopupBtn p-5 bg-blue c-white rad-6">
                                    College Info
                                </button>
                            </h5>
                            <div class="overlay" id="overlay<?php echo $collegeCount ?>" style="z-index: 1000;">

                                <div class="popup">
                                    <button class="close-btn" id="closeBtn<?php echo $collegeCount ?>">&times;</button>
                                    <div class="popup-content">
                                        <div class="topbar">
                                            <div><i class="fa-solid fa-arrow-left"></i>&nbsp;&nbsp;
                                                <strong><?php echo $colleges_row['name']; ?></strong>
                                            </div>
                                            <div><i class="fa-regular fa-heart"></i></div>
                                        </div>
                                        <div class="collegeimg">
                                            <!-- <img src="college1.jpg" alt="Kaski Modernized Academy" class="popup-image"> -->
                                            <div><img src="images.jpg" alt="logo" class="collegelogo"></div>

                                        </div>
                                        <div class="popup-text">
                                            <h1><?php echo $colleges_row['name']; ?> (★ 4.0 )</h1>
                                            <p><strong><?php echo $colleges_row['estd']; ?>  A.D.</strong></p>
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
                                                <li><?php echo $colleges_row['faculties']; ?></li>
                                                <!-- <li>Management</li>
                                                <li>Hotel Management</li> -->
                                            </ul>
                                            <h2>Our facilities:</h2>
                                            <ul>
                                                <li><?php echo $colleges_row['facilities']; ?></li>
                                                <li>Arts Classes</li>
                                                <li>Extra Curriculum Activities</li>
                                            </ul>
                                        </div>

                                        <h2>Virtual Tour of College:</h2>


                                        <section class="slider_container">
                                            <h1 style="text-align: center; font-size: 30px;">Ambience of our college</h1>
                                            <div class="container">
                                                <div class="swiper card_slider">
                                                    <div class="swiper-wrapper">

                                                                <?php foreach ($images as $image) { ?>
                                                                    <div class="swiper-slide">
                                                            <div class="img_box">
                                                                <img src="../image_upload/uploads/<?= $image['img_name'] ?>" class="custom-image" style="max-width:100%; height: 400px;border-radius: 20px; width: 350px;">
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
                                    <div class="popup_footer">
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
        for (let i = 1; i < 100; i++) {
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
</body>

</html>