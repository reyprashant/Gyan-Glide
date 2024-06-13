<?php
@include 'connectionSetup.php';
session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <nav class="sidebar">
            <h1>Gyan-Glide</h1>
            <!-- <img src="logo.png" alt="logo" style="width: 400px; align-self: center; margin-right: 500px;"> -->
            <ul>
                <li style="margin-top: 50px;"><a href="#">Home</a></li>
                <li><a href="#">Colleges</a></li>
                <li><a href="#">Graduate Schools</a></li>
                <li><a href="#">My College List</a></li>
                <li><a href="#">My Preferences</a></li>
                <li><a href="#">Find Scholarships</a></li>
                <li><a href="#">Personal Info</a></li>
                <li><a href="#">High School Academics</a></li>
            </ul>
        </nav>
        <div class="main-content">
            <header>
                <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
                <h1>Hi <span id="loggedUsername"><?php echo $_SESSION['current_user'];?></span></h1>
            </header>
            <div class="content">
                <h2>Welcome to your college journey.</h2>
                <div class="matches">
                    <h3>Today's Matches</h3>
                    <p>Like or dismiss to improve your results.</p>
                </div>
                <div class="next-steps">
                    <h3>Next Steps</h3>
                    <ul>
                        <li>Tell us what you’re looking for in a school so that we can help you find your best fit.</li>
                        <li>Save 3-6 schools to your college list. Most students apply to 6-12 schools.</li>
                        <li>Add your test scores to see your admission chances when you view a school.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('active')
        }
    </script>
</body>
</html>
