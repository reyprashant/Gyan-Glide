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

<body>
    <div class="admission page d-flex">
        <?php
        require_once 'dashboard_navbar.php';
        ?>
        <div class="content d-flex  column">
            <?php
            require_once 'dashboard_header.php';
            ?>
            <h1 class="p-relative mt-10">Reviews</h1>

            <div class="container" style="position: relative; left:200px">
                <div class="row">
                    <form action="reviews.php" method="post">

                        <div>
                            <h3 style="font-family: Arial">Enjoying Gyan-Glide? Give us your Reviews</h3>
                            <h3 style="font-family: Arial">Your Review Matters</h3>
                        </div>

                        

                        <div class="rateyo" id="rating" data-rateyo-rating="4" data-rateyo-num-stars="5" data-rateyo-score="3">
                        </div>

                        <span class='result'>0</span>
                        <input type="hidden" name="rating">
            <label for="" class="fs-14 c-gray mb-10 d-block mt-15 ">What's Your Thoughts About Us</label>

            <textarea name="" id="" class="c-gray p-10 rad-6 fs-14 width-800" placeholder="your thought" style="height: 300px; width: 600px;"></textarea>
            <!-- <input type="submit" value="save" class="c-white bg-blue p-5 rad-6 bg-blue d-block fit-width fs-14"> -->
        </div>

                        <div><input type="submit" name="add"> </div>

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

</body>

</html>