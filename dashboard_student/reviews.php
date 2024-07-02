<?php
@require_once '../connectionSetup.php';
session_start();
if (!isset($_SESSION['std_id'])) {
    header('location:../loginpage.php');
    die();
}

$std_id = $_SESSION['std_id'];
$sql = "SELECT * from gyan_glide_reviews Where std_id = $std_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = mysqli_fetch_array($result);
    $prev_rating = $row['rating'];
    $prev_message = $row['message'];
    $new_review = false;
} else {
    $prev_rating = "2.5";
    $prev_message = "";
    $new_review = true;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_review'])) {

        $rating = $_POST['rating'];
        $message = $_POST['review_msg'];
        if ($new_review) {
            $sql = "INSERT INTO `gyan_glide_reviews`(`std_id`, `rating`, `message`) VALUES ($std_id,'$rating','$message')";
        } else {
            $sql = "UPDATE `gyan_glide_reviews` SET `rating`='$rating',`message`='$message' WHERE std_id = $std_id";
        }
        if ($conn->query($sql)) {
            $review_status = "Review recorded Successfully";
            echo "<script>alert('{$review_status}');</script>";
            header("Location: ../reviews/index.php");
        } else {
            $review_status = "Failed to update reviews. Please try again.";
            echo "<script>alert('{$review_status}');</script>";
            header("Location: reviews.php?error=$em");
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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Rubik:wght@300;400;600;900&family=Work+Sans:wght@300;400;500;600;800&display=swap" rel="stylesheet">
    <title>Reviews</title>
</head>

<body style="background-color: rgb(173, 255, 255);">
    <div class="admission page d-flex">
        <?php
        require_once 'dashboard_navbar.php';
        ?>
        <div class="content d-flex  column">
            <?php
            require_once 'dashboard_header.php';
            ?>
            <h1 class="p-relative mt-10">Reviews</h1>

            <div class="container" style="position: relative; left:200px;">
                <div class="row">
                    <form action="reviews.php" method="post">

                        <div style="display: flex; align-content: center; flex-direction: column; justify-content: center;">
                            <h1 style="font-family: Arial">Enjoying Gyan-Glide? Give us your Reviews</h1>
                            <img src="bgimage.png" alt="" height="300px" width="500px">
                            <!-- <h3 style="font-family: Arial">Your Review Matters</h3> -->
                        </div>



                        <div class="rateyo" id="rating" data-rateyo-rating="<?php echo $prev_rating; ?>" data-rateyo-num-stars="5" data-rateyo-score="3">
                        </div>

                        <!-- <span class='result'>0</span> -->
                        <input type="hidden" name="rating" value="<?php echo $prev_rating; ?>">
                        <label for="" class="fs-14 c-gray mb-10 d-block mt-15 ">What's Your Thoughts About Us</label>

                        <textarea name="review_msg" id="" class="c-gray p-10 rad-6 fs-14 width-800" placeholder="your thought" style="height: 100px; width: 500px;"><?php echo $prev_message; ?></textarea>
                        <!-- <input type="submit" value="save" class="c-white bg-blue p-5 rad-6 bg-blue d-block fit-width fs-14"> -->
                </div>

                <div><input type="submit" name="add_review" value="Submit" style="background-color: teal; color: white; border-radius: 6px; font-size: 15px; display: block; width: fit-content; text-decoration: none; margin-top: 10px"> </div>

                </form>
            </div>
        </div>
    </div>
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

    </div>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>

</html>