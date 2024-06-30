<?php
require_once '../connectionSetup.php';
session_start();
if (isset($_POST['how'])) {

    $std_id = $_SESSION['std_id'];

    // $std_id = 1;

    $post_id = $_POST['data'];  //clz_id

    $sql = "SELECT `std_id`,`colleges_liked` FROM `students` where `std_id` = '$std_id' and `colleges_liked` = '$post_id'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {

        $sql2 = "UPDATE `college_info` SET `liked_by`= liked_by+1 WHERE `clz_id` = $post_id ";

        if ($conn->query($sql2) === TRUE) { // Insert data into signup table
            $sql3 = "UPDATE `students` SET `colleges_liked`='$post_id' WHERE `std_id` = $std_id ";

            if ($conn->query($sql3) === TRUE) { // Insert data into signup table
                echo "liked";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {

            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($result->num_rows > 0) {
        
        echo "disliked";
    }
}
