
<?php

include ('dbconn.php');
session_start();

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $mail = $_POST['email'];
    $txtarea = $_POST['txtarea'];
    $performance = $_POST['radio'];


    $query = "INSERT INTO feedback (username,email,feedback,performance)VALUES ('$username', '$mail','$txtarea','$performance')";

    $fi = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if ($fi == false) {
        $_SESSION['msg'] = "The query failed.";
        exit();
    } else {
        $_SESSION['msg'] = "success Data Entry";
        
        header('location:home.php');
    }                                               


    mysqli_close($conn);

}










?>