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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../dashboard_student/css/index.css">
    <link rel="stylesheet" href="../dashboard_student/css/framework.css">
    <link rel="stylesheet" href="../dashboard_student/css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
<?php
// require_once '../dashboard_student/dashboard_navbar.php';
while ($colleges_row = mysqli_fetch_assoc($result)) {

 

?>



    <div class="card">

        <div class="card-header">
            <img src="kma.jpeg" alt="University Image">
            <div class="icon">
                <img src="logo.png" alt="Icon">
            </div>
            <button class="heart" onclick="toggleHeart(this)">
                <i class="fa-regular fa-heart"></i>
            </button>
        </div>

        <div class="card-body">
            <h3><?php echo $colleges_row['name'];?></h3>
            <p>Pokhara</p>
        </div>
        <div class="card-footer">
            <div class="card-footer-item">
                <p><?php echo $colleges_row['address'];?></p>
            </div>
            <div class="card-footer-item">
                <p><?php echo $colleges_row['certification'];?></p>
            </div>
            <div class="card-footer-item">
                <p><?php echo $colleges_row['level'];?></p>
                <p><?php echo $colleges_row['courses'];?></p>
            </div>
        </div>
    </div> 

    <?php
 }
    ?>


    <script>
    function toggleHeart(button) {
        button.classList.toggle('active');
    }
    </script>
    
</body>
</html>