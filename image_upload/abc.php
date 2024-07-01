<?php 

    # database connection file
	include '../connectionSetup.php';

	# fetching images
	$sql  = "SELECT img_name FROM
	         college_images ORDER BY img_name DESC";

	$stmt = $conn->prepare($sql);
	$stmt->execute();
    $result = $stmt->get_result();
    $images = $result->fetch_all(MYSQLI_ASSOC);

 ?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="upload.php" enctype="multipart/form-data">
          <?php  
            if (isset($_GET['error'])) {
            	echo "<p class='error'>";
            	    echo htmlspecialchars($_GET['error']);
            	echo "</p>";
            }
	    ?>
          <input type="file" name="images[]" multiple id="">
          <button type="submit" name= "upload">Upload</button>
</form>    


<?php if ($result->num_rows > 0) { ?>
	<div class="gallery">
		<h4>All Images</h4>
		<?php foreach ($images as $image) { ?>
		   <img src="uploads/<?=$image['img_name']?>">
		<?php } ?>
	</div>
	<?php } ?>

</body>
</html>