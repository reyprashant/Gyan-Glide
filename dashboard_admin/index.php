<?php
@include 'connectionSetup.php';
session_start();
if (!isset($_SESSION['admin'])) {
  header('location:../index.php');
  die();
}
header('location: colleges.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css"> 
    <link rel="stylesheet" href="css/framework.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Rubik:wght@300;400;600;900&family=Work+Sans:wght@300;400;500;600;800&display=swap" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body style="background-color: rgb(173, 255, 255);">
  <div class="dashboard page d-flex">
    <?php
    include_once 'dashboard_navbar.php';
    ?>
    <div class="content d-flex  column">
    <?php
    include_once 'dashboard_header.php';
    ?>

        <h1 class="p-relative mt-10">Dashboard</h1>
      
        <div class="container grid ">
        <div class="welcome txt-c-mobile bg-white p-relative rad-10">
          <div class="title  between-flex p-20 bg-gray p-relative ">
            <div class="text">
              <h2>welcome</h2>
              <p class="c-gray"><span id="loggedUsername"><?php echo "admin";?></span></p>
            </div>
            <img src="images/welcome.png" alt="">
            <img src="images/avatar.png" alt="" class="p-absolute">
          </div>
          <div class="data between-flex p-20 mb-20">
            <div class="name">
              <p>LA GRANDEE International College</p>
              <span class="c-gray">ISO Certified College</span>
            </div>
            <div class="projects">
              <p>800</p>
              <span class="c-gray">Students</span>
            </div>
            <!-- <div class="earn">
              <p>$8500</p>
              <span class="c-gray">earned</span>
            </div> -->
          </div>
          <a href="profile.html" class="c-white p-20 bg-blue rad-6 fs-14 d-block fit-width" >profile</a>
        </div>

        <div class="draft txt-c-mobile p-20 column bg-white p-relative rad-10">
          <h2>Quick Draft</h2>
          <p class="c-gray fs-18">write a summary that describe your college</p>
          <form action="">
             <textarea name="" id="" placeholder="title" class="f-width  bg-gray rad-10 p-10 fs-14"></textarea>
             <textarea name="" id=""  placeholder="your thought" class="c-white f-width rad-10 p-10 mt-10 bg-gray fs-14" ></textarea>
             <input type="submit" value="save" class="c-white bg-blue p-5 rad-6 bg-blue d-block fit-width fs-14">
          </form>
        </div>

        <div class="targets p-20 bg-white rad-10">
          <h2>Your Sumary</h2>
          <p class="c-gray fs-18 mt-20">Your infos</p>
          <div class="mt-10 money d-flex">
            <i class="fa-solid   d-flex align-center justify-center">R</i>
               <div class="text f-width ">
                <p class="c-gray mt-5">Revenue from students</p>
                  <h4 class="mt-10">20000</h4> 
                  <div class="p-relative bg-blue ">
                    <span class="p-absolute f-height" style="width: 80%;">
                      <span class="p-absolute bg-blue c-white p-5 rad-6 fs-12" >80%</span>
                    </span>
                  </div>
               </div>
          </div>
          <div class="projects mt-20 d-flex">
            <i class="fa-solid fa-code bg-orange  d-flex align-center justify-center"></i> 
            <div class="text f-width">
                <p class="c-gray mt-5">Scholarships you provided</p>
                  <h4 class="mt-10">24</h4>
                  <div class="bg-orange p-relative">
                    <span class="p-absolute f-height" style="width:55%;">
                      <span class="p-absolute bg-orange c-white p-5 rad-6 fs-12 " >65%</span>
                    </span>
                  </div>
               </div>
          </div>
          <div class="team mt-20 d-flex">
            <i class="fa-solid fa-user bg-green  d-flex align-center justify-center"></i>
            <div class="text f-width">
                <p class="c-gray mt-5">Number of students enrolled to you from Gyan-Glide</p>
                  <h4 class="mt-10">12 out of 15</h4>
                  <div class="bg-green p-relative">
                    <span class="p-absolute f-height" style="width:75%;">
                      <span class="p-absolute bg-green c-white p-5 rad-6 fs-12"  >75%</span>
                    </span>
                  </div>
               </div>
          </div>
        </div>
        
        <div class="tickets p-20 bg-white rad-6">
          <h2>Student Statistics</h2>
          <p class="c-gray fs-18 mt-20">Everything about students</p>
          <div class="tickets-holder grid mt-20">
            <div class="ticket flex-center column  p-20 rad-6">
              <i class="fa-solid fa-list c-orange mb-10"></i>
              <h2>50</h2>
              <p class="c-gray">Total</p>
            </div>

            <div class="ticket p-20 flex-center column  rad-6">
              <i class="fa-regular fa-circle-check c-green mb-10"></i>  
              <h2>12</h2>
              <p class="c-gray">Closed</p>
            </div>

            <div class="ticket flex-center column p-20 rad-6">
              <i class="fa-solid fa-spinner c-blue mb-10"></i>
              <h2>5</h2>
              <p class="c-gray">Pending</p>
            </div>

            <div class="ticket flex-center column p-20 rad-6">
              <i class="fa-regular fa-square-xmark c-red mb-10"></i>
              <h2>2500</h2>
              <p class="c-gray">Total students in Gyan-Glide</p>
            </div>
          </div>
        </div>

        <!-- <div class="news p-20 bg-white rad-6">
          <h2>Latest News</h2>
          <div class="news-holder">
            <div class="new p-relative align-center d-flex pt-20 pb-20 ">
              <img src="images/news-01.png" class="rad-6" alt="">
              <div class="title">
                <h3 class="f-18">Created SASS sections</h3>
                <p class="c-gray fs-14 mt-5">New SASS examples and tutorials</p>
              </div>
              <span class="bg-gray rad-6 p-5 fs-14">3 days ago</span>
            </div>

            <div class="new p-relative align-center d-flex pt-20 pb-20">
              <img src="images/news-02.png" class="rad-6" alt="">
              <div class="title">
                <h3 class="f-18">Added Payment Gateway</h3>
                <p class="c-gray fs-14 mt-5">Many New Payment Gateways Added</p>
              </div>
              <span class="bg-gray rad-6 p-5 fs-14">5 days ago</span>
            </div>

            <div class="new p-relative align-center d-flex pt-20 pb-20">
              <img src="images/news-03.png" class="rad-6" alt="">
              <div class="title">
                <h3 class="f-18">Changed The Design</h3>
                <p class="c-gray fs-14 mt-5">A Brand New Website Design</p>
              </div>
              <span class="bg-gray rad-6 p-5 fs-14">6 days ago</span>
            </div>

            <div class="new align-center  d-flex pt-20 pb-20">
              <img src="images/news-04.png" class="rad-6" alt="">
              <div class="title">
                <h3 class="f-18">Team Increased</h3>
                <p class="c-gray fs-14 mt-5">3 Developers Joined The Team</p>
              </div>
              <span class="bg-gray rad-6 p-5 fs-14">9 days ago</span>
            </div>
          </div>
        </div>
        
        <div class="tasks bg-white rad-6 p-20">
          <h2>Latest Tasks</h2>
          <div class="task-holder ">
            <div class="task between-flex pb-20 mt-20 p-relative">
            <div class="text ">
              <h3>Record One new video</h3>
              <p class="c-gray mt-5">Record Python Create Exe Project</p>
            </div>
            <i class="fa-solid fa-trash c-black"></i>
            </div>

            <div class="task between-flex mt-20 pb-20 p-relative">
              <div class="text ">
                <h3>Write Article</h3>
              <p class="c-gray mt-5">Write Low Level vs High Level Languages</p>
              </div>
              <i class="fa-solid fa-trash c-black"></i>
              </div>

              <div class="task between-flex mt-20 pb-20 p-relative">
                <div class="text ">
                  <h3>Finish Project</h3>
                  <p class="c-gray mt-5">Publish Academy Programming Project</p>
                </div>
                <i class="fa-solid fa-trash c-black"></i>
                </div>

                <div class="task light between-flex mt-20 pb-20  p-relative">
                  <div class="text ">
                    <h3>Attend The Meeting</h3>
                    <p class="c-gray mt-5">Attend The Project Business Analysis Meeting</p>
                  </div>
                  <i class="fa-solid fa-trash c-black"></i>
                  </div>

                  <div class="task between-flex mt-20 pb-20 p-relative">
                    <div class="text ">
                      <h3>Finish Lesson</h3>
                      <p class="c-gray mt-5">Finish Teaching Flex Box</p>
                    </div>
                    <i class="fa-solid fa-trash c-black"></i>
                    </div>
          </div>
        </div>

        <div class="search-items bg-white rad-6 p-20">
          <h2>Top Search Items</h2>
          <div class="c-gray between-flex mt-20 mb-10">
            <p>KeyWord</p>
            <p>Search Count</p>
          </div>
          <div class=" item between-flex mt-20 mb-10">
            <P>Programming</P>
            <span class="c-white bg-gray p-5 fs-14 rad-6">220</span>
          </div>
          <div class=" item between-flex mt-20 mb-10">
            <P>Javascript</P>
            <span class="c-white bg-gray p-5 fs-14 rad-6">180</span>
          </div>
          <div class=" item between-flex mt-20 mb-10">
            <P>PHP</P>
            <span class="c-white bg-gray p-5 fs-14 rad-6">160</span>
          </div>
          <div class=" item between-flex mt-20 mb-10">
            <P>Code</P>
            <span class="c-white bg-gray p-5 fs-14 rad-6">145</span>
          </div>
          <div class=" item between-flex mt-20 mb-10">
            <P>Design</P>
            <span class="c-white bg-gray p-5 fs-14 rad-6">110</span>
          </div>
          <div class=" item between-flex mt-20 mb-10">
            <P>Logic</P>
            <span class="c-white bg-gray p-5 fs-14 rad-6">95</span>
          </div>

        </div>

        <div class="uploads p-20 bg-white rad-6">
          <h2>Latest Uploads</h2>
          <div class="uploads-holder">
            <div class="up p-relative align-center d-flex pt-10 pb-10 ">
              <img src="images/pdf.svg" class="rad-6" alt="">
              <div class="title">
                <h3 class="f-18">my-file.pdf</h3>
                <p class="c-gray fs-14 mt-5">Elzero</p>
              </div>
              <span class="bg-gray rad-6 p-5 fs-14">2.9mb</span>
            </div>

            <div class="up p-relative align-center d-flex pt-10 pb-10">
              <img src="images/png.svg" class="rad-6" alt="">
              <div class="title">
                <h3 class="f-18">My-Video-File.avi</h3>
                <p class="c-gray fs-14 mt-5">Admin</p>
              </div>
              <span class="bg-gray rad-6 p-5 fs-14">4.9mb</span>
            </div>

            <div class="up align-center p-relative  d-flex pt-10 pb-10">
              <img src="images/avi.svg" class="rad-6" alt="">
              <div class="title">
                <h3 class="f-18">My-Zip-File.pdf</h3>
                <p class="c-gray fs-14 mt-5">User</p>
              </div>
              <span class="bg-gray rad-6 p-5 fs-14">6.4mb</span>
            </div>
            <div class="up align-center p-relative  d-flex pt-10 pb-10">
              <img src="images/dll.svg" class="rad-6" alt="">
              <div class="title">
                <h3 class="f-18">My-DLL-File.pdf</h3>
                <p class="c-gray fs-14 mt-5">Admin</p>
              </div>
              <span class="bg-gray rad-6 p-5 fs-14">9.0mb</span>
            </div>
            <div class="up align-center p-relative  d-flex pt-10 pb-10">
              <img src="images/eps.svg" class="rad-6" alt="">
              <div class="title">
                <h3 class="f-18">My-Eps-File.pdf</h3>
                <p class="c-gray fs-14 mt-5">Designer</p>
              </div>
              <span class="bg-gray rad-6 p-5 fs-14">8.6mb</span>
            </div>
          </div>
        </div>

        <div class="project-progress p-20 bg-white rad-6">
        <h2>last Project Progress</h2>
        <div class="holder">
          <p  class="done mt-25 p-relative pl-5"> Got The Project</p>
          <p class="done mt-25 p-relative pl-5">Started The Project</p>
          <p  class="done mt-25 p-relative pl-5">The Project About To Finish</p>
          <p  class="current mt-25 p-relative pl-5">Test The Project</p>
          <p  class="mt-25 p-relative pl-5">Finish The Project & Get Money</p>
        </div>
        </div>

        <div class="reminders p-20 bg-white rad-6">
        <h2>Reminders</h2>
        <div class=" reminder p-relative mt-10 p-10">
          <h4>Check My Tasks List</h4>
          <p class="c-gray mt-5">22/09/2022 - 12:00am</p>
        </div>
        <div class=" reminder p-relative mt-10 p-10">
          <h4>Check My Projects </h4>
          <p class="c-gray mt-5"> 15/10/2022 - 12:00am</p>
        </div>
        <div class=" reminder p-relative mt-10 p-10">
          <h4>Check My Clients</h4>
          <p class="c-gray mt-5">28/10/2022 - 12:00am</p>
        </div>
        <div class=" reminder p-relative mt-10 p-10">
          <h4>Finish The Development Workshop</h4>
          <p class="c-gray mt-5">23/12/2022 - 12:00am</p>
        </div>
        
        </div>

        <div class="post p-20 bg-white rad-6">
        <h2>Latest post</h2>
        <div class="head mt-20 p-10 d-flex">
          <img src="images/avatar.png" alt="">
          <div class="text d-flex column">
            <h3>Osama elzero</h3>
            <p class="c-gray fs-14 mt-5">about 3 hours ago</p>
          </div>
        </div>
        <p class=" p-20 txt-c">You Can Fool All Of The People Some Of The Time, And Some Of The People All Of The Time, But You Can't Fool All Of The People All Of The Time.</p>
        <div class="icons between-flex p-10">
          <i class="fa-regular fa-heart c-gray"><span class="fs-14 pl-5">1.8K</span></i>
          <i class="fa-regular fa-comments c-gray"><span class="fs-14 pl-5"">500</span></i>
        </div>
        </div>

        <div class="social-media p-20 bg-white rad-6">
        <h2>Social media stats</h2>
        <div class="twitter d-flex mt-10">
          <div class="icon c-white flex-center ">
            <i class="fa-brands fa-twitter c-white fa-2x "></i>
          </div>
          <div class="details between-flex">
            <p>90k followers</p>
            <a href="#" class="c-white p-5 fs-14 rad-6">follow</a>
          </div>


        </div>
        <div class="facebook d-flex mt-10">
          <div class="icon c-white flex-center">
            <i class="fa-brands fa-facebook c-white fa-2x"></i>
          </div>
          <div class="details between-flex">
            <p>3M like</p>
            <a href="#" class="c-white p-5 fs-14 rad-6">like</a>
          </div>


        </div>
        <div class="youtube d-flex  mt-10">
          <div class="icon c-white flex-center">
            <i class="fa-brands fa-youtube c-white fa-2x"></i>
          </div>
          <div class="details between-flex">
            <p>1M Subs</p>
            <a href="#" class="c-white p-5 fs-14 rad-6">subscribe</a>
          </div>


        </div>
        <div class="linkedin d-flex  mt-10">
          <div class="icon c-white flex-center">
            <i class="fa-brands fa-linkedin c-white fa-2x"></i>
          </div>
          <div class="details between-flex">
            <p>80k followers</p>
            <a href="#" class="c-white p-5 fs-14 rad-6">follow</a>
          </div>


        </div>
        </div>

        <div class="projects  p-20 rad-6 bg-white item-full-width" >
        <h2>projects</h2>
        <div class="responsive-table">
          <table class="bg-white f-width">
            <thead>
              <tr>
                <td >Name</td>
                <td >Finish Date</td>
                <td>Client</td>
                <td >Price</td>
                <td >Team</td>
                <td >Status</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Ministry Wikipedia</td>
                <td>10 May 2022</td>
                <td>Ministry</td>
                <td>$5300</td>
                <td>
                  <img src="images/team-01.png" alt="" />
                  <img src="images/team-02.png" alt="" />
                  <img src="images/team-03.png" alt="" />
                  <img src="images/team-05.png" alt="" />
                </td>
                <td>
                  <span class="label rad-6 p-5 bg-orange c-white fs-12">Pending</span>
                </td>
              </tr>
              <tr>
                <td>Elzero Shop</td>
                <td>12 Oct 2021</td>
                <td>Elzero Company</td>
                <td>$1500</td>
                <td>
                  <img src="images/team-01.png" alt="" />
                  <img src="images/team-02.png" alt="" />
                  <img src="images/team-05.png" alt="" />
                </td>
                <td><span class="label rad-6 p-5 bg-blue c-white fs-12">In Progress</span></td>
              </tr>
              <tr>
                <td>Bouba App</td>
                <td>05 Sep 2021</td>
                <td>Bouba</td>
                <td>$800</td>
                <td>
                  <img src="images/team-02.png" alt="" />
                  <img src="images/team-03.png" alt="" />
                </td>
                <td><span class="label rad-6 p-5 bg-green c-white fs-12">Completed</span></td>
              </tr>
              <tr>
                <td>Mahmoud Website</td>
                <td>22 May 2021</td>
                <td>Mahmoud</td>
                <td>$600</td>
                <td>
                  <img src="images/team-01.png" alt="" />
                  <img src="images/team-02.png" alt="" />
                </td>
                <td><span class="label rad-6 p-5 bg-green c-white fs-12">Completed</span></td>
              </tr>
              <tr>
                <td>Sayed Website</td>
                <td>24 May 2021</td>
                <td>Sayed</td>
                <td>$300</td>
                <td>
                  <img src="images/team-01.png" alt="" />
                  <img src="images/team-03.png" alt="" />
                </td>
                <td><span class="label rad-6 p-5 bg-red c-white fs-12">Rejected</span></td>
              </tr>
              <tr>
                <td>Arena Application</td>
                <td>01 Mar 2021</td>
                <td>Arena Company</td>
                <td>$2600</td>
                <td>
                  <img src="images/team-01.png" alt="" />
                  <img src="images/team-02.png" alt="" />
                  <img src="images/team-03.png" alt="" />
                  <img src="images/team-04.png" alt="" />
                </td>
                <td><span class="label rad-6 p-5 bg-green c-white fs-12">Completed</span></td>
              </tr>
            </tbody>
          </table>
        </div>
        </div> -->



      </div>
    </div>
  </div>  
</body>
</html>