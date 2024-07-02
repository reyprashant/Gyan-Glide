<?php
@require_once '../connectionSetup.php';
session_start();

$sql = "SELECT * FROM `gyan_glide_reviews`";
$result = $conn->query($sql);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonials Slider</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="container">
        <div class="swiper-container">
            <div class="swiper-wrapper">
<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $std_id = $row['std_id'];
        $std_rating = $row['rating'];
        $std_message = $row['message'];

        $sql20 = "SELECT * FROM `student_images` where `std_id` = '$std_id'";
        $std_image = $conn->query($sql20);
        if ($std_image->num_rows > 0) {
            $main_img = mysqli_fetch_assoc($std_image);
            $std_img = $main_img['img_name'];
            } else {
              $std_img = 'default.jpg';
            }

        $sql20 = "SELECT * FROM `students` where `std_id` = '$std_id'";
        $student_info = $conn->query($sql20);
        $student = mysqli_fetch_assoc($student_info);
        $std_name = $student['name'];
        $std_prev_school = $student['prev_school'];
?>


<div class="swiper-slide">
                    <img src="../image_upload/std_uploads/<?php echo $std_img?>" alt="NO IMAGE">
                    <h3><?php echo $std_name?></h3>
                    <h4><?php echo $std_prev_school?> &nbsp;</h4>
                    <h4>Gyan-Glide</h4>
                    <div class="stars">
                        <?php
                        for($i = 0; $i<$std_rating; $i++){
                            echo "<span>★</span>";
                        }
                            ?>


                            
                    </div>
                    <p><?php echo $std_message?></p>
                </div>
<?php        
}
}


?>




                <div class="swiper-slide">
                    <img src="user2.png" alt="Prashant Adhikari">
                    <h3>Prashant Adhikari</h3>
                    <h4>LA GRANDEE International College</h4>
                    <h4>Gyan-Glide</h4>
                    <div class="stars"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                    <p>I was able to achieve scholarship with the help of this platform.</p>
                </div>


                <div class="swiper-slide">
                    <img src="user3.png" alt="Noah King">
                    <h3>Subash Adhikari</h3>
                    <h4>Pokhara University</h4>
                    <h4>Gyan-Glide</h4>
                    <div class="stars"><span>★</span><span>★</span><span>★</span><span>★</span></div>
                    <p>Join Gyan-Glide if you want your ideal college.</p>
                </div>


                <div class="swiper-slide">
                    <img src="user4.png" alt="Sophia Davis">
                    <h3>Ashmita G.C.</h3>
                    <h4>Software Developer</h4>
                    <h4>Gyan-Glide</h4>
                    <div class="stars"><span>★</span><span>★</span><span>★</span></div>
                    <p>Not only school and colleges but also other educational Institute. Gyan-Glide really does have huge network.</p>
                </div>


                <div class="swiper-slide">
                    <img src="user5.png" alt="James Smith">
                    <h3>XYZ</h3>
                    <h4>UnknownPost</h4>
                    <h4>Gyan-Glide</h4>
                    <div class="stars"><span>★</span><span>★</span></div>
                    <p>Have many bugs but really good website as a concept.</p>
                </div>


                <div class="swiper-slide">
                    <img src="user6.png" alt="Olivia Johnson">
                    <h3>XYZ</h3>
                    <h4>Gyan-Glide user</h4>
                    <h4>Gyan-Glide</h4>
                    <div class="stars"><span>★</span><span>★</span><span>★</span></div>
                    <p>Good Work.</p>
                </div>


                <div class="swiper-slide">
                    <img src="user7.png" alt="William Brown">
                    <h3>ABC</h3>
                    <h4>Gyan-Glide user</h4>
                    <h4>Gyan-Glide</h4>
                    <div class="stars"><span>★</span><span>★</span><span>★</span><span>★</span></div>
                    <p>A top-notch website that’s easy to use and has a range of fantastic features for displaying colleges.</p>
                </div>


                <div class="swiper-slide">
                    <img src="user8.png" alt="Isabella Garcia">
                    <h3>Akriti</h3>
                    <h4>ReviewExpert</h4>
                    <h4>Gyan-Glide</h4>
                    <div class="stars">★★★★</div>
                    <p>Outstanding website with excellent support.</p>
                </div>


            </div>
            <div class="swiper-pagination"></div>
            <!-- <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>
