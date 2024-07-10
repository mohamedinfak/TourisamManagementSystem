
<?php
session_start();
include('dbconn.php');

if (isset($_POST["register"])) {

    $username =  $_POST["uname1"];
    $email =  $_POST["email"];
    $password1 = md5($_POST["upswd1"]);
    $password2 = md5($_POST["upswd2"]);
    $gender = $_POST["sex"];
    $actype= $_POST["type"];

    if ($password1 == $password2) {
        if ($gender == "Male" || $gender == "Female") {
            $query = "INSERT INTO registerform (username,email,password,passwordcnf,gender,actype) VALUES ('$username', '$email', '$password1', '$password2', '$gender','$actype')";
            
            $result = mysqli_query($conn, $query);

            if ($result) {
                header('Location:login.php');
                exit();
            } else {
                $msg='Error: Unable to register. Please try again.';
                $_SESSION['msg']=$msg;
            }
        } else {
            $error='Please select a valid gender.';
            $_SESSION['errormsg']=$error;
        }
    } else {
        $error='Please select a valid gender.';
            $_SESSION['errormsg']=$error;;
    }

    mysqli_close($conn);
}
?>

