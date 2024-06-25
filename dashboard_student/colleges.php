<?php

require '../connectionSetup.php';
session_start();

$sql = "SELECT * FROM college_info";
$result = $conn->query($sql);




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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Rubik:wght@300;400;600;900&family=Work+Sans:wght@300;400;500;600;800&display=swap" rel="stylesheet">
    <title>Colleges</title>
</head>
<body>

<?php
 while ($colleges_row = mysqli_fetch_assoc($result)) {}
?>
    <div class="courses page d-flex">
        <?php
        require_once'dashboard_navbar.php';
        ?>
        
        <div class="content d-flex  column">
            <div class="header between-flex p-20 p-relative bg-white f-width">
             <form action="" class="p-relative" >
               <input type="text" placeholder="Type a keyword" class=" rad-6 p-10 fs-14">
               </form>   
             <div class="user between-flex">
               <i class="fa-regular fa-bell p-relative fs-20"></i>
               <img src="images/avatar.png" alt="" class="rad-50">   
             </div>  
            </div>
            <h1 class="p-relative mt-10">Colleges</h1>
            <div class="container grid">

            
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
                        <a href=""><h5 class="p-5 bg-blue c-white rad-6">Course Info</h5></a>
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
                        <a href=""><h5 class="p-5 bg-blue c-white rad-6">Course Info</h5></a>
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
                        <a href=""><h5 class="p-5 bg-blue c-white rad-6">Course Info</h5></a>
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
                        <a href=""><h5 class="p-5 bg-blue c-white rad-6">Course Info</h5></a>
                        <!-- <span class="c-gray">$ 897</span> -->
                    </div>
                </div>
                <!-- <div class="course rad-6 bg-white p-relative">
                    <img src="images/course-03.jpg" alt="" class="f-width">
                    <img src="images/team-05.png" alt="" class="p-absolute">
                    <div class="text p-20 pb-30 ">
                        <h3 class="mb-10">Mastering Web design</h3>
                        <p class="c-gray fs-14">Master The Art Of Web Designing And Mocking, Prototyping And Creating Web Design Architecture</p>
                    </div>
                    <div class="info between-flex p-10 p-relative">
                        <span class="c-gray">
                            960
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <h5 class="p-5 bg-blue c-white rad-6">Course Info</h5>
                        <span class="c-gray">$ 897</span>
                    </div>
                </div>
                <div class="course rad-6 bg-white p-relative">
                    <img src="images/course-02.jpg" alt="" class="f-width">
                    <img src="images/team-04.png" alt="" class="p-absolute">
                    <div class="text p-20 pb-30">
                        <h3 class="mb-10">Data Structure And Algorithms</h3>
                        <p class="c-gray fs-14">Master The Art Of Data Strcuture And Famous Algorithms Like Sorting, Dividing And Conquering</p>
                    </div>
                    <div class="info between-flex p-10 p-relative">
                        <span class="c-gray">
                            890
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <h5 class="p-5 bg-blue c-white rad-6">Course Info</h5>
                        <span class="c-gray">$ 700</span>
                    </div>
                </div>
                <div class="course rad-6 bg-white p-relative">
                    <img src="images/course-03.jpg" alt="" class="f-width">
                    <img src="images/team-02.png" alt="" class="p-absolute">
                    <div class="text p-20 pb-30">
                        <h3 class="mb-10">Responsive Web Design</h3>
                        <p class="c-gray fs-14">Master The Art Of Web Designing And Mocking, Prototyping And Creating Web Design Architecture</p>
                    </div>
                    <div class="info between-flex p-10 p-relative">
                        <span class="c-gray">
                            467
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <h5 class="p-5 bg-blue c-white rad-6">Course Info</h5>
                        <span class="c-gray">$ 477</span>
                    </div>
                </div>
                <div class="course rad-6 bg-white p-relative">
                    <img src="images/course-05.jpg" alt="" class="f-width">
                    <img src="images/team-05.png" alt="" class="p-absolute">
                    <div class="text p-20 pb-30">
                        <h3 class="mb-10">Mastering Python</h3>
                        <p class="c-gray fs-14">Mastering Python To Prepare For Data Science And AI And Automating Things in Your Life</p>
                    </div>
                    <div class="info between-flex p-10 p-relative">
                        <span class="c-gray">
                            760
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <h5 class="p-5 bg-blue c-white rad-6">Course Info</h5>
                        <span class="c-gray">$ 997</span>
                    </div>
                </div>
                <div class="course rad-6 bg-white p-relative">
                    <img src="images/course-01.jpg" alt="" class="f-width">
                    <img src="images/team-01.png" alt="" class="p-absolute">
                    <div class="text p-20 pb-30">
                        <h3 class="mb-10">PHP Examples</h3>
                        <p class="c-gray fs-14">PHP Tutorials And Examples And Practice On Web Application And Connecting With Databases</p>
                    </div>
                    <div class="info between-flex p-10 p-relative">
                        <span class="c-gray">
                            350
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <h5 class="p-5 bg-blue c-white rad-6">Course Info</h5>
                        <span class="c-gray">$ 867</span>
                    </div>
                </div>
                <div class="course rad-6 bg-white p-relative">
                    <img src="images/course-04.jpg" alt="" class="f-width">
                    <img src="images/team-04.png" alt="" class="p-absolute">
                    <div class="text p-20 pb-30">
                        <h3 class="mb-10">Mastering Web design</h3>
                        <p class="c-gray fs-14">Master The Art Of Web Designing And Mocking, Prototyping And Creating Web Design Architecture</p>
                    </div>
                    <div class="info between-flex p-10 p-relative">
                        <span class="c-gray">
                            860
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <h5 class="p-5 bg-blue c-white rad-6">Course Info</h5>
                        <span class="c-gray">$ 486</span>
                    </div>
                </div>
                <div class="course rad-6 bg-white p-relative">
                    <img src="images/course-02.jpg" alt="" class="f-width">
                    <img src="images/team-01.png" alt="" class="p-absolute">
                    <div class="text p-20 pb-30">
                        <h3 class="mb-10">Data Structure And Algorithms</h3>
                        <p class="c-gray fs-14">Master The Art Of Data Strcuture And Famous Algorithms Like Sorting, Dividing And Conquering</p>
                    </div>
                    <div class="info between-flex p-10 p-relative">
                        <span class="c-gray">
                            875
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <h5 class="p-5 bg-blue c-white rad-6">Course Info</h5>
                        <span class="c-gray">$ 457</span>
                    </div>
                </div> -->

            </div>
        </div>
    </div>

</body>
</html>