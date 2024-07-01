<?php

if (isset($_POST['upload'])) {
    require_once '../connectionSetup.php';
    $images = $_FILES['images'];

    $num_of_imgs = count($images['name']);
    echo $num_of_imgs;

    for ($i = 0; $i < $num_of_imgs; $i++) {

        # get the image info and store them in var
        $image_name = $images['name'][$i];
        $tmp_name   = $images['tmp_name'][$i];
        $error      = $images['error'][$i];

        # if there is not error occurred while uploading
        if ($error === 0) {
            # get image extension store it in var
            $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);

    		/** 
			convert the image extension into lower case 
			and store it in var 
			**/
			$img_ex_lc = strtolower($img_ex);



                        /** 
			crating array that stores allowed
			to upload image extensions.
			**/
			$allowed_exs = array('jpg', 'jpeg', 'png');


			/** 
			check if the the image extension 
			is present in $allowed_exs array
			**/



			if (in_array($img_ex_lc, $allowed_exs)) {
				/** 
				 renaming the image name with 
				 with random string
				**/
				$new_img_name = uniqid('IMG-', true).'.'.$img_ex_lc;


                
                # crating upload path on root directory
                $img_upload_path = 'uploads/'.$new_img_name;

                # inserting imge name into database
				$sql  = "INSERT INTO college_images (clz_id, img_name) VALUES (?, ?)";
				$stmt = $conn->prepare($sql);
				$stmt->execute([1,$new_img_name]);
				

                # move uploaded image to 'uploads' folder
                move_uploaded_file($tmp_name, $img_upload_path);

		    	# redirect to 'index.php'
	            header("Location: abc.php");


			}else {
				# error message
    	     	$em = "You can't upload files of this type";

	    		/*
		    	redirect to 'index.php' and 
		    	passing the error message
		        */

	            header("Location: abc.php?error=$em");
			}



        } else {
            # error message
            $em = "Unknown Error Occurred while uploading";

            /*
	    	redirect to 'index.php' and 
	    	passing the error message
	        */

            header("Location: abc.php?error=$em");
        }
    }
}
?>