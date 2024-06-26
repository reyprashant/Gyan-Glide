<?php
$successMsg = "";
require 'connectionSetup.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        // Signup form data
        $name = $_POST['collegeName'];
        $address = $_POST['collegeAddress'];
        $site = $_POST['collegeSiteLink'];
        $phone = $_POST['representativePhone'];
        $add_info = $_POST['additionalInfo'];

        $sql = "INSERT INTO college (name, address, site, phone, add_info) VALUES ('$name', '$address', '$site', '$phone', '$add_info')";
        if ($conn->query($sql) === TRUE) { // Insert data into signup table
            $successMsg = "Info successfully recorded and is verified by admin.";
            echo "<script> window.location.href = 'joinusSubmit.html'; </script>";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
           
       
    }
}
$conn->close();

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="articles/findperfect.css">
    <style>
        /* Additional styles can be added here if needed */
    </style>
</head>
<body>

<div class="container">
    <div class="navbar">
        <img src="images/logo.png" alt="logo" class="logo">
        <a href="loginpage.php" target="_self"><button class="getstarted">GET STARTED</button></a>
    </div>

    <div class="formcontent" style="display: flex; align-items: center; justify-content: space-around;">
        <img src="images/joinus.png" alt="joinus" style="width: 400px;">

        <!-- College Information Form -->
        <form action="#" method="post">
            <label for="collegeName">College Name:</label><br>
            <input type="text" id="collegeName" name="collegeName" required><br><br>

            <label for="collegeAddress">College Address:</label><br>
            <input type="text" id="collegeAddress" name="collegeAddress" required><br><br>

            <label for="collegeSiteLink">College Website Link:</label><br>
            <input type="text" id="collegeSiteLink" name="collegeSiteLink" required><br><br>

            <label for="representativePhone">Representative's Phone Number:</label><br>
            <input type="text" id="representativePhone" name="representativePhone" placeholder="XXX-XXX-XXXX" pattern="[0-9]{1}[0-9]{9}" required><br><br>

            <label for="additionalInfo">Additional Information:</label><br>
            <textarea id="additionalInfo" name="additionalInfo" rows="4" placeholder="Provide any additional details about the college (e.g., programs offered, campus life, unique features)"></textarea><br><br>

            <input type="submit" value="Submit" name = "submit">
            <input type="button" value="Cancel" onclick="window.location.href='index.html';">
            <div id="error-message" class="error-message">
                    <span><?php echo $successMsg; ?></span>
                    </div>
        </form>
    </div>
</div>

<footer>
    <div class="footerContainer">
        <div style="display: flex; align-items: center; justify-content: center;">
            <img src="images/whitelogo.png" alt="" style="object-fit: cover; width: 250px; height: 150px; margin-left: 20px;">
        </div>
        <div class="footerNav">
            <div>
                <h3 style="color: white; text-align: center; margin-bottom: 20px;">Contact Us</h3>
                <p style="color: whitesmoke;margin-bottom: 10px;"><i class="fa-solid fa-phone"></i>&nbsp;&nbsp;&nbsp;&nbsp; 061-521165</p>
                <p style="color: whitesmoke;margin-bottom: 10px;"><i class="fa-solid fa-phone"></i>&nbsp;&nbsp;&nbsp;&nbsp; +977 9832753574</p>
                <p style="color: whitesmoke;margin-bottom: 10px;"><i class="fa-regular fa-envelope"></i>&nbsp;&nbsp;&nbsp; gyanglide24@gmail.com</p>
            </div>
            <div style="margin-right: 70px;">
                <h3 style="color: white; text-align:center; margin-bottom: 20px;">Follow Us</h3>
                <div class="socialIcons">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-github"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>
            <div>
                <h3 style="color: white; text-align:center; margin-bottom: 20px;">Our Team</h3>
                <p style="color: whitesmoke;">Prashant Adhikari <br> Akriti Dhakal <br> Sushan Poudel <br> Suraj Sapkota</p>
            </div>
        </div>
        <div style="display: flex; align-items: center; justify-content: center; border-top: 1px solid white; color: white; padding: 20px;">
            <i class="fa-regular fa-copyright"></i>&nbsp; &nbsp; Gyan-Glide,&nbsp; All Rights Reserved
        </div>
    </div>
</footer>

</body>
</html>
