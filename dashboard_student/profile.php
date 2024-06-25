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
<body>
    <div class="profile page d-flex">
    <?php
        require_once'dashboard_navbar.php';
        ?>  
    
        <div class="content d-flex  column">
        
            <h1 class="p-relative mt-10">Profile</h1>
            <div class="discription p-20 bg-white rad-6 mt-20 ml-20 mr-20 d-flex wrap">
                <div class="user flex-center column">
                    <img src="images/avatar.png" alt="logo of college">
                    <h3 class="mt-10">LA GRANDEE</h3>
                    <!-- <p class="c-gray fs-14 mt-10">Level 20</p> -->
                    <div class="progress p-relative mt-10"><span class="rad-6" style="width:70%;"></span></div>
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
                            <p class="c-gray fs-15 mt-5 d-flex align-center">Full Name:<span class="c-black">LA GRANDEE International College</span></p>
                            <!-- <p class="c-gray fs-15 mt-5 d-flex align-center">Gender:<span class="c-black">Male</span></p> -->
                            <p class="c-gray fs-15 mt-5 d-flex align-center">City:<span class="c-black">Pokhara</span></p>
                            <label class="d-flex align-center">
                                <input type="checkbox" class="checkbox-button p-relative" checked>
                                <!-- <div class="checkbox-toggle"></div> -->
                            </label>
                         </div>
                    </div>

                    <div class="box p-20">
                        <h4 class="c-gray mb-10 ">Other Information</h4>
                         <div class="text grid">
                            <p class="c-gray fs-15 mt-5 d-flex align-center">Title:<span class="c-black">ISO Certified College</span></p>
                            <!-- <p class="c-gray fs-15 mt-5 d-flex align-center">Programming Language:<span class="c-black">Python</span></p>
                            <p class="c-gray fs-15 mt-5 d-flex align-center">Years Of Experience:<span class="c-black">15+</span></p>
                            <label class="d-flex align-center">
                                <input type="checkbox" class="checkbox-button p-relative" checked>
                                <div class="checkbox-toggle"></div>
                            </label> -->
                         </div>
                    </div>

                    <!-- <div class="box p-20">
                        <h4 class="c-gray mb-10 ">Billing Information</h4>
                         <div class="text grid">
                            <p class="c-gray fs-15 mt-5 d-flex align-center">Payment Method:<span class="c-black">Paypal</span></p>
                            <p class="c-gray fs-15 mt-5 d-flex align-center">Email:<span class="c-black">email@website.com</span></p>
                            <p class="c-gray fs-15 mt-5 d-flex align-center">Subscription:<span class="c-black">Monthly</span></p>
                            <label class="d-flex align-center">
                                <input type="checkbox" class="checkbox-button p-relative" checked>
                                <div class="checkbox-toggle"></div>
                            </label>
                         </div>
                    </div> -->

                    <div class="box p-20">
                        <h4 class="c-gray mb-10 ">Personal Information</h4>
                         <div class="text grid">
                            <p class="c-gray fs-15 mt-5 d-flex align-center">Email:<span class="c-black">lagrandee@gmail.com</span></p>
                            <p class="c-gray fs-15 mt-5 d-flex align-center">Phoner:<span class="c-black">061521165</span></p>
                            <p class="c-gray fs-15 mt-5 d-flex align-center">Address:<span class="c-black">Pokhara,Nepal</span></p>
                            <!-- <label class="d-flex align-center">
                                <input type="checkbox" class="checkbox-button p-relative" checked>
                                <div class="checkbox-toggle"></div>
                            </label> -->
                         </div>
                    </div>
                </div>

            </div>
            <div class="d-flex wrap">
              <div class="skills bg-white p-20 rad-6 mt-20 ml-20 mr-20">
                <h2>Faculties</h2>
                <!-- <p class="c-gray fs-14 mb-20">Complete Skills List</p> -->
                <div class="skill p-10 d-flex align-center bg-white">
                    <span>Bachelors in Computer Application(BCA)</span>
                    <!-- <span>Pugjs</span>
                    <span>HAML</span> -->
                </div>
                <div class="skill p-10 d-flex align-center bg-white">
                    <span>Bachelors in Business Administration(BBA)</span>
                    <!-- <span>SASS</span>
                    <span>Stylus</span> -->
                </div>
                <div class="skill p-10 d-flex align-center bg-white">
                    <span>Bachelors in Public Health(BPH)</span>
                    <!-- <span>TypeScript</span> -->
                </div>
                <!-- <div class="skill p-10 d-flex align-center bg-white">
                    <span>Vuejs</span>
                    <span>Reactjs</span>
                </div>
                <div class="skill p-10 d-flex align-center bg-white">
                    <span>Jest</span>
                    <span>Jasmine</span>
                </div>
                <div class="skill p-10 d-flex align-center bg-white">
                    <span>PHP</span>
                    <span>Laravel</span>
                </div>
                <div class="skill p-10 d-flex align-center">
                    <span>Python</span>
                    <span>Django</span>
                </div> -->
              </div>
              <div class="activities bg-white rad-6 mt-20 p-20 mr-20">
                <h2>Latest Achievements</h2>
                <p class="c-gray fs-14 mb-20">Latest Achievements of you</p>
                <div class="activity p-10 d-flex align-center f-width">
                    <!-- <img src="images/activity-01.png" class="flex-center" alt=""> -->
                    <!-- <div>
                        <div class="text between-flex c-gray mt-10">
                            <p>Bought The Mastering Python Course</p>
                            <p>Yesterday</p>
                        </div>
                    </div> -->
                </div>

                <div class="activity p-10 d-flex align-center f-width">
                    <img src="images/activity-02.png" class="flex-center" alt="">
                    <div>
                        <div class="text between-flex c-black">
                            <p>Activity</p>
                            <!-- <p>08:50</p> -->
                        </div>
                        <div class="text between-flex c-gray mt-10">
                            <p>Got The ISO Certificate</p>
                            <p>Yesterday</p>
                        </div>
                    </div>
                </div>

                <div class="activity p-10 d-flex align-center f-width">
                    <img src="images/activity-03.png" class="flex-center" alt="">
                    <div>
                        <div class="text between-flex c-black">
                            <p>Badges</p>
                            <!-- <p>16:10</p> -->
                        </div>
                        <div class="text between-flex c-gray mt-10">
                            <!-- <p>Unlocked The 10 Skills Badge</p> -->
                            <p>Some Reputed Badge</p>
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
</body>
</html>