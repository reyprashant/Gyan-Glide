<?php
session_start();
$_SESSION['loginerror'] = false;
$_SESSION['signuperror'] = false;
$_SESSION['signup'] = false;
$_SESSION['edit_click'] = false;
$_SESSION['password_click'] = false;
$_SESSION['social_click'] = false;

require './connectionSetup.php';
$sql = "SELECT * from students";
if ($result = mysqli_query($conn, $sql)) {
$ccount = mysqli_num_rows( $result );
 }
$sql = "SELECT * from college_info";
if ($result = mysqli_query($conn, $sql)) {
$scount = mysqli_num_rows( $result );
 }


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="navbar">
            <img src="images/logo.png" alt="logo" class="logo">
            <a href="loginpage.php" target="_self"><button class="getstarted">GET STARTED</button></a>
        </div>
        <div class="intro">
            <div class="divintro">
                <div style="margin-left: 50px;">
                    <p
                        style="color: rgb(0, 0, 0); font-size: 80px; text-align: center; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                        <b>Find your Ideal <br>College <br>That fits you best.</b></p>

                </div>
            </div>
            <div class="div_intro_video">
                <video src="videos/introvideo.mp4" class="introvideo" muted="muted" loop="loop"
                    autoplay="autoplay"></video>
            </div>
            <div style="display: block; align-items: center; justify-content: center;">
                <p style="font-size: 20px; text-align: center; font-weight: 200; font-family: Poppins ;">Illuminating
                    the route for college students embarking on their quest for the perfect educational institute. <br>
                    Find your institute in a click and apply. <br>
                    Create a Gyan-Glide account and Let Colleges pick you instead as a Reverse admission. <br>
                    Transforming the way students explore educational opportunities.</p>
                <div
                    style="display: flex; align-items: center; justify-content: center; margin-top: 20px; margin-bottom: 50px;">
                    <a href="loginpage.php" target="_self"><button class="getstarted">GET STARTED</button></a>
                </div>
            </div>
            <div>
                <div class="aboutus">
                    <video src="videos/summary.mp4" class="summaryvideo" muted="muted" loop="loop"
                        autoplay="autoplay"></video>
                    <div>
                        <p style="font-size: 80px; font-weight: 900; color: white; margin-bottom: 50px;">Take a look at
                            the process once.</p>
                        <a href="loginpage.php" target="_self"><button class="getstarted">GET STARTED</button></a>
                    </div>
                </div>
            </div>
            <section class="properties-container" id="properties">
                <div class="heading">
                    <h2 style="text-align: center; font-size: 50px; margin-top: 80px; margin-bottom: 50px;">Our Featured
                        Properties</h2>
                </div>
                <div
                    style="display: flex; justify-content: space-evenly; align-items: center; margin-left: 20px; margin-right: 20px; flex-wrap: wrap;">
                    <!-- Box 1 -->
                    <div class="box"
                        style="border: 3px solid rgb(241, 241, 52); border-radius: 30px; box-shadow: -30px 20px 0px 0px rgba(255,213,42,255);">
                        <a href="findperfect.html">
                            <h3
                                style="font-size: 25px; margin-left: 30px; margin-top: 30px; font-weight: 900; color: black;">
                                Find Your Perfect Fit &nbsp;<i class="fa-solid fa-arrow-right"></i></h3>
                        </a>
                        <p style="margin: 20px 30px 5px 30px; line-height: 25px; ">Get personalized college suggestions,
                            see your chances, and compare the costs of the institutes on your lists.</p>
                        <img src="images/college.jpg" alt=""
                            style="object-fit: cover; height: 280px; border-radius: 30px; width: 90%; align-self: center;">
                    </div>
                    <!-- Box 2 -->
                    <div class="box"
                        style="border: 3px solid teal; border-radius: 30px; box-shadow: -30px 20px 0px 0px rgba(0,151,178,255);">
                        <a href="virtualtours.html">
                            <h3
                                style="font-size: 25px; margin-left: 30px; margin-top: 30px; font-weight: 900; color: black;">
                                Take Virtual Tours &nbsp;<i class="fa-solid fa-arrow-right"></i></h3>
                        </a>
                        <p style="margin: 20px 30px 5px 30px; line-height: 25px; ">Feel the energy and vibe of the
                            institutes, and see the spaces and places that matter most to you.</p>
                        <img src="images/tour.png" alt=""
                            style="object-fit: cover; height: 280px; border-radius: 30px; width: 90%; align-self: center;">
                    </div>
                    <!-- Box 3 -->
                    <div class="box"
                        style="border: 3px solid rgb(255, 154, 1); border-radius: 30px; box-shadow: -30px 20px 0px 0px rgba(255,145,77,255);">
                        <a href="scholarship.html">
                            <h3
                                style="font-size: 25px; margin-left: 30px; margin-top: 30px; font-weight: 900; color: black;">
                                Search for Scholarships &nbsp;<i class="fa-solid fa-arrow-right"></i></h3>
                        </a>
                        <p style="margin: 20px 30px 5px 30px; line-height: 25px; ">Search for the scholarships available
                            through our extensive and up-to-date database with the college you are interested in.</p>
                        <img src="images/scholarship.jpg" alt=""
                            style="object-fit: cover; height: 280px; border-radius: 30px; width: 90%; align-self: center;">
                    </div>
                    <!-- Box 4 -->
                    <div class="box"
                        style="border: 3px solid rgb(235, 7, 182); border-radius: 30px;  box-shadow: -30px 20px 0px 0px rgba(255,102,196,255)">
                        <a href="dreamcareer.html">
                            <h3
                                style="font-size: 25px; margin-left: 30px; margin-top: 30px; font-weight: 900; color: black;">
                                Discover your Dream Career &nbsp;<i class="fa-solid fa-arrow-right"></i></h3>
                        </a>
                        <p style="margin: 20px 30px 5px 30px; line-height: 25px; ">Take help from us to find pathway to
                            your dream, explore career options also more information about colleges.</p>
                        <img src="images/career.webp" alt=""
                            style="object-fit: cover; height: 280px; border-radius: 30px; width: 90%; align-self: center;">
                    </div>
                </div>
        </div>
        <div class="reverse_admission">
            <img src="images/img1.jpg" alt="" height="80%" width="40%" style="border-radius: 30px; margin-top: 30px;">
            <div style="height: 90%; width: 40%; margin-top: 30px;">
                <h1 style="color: rgb(1, 225, 225); margin-bottom: 20px; ">Reverse Admission</h1>
                <p style="font-size: 40px; color: antiquewhite; font-weight: 900;">Schools apply to you too. <br> Yeah,
                    that’s cool.</p>
                <p style="font-size: 20px; color: rgb(255, 255, 255); font-weight: 500; margin-top: 20px;">Complete your
                    profile and receive real admission offers to multiple colleges, many with scholarships attached.
                    Having schools/colleges compete for you this way takes the uncertainty out of the traditional
                    application process.</p>
                <a href="reverseadmission.html"><button class="learnmore"
                        style="border: 2px solid aliceblue; border-radius: 10px; padding: 5px; color: white; background: transparent; cursor: pointer; font-size: large; margin-top: 50px;">Learn
                        More</button></a>
            </div>
        </div>
        <p style="text-align: center; font-size: 40px; font-weight: 900; margin-top: 100px;">You can count on us.</p>
        <div class="facts">
            <div style="display: flex; flex-direction: column; justify-content: center; align-content: center;">
            <span style="position: relative;top: 125px; left:110px; font-size:30px;"><?php echo $ccount;?>+</span>
                <img class="to_display" src="images/stdregistered.png" alt="Students Registered">
                <p style="text-align: center; font-size: larger; font-weight: 900;">Students Registered</p>
            </div>
            <div style="display: flex; flex-direction: column; justify-content: center; align-content: center;">
            <span style="position: relative;top: 125px; left:155px; font-size: 30px; "><?php echo $scount; ?>+</span>
            <img
                    class="to_display" src="images/college_profiles.png" alt="College Profiles">
                <p style="text-align: center; font-size: larger; font-weight: 900;">College Profiles</p>
            </div>
            <div style="display: flex; flex-direction: column; justify-content: center; align-content: center;">
            <span style="position: relative;top: 125px; left:55px; font-size: 30px; "><?php echo "Coming soon"; ?>+</span>    
            <img
                    class="to_display" src="images/discounts.png" alt="Discounts and Scholarships">
                <p style="text-align: center; font-size: larger; font-weight: 900;">Scholarships & Discounts</p>
            </div>
            <div style="display: flex; flex-direction: column; justify-content: center; align-content: center;">
            <span style="position: relative;top: 125px; left:55px; font-size: 30px; "><?php echo "Coming soon"; ?>+</span>    
            <img
                    class="to_display" src="images/time_savings.png" alt="Hours of Time savings">
                <p style="text-align: center; font-size: larger; font-weight: 900;">Of Time Savings</p>
            </div>
        </div>
        <div class="join_with_us">
            <div style="height: 90%; width: 40%; margin-top: 30px;">
                <h1 style="color: rgb(0, 93, 93); margin-bottom: 20px; ">Join Us</h1>
                <p style="font-size: 40px; color: rgb(0, 0, 0); font-weight: 900;">Add your School or College <br> Join
                    with us in this journey.</p>
                <p style="font-size: 20px; color: rgb(0, 0, 0); font-weight: 500; margin-top: 20px;">Join with us and
                    Create your school/college profile and post your achievements, your ambience, What you offer to
                    students and so on.</p>
                <a href="joinus.php"><button class="learnmore"
                        style="border: 2px solid rgb(0, 0, 0); border-radius: 10px; padding: 5px; color: rgb(0, 0, 0); background: transparent; cursor: pointer; font-size: large; margin-top: 50px;">Learn
                        More</button></a>
            </div>
            <img src="images/joinus.png" alt="Join Us" height="90%" style="border-radius: 30px; align-self: center;">
        </div>
        <div class="join_with_us" style="background-color: transparent">
            <img src="images/ratingcollege.jpeg" alt="Join Us" height="90%"
                style="border-radius: 30px; align-self: center;">
            <div style="height: 90%; width: 40%; margin-top: 30px;">
                <h1 style="color: rgb(0, 93, 93); margin-bottom: 20px; ">Your Rating and Reviews Matters</h1>
                <p style="font-size: 40px; color: rgb(0, 0, 0); font-weight: 900;">Rate us & Give reviews of yours.</p>
                <p style="font-size: 20px; color: rgb(0, 0, 0); font-weight: 500; margin-top: 20px;">Rate colleges as
                    well on the basis of your experience. You can rate on the basis of ambience, education and more.</p>
                <a href="reviews/index.php"><button class="learnmore"
                        style="border: 2px solid rgb(0, 0, 0); border-radius: 10px; padding: 5px; color: rgb(0, 0, 0); background: transparent; cursor: pointer; font-size: large; margin-top: 50px;">Learn
                        More</button></a>
            </div>
        </div>
        </section>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
<footer>
    <div class="footerContainer">
        <div style="display: flex; align-items: center; justify-content: center;">
            <img src="images/whitelogo.png" alt=""
                style="object-fit: cover; width: 250px; height: 150px; margin-left: 20px;">
        </div>
        <div class="footerNav">
            <div>
                <h3 style="color: white; text-align: center; margin-bottom: 20px;">Contact us</h1>
                    <p style="color: whitesmoke;margin-bottom: 10px;"><i
                            class="fa-solid fa-phone"></i>&nbsp;&nbsp;&nbsp;&nbsp; 061-521165</p>
                    <p style="color: whitesmoke;margin-bottom: 10px;"><i
                            class="fa-solid fa-phone"></i>&nbsp;&nbsp;&nbsp;&nbsp; +977 9832753574</p>
                    <p
                        style="color: whitesmoke;margin-bottom: 10px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                        <i class="fa-regular fa-envelope"></i>&nbsp;&nbsp;&nbsp; gyanglide24@gmail.com</p>
                    <p style="color: whitesmoke;"></p>
            </div>
            <div style="margin-right: 70px;">
                <h3 style="color: white; text-align:center; margin-bottom: 20px;">Follow Us</h3>
                <div class="socialIcons">
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-github"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>
            <div>
                <h3 style="color: white; text-align:center; margin-bottom: 20px;">Our Team</h3>
                <p style="color: whitesmoke;">Prashant Adhikari <br> Akriti Dhakal <br> Sushan Poudel <br> Suraj Sapkota
                </p>
            </div>
        </div>
        <div
            style="display: flex; align-items: center; justify-content: center; border-top: 1px solid white; color: white; padding: 20px;">
            <i class="fa-regular fa-copyright"></i>&nbsp; &nbsp; Gyan-Glide,&nbsp; All Rights Reserved
        </div>
    </div>
    </div>
</footer>

</html>