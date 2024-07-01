<?php
require_once '../connectionSetup.php';
session_start();
if (isset($_POST['heart'])) {

    $std_id = $_SESSION['std_id'];
    $clz_id = $_POST['data'];

    $sql_first = "SELECT * FROM college_info where clz_id = $clz_id";
    $college = $conn->query($sql_first);
    $college_row = mysqli_fetch_assoc($college);
    $total_likes = $college_row['liked_by'];


    $sql = "SELECT `std_id`,`clz_id` FROM `liked_colleges` where `std_id` = '$std_id' and `clz_id` = '$clz_id'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {

        $sql2 = "UPDATE `college_info` SET `liked_by`= liked_by+1 WHERE `clz_id` = $clz_id ";


        if ($conn->query($sql2) === TRUE) {  // Insert data into liked_colleges table
            $sql3 = "INSERT INTO `liked_colleges`(`std_id`, `clz_id`) VALUES ('$std_id','$clz_id') ";
            if ($conn->query($sql3) === TRUE) {
                $total_likes++;
                echo $total_likes;
            }
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($result->num_rows == 1) {
        $sql4 = "UPDATE `college_info` SET `liked_by`= liked_by-1 WHERE `clz_id` = $clz_id ";
        if ($conn->query($sql4) === TRUE) {  // update liked_by count into colleges_info table

            $sql5 = "DELETE FROM `liked_colleges` WHERE `std_id` = '$std_id' and `clz_id` ='$clz_id'";
            if ($conn->query($sql5) === TRUE) {   //delete data from liked_colleges table
                $total_likes--;
                echo $total_likes;
            }
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {

            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}


