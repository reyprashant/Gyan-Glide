<?php

require '../connectionSetup.php';
session_start();

$sql = "SELECT * FROM college_info";
$result = $conn->query($sql);
$colleges_row = mysqli_fetch_assoc($result);

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
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Rubik:wght@300;400;600;900&family=Work+Sans:wght@300;400;500;600;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <title>courses</title>
    <style>

    </style>
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

            <h1 class="p-relative mt-10">Courses</h1>
            <div class="container grid">

                <div class="course rad-6 bg-white p-relative">
                    <img src="images/course-01.jpg" alt="" class="f-width">
                    <img src="images/team-01.png" alt="" class="p-absolute">
                    <div class="text p-20 pb-30">
                        <!-- <h3 class="mb-10">webbb</h3> -->
                        <!-- <p class="c-gray fs-14">Master The Art Of Web Designing And Creating Web Design Architecture</p> -->
                        <div class="card-body">
                            <h3><?php echo $colleges_row['name'];?></h3>
                        </div>
                        <div class="card-footer">
                            <div class="card-footer-item">
                                <span><?php echo $colleges_row['address'];?></span>
                            </div>
                            <div class="card-footer-item">
                                <span><?php echo $colleges_row['certification'];?></span>
                            </div>
                            <div class="card-footer-item">
                                <span><?php echo $colleges_row['level'];?></span>
                                <span><?php echo $colleges_row['courses'];?></span>
                            </div>
                        </div>
                    </div>
                    <div class="info between-flex p-10 p-relative p-10">
                        <!-- <span class="c-gray">
                            960
                            <i class="fa-solid fa-user"></i>
                        </span> -->
                        <h5 class="p-5 bg-blue c-white rad-6">
                            <button id="openPopupBtn" class="p-5 bg-blue c-white rad-6">
                                College Info
                            </button>
                        </h5>


                        <div class="overlay" id="overlay" style="z-index: 1000;">

                        <div class="popup">
                            <button class="close-btn" id="closeBtn">&times;</button>
                            <div class="popup-content">
                                <div class="topbar">
                                    <div><i class="fa-solid fa-arrow-left"></i>&nbsp;&nbsp;
                                        <strong>Kaski Modernized Academy</strong>
                                    </div>
                                    <div><i class="fa-regular fa-heart"></i></div>
                                </div>
                                <div class="collegeimg">
                                    <!-- <img src="college1.jpg" alt="Kaski Modernized Academy" class="popup-image"> -->
                                    <div><img src="images.jpg" alt="logo" class="collegelogo"></div>

                                </div>
                                <div class="popup-text">
                                    <h1>Kaski Modernized Academy (★ 4.0 )</h1>
                                    <p><strong>Estb: 2058</strong></p>
                                    <p><strong>Private School</strong></p>
                                    <p><strong>ISO-Certified 2009</strong></p>
                                    <p><strong>Chauthe, Pokhara-14</strong></p>
                                    <hr>
                                    <p>Kaski Modernized Academy is an academically selective co-educational secondary
                                        boarding school
                                        located at Chauthe B.P. Marg, Pokhara-14, Nepal. It covers an area of 20
                                        ropanies of its own and
                                        5 huge attractive buildings. It provides quality education to around 200
                                        students from Nursery
                                        to Grade 12. KMA prides itself on the quality of its excellent academic
                                        programs, along with
                                        co-curricular activities covering a wide range of genres.</p>
                                    <p>Tracing back to its history, KMA was established in 2058 BS. At Shiva Chowk,
                                        Pokhara-10, with 90
                                        students and 9 teaching staff with the sacred motto "Learn through reality,
                                        attend in humanity."
                                        It was established by Mr. Ram Bahadur Mochi, the erstwhile Lecturer in English,
                                        P.N. Campus,
                                        Pokhara. Since its inception, Mr. Ram Bahadur Mochi has been the Principal and
                                        sole founder of
                                        KMA.</p>
                                    <hr>
                                    <h2>Our faculties:</h2>
                                    <ul>
                                        <li>Science</li>
                                        <li>Management</li>
                                        <li>Hotel Management</li>
                                    </ul>
                                    <h2>Our facilities:</h2>
                                    <ul>
                                        <li>E-Library</li>
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
                                                <div class="swiper-slide">
                                                    <div class="img_box">
                                                        <img src="amarsingh.jpeg" class="custom-image">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="img_box">
                                                        <img src="kma.jpeg" class="custom-image">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="img_box">
                                                        <img src="sos.jpeg" class="custom-image">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="img_box">
                                                        <img src="motherland.jpeg" class="custom-image">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="img_box">
                                                        <img src="samata.jpeg" class="custom-image">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="img_box">
                                                        <img src="sos.jpeg" class="custom-image">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="img_box">
                                                        <img src="Collge Fit3.jpg" class="custom-image">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="img_box">
                                                        <img src="college.jpg" class="custom-image">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- for arrow-->
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                            <!--for pagination-->
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
                            </div>
                            </section>




                            <hr>
                            <hr>
                            <div class="popup_footer">
                                <h2 style="text-align: left;">Contact Info:</h2>
                                <ul style="list-style: none; line-height: 30px; color: rgb(78, 105, 78);">
                                    <li><i class="fa-solid fa-phone"></i>&nbsp; &nbsp; &nbsp; 061-521165</li>
                                    <li><i class="fa-solid fa-envelope"></i>&nbsp; &nbsp; &nbsp;
                                        kaskimodernizedacademy@gmail.com</li>
                                    <li><i class="fa-solid fa-globe"></i>&nbsp; &nbsp; &nbsp;
                                        www.kaskimodernizedacademy.com</li>
                                </ul>
                            </div>
                        </div>
                        </div>
                        <!-- <span class="c-gray">$ 897</span> -->
                    </div>
                </div>


                <div class="course rad-6 bg-white p-relative">
                    <img src="images/course-01.jpg" alt="" class="f-width">
                    <img src="images/team-01.png" alt="" class="p-absolute">
                    <div class="text p-20 pb-30">
                        <h3 class="mb-10">Web Technology</h3>
                        <p class="c-gray fs-14">Master The Art Of Web Designing And Creating Web Design Architecture</p>
                    </div>
                    <div class="info between-flex p-10 p-relative p-10">
                        <!-- <span class="c-gray">
                            960
                            <i class="fa-solid fa-user"></i>
                        </span> -->
                        <a href="">
                            <h5 class="p-5 bg-blue c-white rad-6">Course Info</h5>
                        </a>
                        <!-- <span class="c-gray">$ 897</span> -->
                    </div>
                </div>

                <div class="course rad-6 bg-white p-relative">
                    <img src="images/course-01.jpg" alt="" class="f-width">
                    <img src="images/team-01.png" alt="" class="p-absolute">
                    <div class="text p-20 pb-30">
                        <h3 class="mb-10">Web Technology</h3>
                        <p class="c-gray fs-14">Master The Art Of Web Designing And Creating Web Design Architecture</p>
                    </div>
                    <div class="info between-flex p-10 p-relative p-10">
                        <!-- <span class="c-gray">
                            960
                            <i class="fa-solid fa-user"></i>
                        </span> -->
                        <a href="">
                            <h5 class="p-5 bg-blue c-white rad-6">Course Info</h5>
                        </a>
                        <!-- <span class="c-gray">$ 897</span> -->
                    </div>
                </div>


            </div>
        </div>
    </div>

    <script>
    document.getElementById("openPopupBtn").addEventListener("click", function() {
        document.getElementById("overlay").style.display = "flex";
    });

    document.getElementById("closeBtn").addEventListener("click", function() {
        document.getElementById("overlay").style.display = "none";
    });
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
</body>

</html>