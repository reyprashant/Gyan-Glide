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
  <title>Files</title>
</head>

<body style="background-color: rgb(173, 255, 255);">
  <div class="files page d-flex">
    <?php
    include_once 'dashboard_navbar.php';
    ?>
    <div class="content d-flex  column">
      <?php
      include_once 'dashboard_header.php';
      ?>
      <h1 class="p-relative mt-10">Files</h1>
      <!-- <div class="d-flex p-relative">
                <div class="container grid">
                   <div class="file rad-6 bg-white p-relative p-10">
                      <i class="fa-solid fa-upload c-gray fs-15 "></i>
                      <div class="flex-center column pb-10">
                          <img src="images/pdf.svg" alt="">
                          <p class="mt-10">my-file.pdf</p>
                      </div>
                      <p class="fs-14 c-gray pb-10">Elhero</p>
                      <div class="between-flex c-gray fs-14 pt-10">
                          <p>20/06/2020</p>
                          <p>5.5MB</p>
                      </div>
                   </div>

                   <div class="file rad-6 bg-white p-relative p-10">
                    <i class="fa-solid fa-upload c-gray fs-15 "></i>
                    <div class="flex-center column pb-10">
                        <img src="images/avi.svg" alt="">
                        <p class="mt-10">my-file.avi</p>
                    </div>
                    <p class="fs-14 c-gray pb-10">Ossama</p>
                    <div class="between-flex c-gray fs-14 pt-10">
                        <p>20/06/2020</p>
                        <p>8.5MB</p>
                    </div>
                   </div>

                   <div class="file rad-6 bg-white p-relative p-10">
                  <i class="fa-solid fa-upload c-gray fs-15 "></i>
                  <div class="flex-center column pb-10">
                      <img src="images/dll.svg" alt="">
                      <p class="mt-10">my-dll.svg</p>
                  </div>
                  <p class="fs-14 c-gray pb-10">Uploader</p>
                  <div class="between-flex c-gray fs-14 pt-10">
                      <p>20/06/2020</p>
                      <p>3MB</p>
                  </div>
                   </div>
 
                   <div class="file rad-6 bg-white p-relative p-10">
                <i class="fa-solid fa-upload c-gray fs-15 "></i>
                <div class="flex-center column pb-10">
                    <img src="images/eps.svg" alt="">
                    <p class="mt-10">my-file.eps</p>
                </div>
                <p class="fs-14 c-gray pb-10">Elhero</p>
                <div class="between-flex c-gray fs-14 pt-10">
                    <p>20/06/2020</p>
                    <p>5.5MB</p>
                </div>
                   </div>

                   <div class="file rad-6 bg-white p-relative p-10">
                    <i class="fa-solid fa-upload c-gray fs-15 "></i>
                    <div class="flex-center column pb-10">
                        <img src="images/png.svg" alt="">
                        <p class="mt-10">my-file.png</p>
                    </div>
                    <p class="fs-14 c-gray pb-10">Designer</p>
                    <div class="between-flex c-gray fs-14 pt-10">
                        <p>20/06/2020</p>
                        <p>3MB</p>
                    </div>
                    </div>

                   <div class="file rad-6 bg-white p-relative p-10">
                        <i class="fa-solid fa-upload c-gray fs-15 "></i>
                        <div class="flex-center column pb-10">
                            <img src="images/pdf.svg" alt="">
                            <p class="mt-10">my-file.pdf</p>
                        </div>
                        <p class="fs-14 c-gray pb-10">Elhero</p>
                        <div class="between-flex c-gray fs-14 pt-10">
                            <p>20/06/2020</p>
                            <p>5.5MB</p>
                        </div>
                   </div>

                   <div class="file rad-6 bg-white p-relative p-10">
                    <i class="fa-solid fa-upload c-gray fs-15 "></i>
                    <div class="flex-center column pb-10">
                        <img src="images/avi.svg" alt="">
                        <p class="mt-10">my-file.avi</p>
                    </div>
                    <p class="fs-14 c-gray pb-10">Elhero</p>
                    <div class="between-flex c-gray fs-14 pt-10">
                        <p>20/06/2020</p>
                        <p>4MB</p>
                    </div>
                   </div>

                   <div class="file rad-6 bg-white p-relative p-10">
                    <i class="fa-solid fa-upload c-gray fs-15 "></i>
                    <div class="flex-center column pb-10">
                        <img src="images/eps.svg" alt="">
                        <p class="mt-10">my-file.eps</p>
                    </div>
                    <p class="fs-14 c-gray pb-10">Elhero</p>
                    <div class="between-flex c-gray fs-14 pt-10">
                        <p>20/06/2020</p>
                        <p>8MB</p>
                    </div>
                   </div>

                   <div class="file rad-6 bg-white p-relative p-10">
                    <i class="fa-solid fa-upload c-gray fs-15 "></i>
                    <div class="flex-center column pb-10">
                        <img src="images/sql.svg" alt="">
                        <p class="mt-10">my-file.sql</p>
                    </div>
                    <p class="fs-14 c-gray pb-10">Admin</p>
                    <div class="between-flex c-gray fs-14 pt-10">
                        <p>20/06/2020</p>
                        <p>7MB</p>
                    </div>
                   </div>

                   <div class="file rad-6 bg-white p-relative p-10">
                    <i class="fa-solid fa-upload c-gray fs-15 "></i>
                    <div class="flex-center column pb-10">
                        <img src="images/avi.svg" alt="">
                        <p class="mt-10">my-file.avi</p>
                    </div>
                    <p class="fs-14 c-gray pb-10">Admin</p>
                    <div class="between-flex c-gray fs-14 pt-10">
                        <p>20/06/2020</p>
                        <p>9MB</p>
                    </div>
                   </div>

                   <div class="file rad-6 bg-white p-relative p-10">
                    <i class="fa-solid fa-upload c-gray fs-15 "></i>
                    <div class="flex-center column pb-10">
                        <img src="images/png.svg" alt="">
                        <p class="mt-10">my-file.png</p>
                    </div>
                    <p class="fs-14 c-gray pb-10">User</p>
                    <div class="between-flex c-gray fs-14 pt-10">
                        <p>20/06/2020</p>
                        <p>5.5MB</p>
                    </div>
                   </div>

                   <div class="file rad-6 bg-white p-relative p-10">
                    <i class="fa-solid fa-upload c-gray fs-15 "></i>
                    <div class="flex-center column pb-10">
                        <img src="images/dll.svg" alt="">
                        <p class="mt-10">my-file.dll</p>
                    </div>
                    <p class="fs-14 c-gray pb-10">Elhero</p>
                    <div class="between-flex c-gray fs-14 pt-10">
                        <p>20/06/2020</p>
                        <p>21MB</p>
                    </div>
                  </div>

                  
                </div> -->

      <!-- <div class="files-statics rad-6 bg-white p-20 mr-20">
                   <h2>File Statics</h2>

                   <div class="stat d-flex rad-6 p-5">
                  <i class="fa-solid fa-file-pdf c-blue fs-14 p-15 flex-center" ></i>
                  <div class="data between-flex p-5 ml-5 fs-14">
                    <div class="between-flex column fs-12">
                      <P>pdf files</P>
                      <span class="c-gray ">130</span>
                    </div>
                    <span class="c-gray">6.5GB</span>
                  </div>
                   </div>

                   <div class="stat d-flex rad-6 p-5 mt-10">
                    <i class="fa-solid fa-images c-red fs-14 p-15 flex-center" ></i>
                    <div class="data between-flex p-5 ml-5 fs-14">
                      <div class="between-flex column fs-12">
                        <P>images</P>
                        <span class="c-gray ">100</span>
                      </div>
                      <span class="c-gray">11.5GB</span>
                    </div>
                  </div>

                  <div class="stat d-flex rad-6 p-5 mt-10">
                    <i class="fa-solid fa-file-pdf c-green fs-14 p-15 flex-center" ></i>
                    <div class="data between-flex p-5 ml-5 fs-14">
                      <div class="between-flex column fs-12">
                        <P>pdf files</P>
                        <span class="c-gray ">130</span>
                      </div>
                      <span class="c-gray">6.5GB</span>
                    </div>
                  </div>

                  <div class="stat d-flex rad-6 p-5 mt-10">
                    <i class="fa-regular fa-file-word c-orange fs-14 p-15 flex-center"></i>
                    <div class="data between-flex p-5 ml-5 fs-14">
                      <div class="between-flex column fs-12">
                        <P>word files</P>
                        <span class="c-gray ">200</span>
                      </div>
                      <span class="c-gray">8GB</span>
                    </div>
                  </div> -->

      <div class="flex-center mt-20">
        <a href="#" class=" c-white p-10 bg-blue rad-6 fs-14 ">
          <i class="fa-solid fa-chevron-up mr-5 "></i>
          upload
        </a>
      </div>
    </div>
  </div>