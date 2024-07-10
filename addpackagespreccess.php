<?php


@include 'dbconn.php';

// Start session
session_start();

// Check if the form is submitted
if (isset($_POST['submit']) && isset($_FILES['photo'])) {
    // Collect form data
    $package = $_POST["package"];
    $district = $_POST["district"];
    if ($package == "Solo Pack") {
        $_SESSION["value"] = '1';
        $numberOfPersons = $_SESSION["value"];
    } elseif ($package == "Couples Pack") {
        $_SESSION["value"] = '2';
        $numberOfPersons = $_SESSION["value"];
    } else {
        $numberOfPersons = $_POST["numberOfPersons"];
    }

    $tripdays = $_POST["tripdays"];
    $dayAmount = $_POST["dayAmount"];
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
                $img_upload_path = "photos/" . $new_img_name;
                echo "<script>alert('$img_upload_path')</script>" ;
                move_uploaded_file($tmp_name, $img_upload_path);


                $check_sql = "SELECT * FROM tourpack WHERE packages='$package' AND districts='$district' AND no_of_pearson='$numberOfPersons' AND day_amount='$dayAmount'AND tripdays='$tripdays'";
                $result = mysqli_query($conn, $check_sql);

                if (mysqli_num_rows($result) == 0) {
                    $sql = "INSERT INTO tourpack (packages, districts, no_of_pearson,day_amount,tripdays,tourdescription,imagepathe)
                VALUES ('$package','$district',$numberOfPersons,$dayAmount,$tripdays,'$description','$new_img_name')";

                    if (mysqli_query($conn,$sql)){
                        $_SESSION['message'] = "success";
                        header("Location:addpackages.php");
                    } else {
                        $_SESSION['message'] = "failure";
                    }


                } else {
                    $_SESSION['message'] = "alreadyAvailabalepack";
                    exit;
                }

                // Insert into Database


            } else {
                $_SESSION['message'] = "can'tuploadfile";
                header("Location: addpackages.php?error=$em");
                exit();
            }
        }
    } else {
        $_SESSION['message'] = "unknown_error";
        header("Location: addpackages.php?error=$em");
        exit();
    }
} else {
    //header("Location:addpackages.php");
    exit();
}
?>