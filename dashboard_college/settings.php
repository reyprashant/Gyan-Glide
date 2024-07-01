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
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Rubik:wght@300;400;600;900&family=Work+Sans:wght@300;400;500;600;800&display=swap"
    rel="stylesheet">
  <title>Settings</title>
</head>

<body>

  <div class="page settings d-flex">
    <?php
    require_once 'dashboard_navbar.php';
    ?>

    <div class="content d-flex  column">

      <?php
      require_once 'dashboard_header.php';
      ?>
      <h1 class="p-relative mt-10">Settings</h1>
      <div class="container grid ">

        <!-- <div class="site-control bg-white p-20 rad-6 ">
            <h2 class="mb-10">Site Control</h2>
            <p class=" c-gray ">Control The Website If There Is Maintenance</p>
            <div class="open-close between-flex mt-10">
                <div class="text">
                    <h4 class="mb-5">Website Control</h4>
                    <p class="fs-12 c-gray ">Open/Close Website And Type The Reason</p>
                </div>
                <label>
                    <input type="checkbox" class="checkbox-button p-relative" checked>
                    <div class="checkbox-toggle"></div>
                </label>
            </div>
            <textarea class="f-width rad-6 mt-20 fs-12 p-10" placeholder="Close Message content" ></textarea>
          </div> -->

        <div class="general-info bg-white p-20 rad-6 ">
          <h2 class="mb-20">General Info</h2>
          <p class=" c-gray">General Information About Your College</p>
          <form action="">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">College Name</label>
            <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" placeholder="College Name">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">College Address</label>
            <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" placeholder="College Address">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">Establised Date</label>
            <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" placeholder="Establised Date">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">Certifications</label>
            <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" placeholder="Certification">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-15">Organization Type</label>
            <!-- <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" value="last Name"> -->
            <select name="org_type" id="1">
              <option value="profitable">Profitable</option>
              <option value="profitable">Non-Profitable</option>
              <option value="profitable">Private</option>
              <option value="profitable">Government</option>
              <option value="profitable">NGo's/INGo's</option>
            </select>

            

            <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">Faculties/ Courses you offer</label>
            <!-- <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" placeholder="Faculty">
            <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" placeholder="Faculty">
            <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" placeholder="Faculty">
            <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" placeholder="Faculty">
            <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" placeholder="Faculty"> -->

            
            <input type="checkbox" id="faculty1" name="faculty1" value="BBA">
            <label for="vehicle1">BBA</label><br>
            <input type="checkbox" id="faculty2" name="faculty2" value="BCA">
            <label for="vehicle2">BCA</label><br>
            <input type="checkbox" id="faculty3" name="faculty3" value="BPH">
            <label for="vehicle3">BPH</label><br>
            <input type="checkbox" id="faculty4" name="faculty4" value="BBS">
            <label for="vehicle1">BBS</label><br>
            <input type="checkbox" id="faculty5" name="faculty5" value="Engineering">
            <label for="vehicle2">Engineering</label><br>
            <input type="checkbox" id="faculty6" name="faculty6" value="BALLB">
            <label for="vehicle3">BALLB</label><br>
            
            <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">Top Facilities in your College</label>
        <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" placeholder="">
        <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" placeholder="">
        <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" placeholder="">
        <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" placeholder="">
        <input type="text" class="c-gray p-10 rad-6 fs-14 f-width" placeholder="">
            
            
            
            <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">Upload picture of your college </label>
            <input type="file" id="myFile" name="filename" accept="image/*">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">Upload Logo of your College</label>
            <input type="file" id="myFile" name="filename" accept="image/*">

            <label for="" class="fs-14 c-gray mb-10 d-block mt-20 ">Upload ambience/glimpse of your college</label>
            <input type="file" id="myFile" name="filename" multiple="multiple" accept="image/*">
            <br>
            <br>
            <input type="button" value="submit">

            <div class="draft txt-c-mobile p-20 column bg-white p-relative rad-10">
              <label for="" class="fs-14 c-gray mb-10 d-block mt-15 ">Description of your College</label>
              <!-- <input type="textbox" class="c-gray p-10 rad-6 fs-14 " placeholder="Description of your College"> -->

              <textarea name="" id="" class="c-gray p-10 rad-6 fs-14 f-width" placeholder="your thought"></textarea>
              <!-- <input type="submit" value="save" class="c-white bg-blue p-5 rad-6 bg-blue d-block fit-width fs-14"> -->
            </div>

          </form>
        </div>

        <div class="security-info bg-white p-20 rad-6 ">
          <h2 class="mb-20">Security Info</h2>
          <p class=" c-gray">General Information About Your Account</p>
          <div class="password between-flex pt-20 pb-20 ">
            <div class="text">
              <H4>Password</H4>
              <!-- <p class="c-gray fs-14 mt-5">Last Change On 25/10/2021</p> -->
            </div>
            <a href="#" class="rad-6 c-white bg-blue p-5 ">Change</a>
          </div>

          <!-- <div class="factor-authentication between-flex pt-20 pb-20">
                <div class="text">
                  <H4>Two-Factor Authentication</H4>
                  <p class="c-gray fs-14 mt-5">Enable/Disable The Feature</p>
                </div>
                <label>
                    <input type="checkbox" class="checkbox-button p-relative">
                    <div class="checkbox-toggle"></div>
                </label>
            </div> -->

          <!-- <div class="devices between-flex pt-20 pb-20">
                <div class="text">
                    <H4>Devices</H4>
                    <p class="c-gray fs-14 mt-5">Check The Login Devices List</p>
                </div>
                <a href="#" class="rad-6 bg-f6 p-5 c-black ">Change</a>

            </div>
          </div> -->

          <div class="social-info bg-white p-20 rad-6 ">
            <h2 class="mb-20">Social Info</h2>
            <p class=" c-gray">General Information About Your Account</p>
            <form action="">
              <div class="instagram rad-6 mb-20 mt-25 bg-f6 d-flex ">
                <div class="icon  flex-center">
                  <i class="fa-brands fa-instagram c-gray "></i>
                </div>
                <input type="text" value="Instagram username" class="c-gray p-10 rad-6 fs-14 bg-f6">
              </div>

              <div class="facebook rad-6 mb-20 bg-f6 d-flex">
                <div class="icon  flex-center">
                  <i class="fa-brands fa-facebook c-gray "></i>
                </div>
                <input type="text" value="facebook username" class="c-gray p-10 rad-6 fs-14 bg-f6">
              </div>

              <div class="linkedin rad-6 mb-20 bg-f6 d-flex">
                <!-- <div class="icon  flex-center">
                  <i class="fa-brands fa-linkedin c-gray "></i>
                </div> -->
                <input type="text" value="website url" class="c-gray p-10 rad-6 fs-14 bg-f6">
              </div>

              <div class="youtube rad-6 mb-20 bg-f6 d-flex">
                <!-- <div class="icon  flex-center">
                  <i class="fa-brands fa-youtube c-gray "></i>
                </div> -->
                <input type="text" value="email address" class="c-gray p-10 rad-6 fs-14 bg-f6">
              </div>
            </form>
          </div>

          <!-- <div class="widgets-control bg-white p-20 rad-6 ">
            <h2 class="mb-20">widgets Info</h2>
            <input type="checkbox" name="" id="">

            <p class=" c-gray">Show/Hide Widgets</p> 

            <div class="mt-20">
                <input type="checkbox" name="" id="one">
                <label for="one">Quick Draft</label>
            </div>
            <div class="mt-10">
                <input type="checkbox" name="" id="two">
                <label for="two">Yearly Targets</label>
            </div>
            <div class="mt-10">
                <input type="checkbox" name="" id="three" checked>
                <label for="three">Tickets Statistics</label>
            </div>
            <div class="mt-10">
                <input type="checkbox" name="" id="four">
                <label for="four">Latest News</label>
            </div>
            <div class="mt-10">
                <input type="checkbox" name="" id="five" checked>
                <label for="five">Latest Tasks</label>
            </div>
            <div class="mt-10">
                <input type="checkbox" name="" id="six" checked>
                <label for="six">Top Search Items</label>
            </div>
          </div> -->

          <!-- <div class="backup-manager bg-white p-20 rad-6">
            <h2 class="mb-20">Backup Manager</h2>
            <p class=" c-gray">Control Backup Time And Location</p>
            <form action="">
              <div class="mt-15">
                <input type="radio" name="rad" id="rad-one">
                <label for="rad-one">Daily</label>
              </div>
              <div  class="mt-15">
                <input type="radio" name="rad" id="rad-two" >
                <label for="rad-two" >weekly</label>
              </div>
              <div  class="mt-15">
                <input type="radio" name="rad" id="rad-three" >
                <label for="rad-three">monthly</label>
              </div>

            </form>

            <div class="servers d-flex align-center mt-20 pt-20 ">

              <input type="radio" name="serv" id="megaman">
              <div class="server p-20 rad-6 f-width">
                <label for="megaman" class="d-block txt-c">
                   <i class="fa-solid fa-table-list d-block"></i>
                    megaman
                </label>
              </div>

              <input type="radio" name="serv" id="zero">
              <div class="server p-20 rad-6 f-width">
                <label for="zero" class="d-block txt-c">
                    <i class="fa-solid fa-table-list d-block"></i>
                    zero
                </label>
              </div>

              <input type="radio" name="serv" id="sigma">
              <div class="server p-20 rad-6 f-width">
                <label for="sigma" class="d-block txt-c">
                    <i class="fa-solid fa-table-list d-block"></i>
                    sigma
                </label>
              </div> -->

        </div>
      </div>
    </div>
  </div>

</body>