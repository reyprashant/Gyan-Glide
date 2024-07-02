<?php
require_once '../connectionSetup.php';
session_start();
if (!isset($_SESSION['std_id'])) {
    header('location:../index.php');
    die();
}
$std_id = $_SESSION['std_id'];
$sql = "SELECT clz_id FROM admission where std_id = $std_id";
$result22 = $conn->query($sql);
$colleges_ids = [];
if ($result22->num_rows > 0) {
    while ($rowww = $result22->fetch_array()) {
        array_push($colleges_ids, $rowww['clz_id']);
    }
    $clz_ids = implode(', ', $colleges_ids);
    $sql = "SELECT * from college_info where `clz_id` IN (" . $clz_ids . ")";
} else {
}

$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete'])) {
        $clz_id = $_POST['clz_id'];
        $sql1 = "DELETE FROM `admission` WHERE std_id = $std_id and clz_id = $clz_id";

        if ($conn->query($sql1) === TRUE) { // update data into college_info table
            $updated_message = "Admission Deleted Successfully";
            header("Location: admission.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
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
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/table_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Rubik:wght@300;400;600;900&family=Work+Sans:wght@300;400;500;600;800&display=swap" rel="stylesheet">
    <title>Admission</title>
</head>

<body style="background-color: rgb(173, 255, 255);">

    <div class="courses page d-flex">
        <?php
        require_once 'dashboard_navbar.php';
        ?>

        <div class="content d-flex  column">
            <?php
            require_once 'dashboard_header.php';
            ?>
            <h1 class="p-relative mt-10">Admission</h1>

            <div class="header_fixed">


                <table>
                    <thead>

                        <tr>
                            <th>S No.</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Website</th>
                            <th>College Type</th>
                            <th>Status</th>
                            <th colspan="1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($row = $result->fetch_assoc()) {

                            $all_college_types = array('Profitable', 'Non-Profitable', 'Private', 'Government', 'NGO', 'INGO');
                            $selected_type = $row['college_type'];
                            $selected_faculties = (explode(", ", $row['faculties']));
                            $facilities = (explode(", ", $row['facilities']));

                            $clz_id = $row['clz_id'];
                            $sql = "SELECT status FROM admission where std_id = $std_id and clz_id = $clz_id";
                            $result22 = $conn->query($sql);
                            $admission_status = $result22->fetch_assoc();
                            $std_status = $admission_status['status'];    //0 not accepted 1 accepted
                            if ($std_status) {
                                $status_text = "Accepted";
                                $action_button_text = "Reject";
                            } else {
                                $status_text = "Not Accepted";
                                $action_button_text = "Accept";
                            }

                            $sql = "SELECT * FROM college_main_images WHERE clz_id= $clz_id";
                            $college_image_data = $conn->query($sql);
                            if ($college_image_data->num_rows > 0) {
                                $college_image_array = mysqli_fetch_array($college_image_data);
                                $college_image = $college_image_array['main_img'];
                                $college_logo = $college_image_array['logo'];
                            } else {
                                $college_image = 'default.jpg';
                                $college_logo = 'default.jpg';
                            }

                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><img src="../image_upload/clz_logo/<?php echo $college_logo; ?>" /></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['website']; ?></td>
                                <td><?php echo $row['college_type']; ?></td>
                                <td><?php echo $status_text ?></td>
                                <td>
                                    <form action="admission.php" method="post">
                                    <input type="hidden" name="clz_id" class="c-gray p-10 rad-6 fs-14 f-width" value="<?php echo $clz_id; ?>">
                                        <button id="delete<?php echo $clz_id ?>" name="delete">Delete</button>
                                    </form>
                                </td>
                            </tr>

                        <?php
                            $i++;
                        }

                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>