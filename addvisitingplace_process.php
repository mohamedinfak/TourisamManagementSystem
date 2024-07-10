<?php


include ('dbconn.php');
session_start();

// Check if the form is submitted
if (isset($_POST['submit']) && isset($_FILES['photo'])) {
    // Collect form data

    $district = $_POST["district"];
    $place = $_POST["place"];
    $weblink = $_POST["weblink"];
    $description = $_POST["txtarea"];


    // File upload
    $img_name = $_FILES['photo']['name'];
    $img_type = $_FILES['photo']['type'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $error = $_FILES['photo']['error'];
    $img_size = $_FILES['photo']['size'];


    if ($error === 0) {
        if ($img_size > 500000) {
            $_SESSION['message'] = "largefile";
            header("Location: addpackages.php?error=$em");
            exit();
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = "visitingplace/" . $new_img_name;
                echo "<script>alert('$img_upload_path')</script>";
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database
                $sql = "INSERT INTO visitingplace(districts, place,placedescription,imagepathe,weblink)
                        VALUES ('$district', '$place','$description','$new_img_name','$weblink')";

                if (mysqli_query($conn, $sql)) {
                    
                    $_SESSION['message1'] = "success";
                    header("Location: addvisitingplace.php");
                } else {
                    $_SESSION['message1'] = "failure";
                }
            } else {
                $_SESSION['message1'] = "can'tuploadfile";

                header("Location: addpackages.php?error=$em");
                exit();
            }
        }
    } else {

        $_SESSION['message1'] = "unknown_error";
        header("Location: addpackages.php?error=$em");
        exit();
    }
} else {
    //header("Location:addpackages.php");
    exit();
}
?>