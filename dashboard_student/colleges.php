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
            
            <h1 class="p-relative mt-10">Colleges</h1>
            
        </div>
    </div>

</body>
</html>