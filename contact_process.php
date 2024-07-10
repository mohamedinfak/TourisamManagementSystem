<?php
include ('dbconn.php');
session_start();


if (isset($_POST['submit'])) {
    $username = $_POST["name"];
    $mail = $_POST["email"];
    $date = $_POST["date"];
    $txtarea = $_POST["txtarea"];

    $query = "INSERT INTO Enquiries (Email_id,User_name,complaint,IncidentDate) VALUES (' $mail ',' $username','$txtarea', '$date')";
    $fi = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if ($fi == false) {
        echo "<span>The query failed</span>";
        exit();
    } else {
        header('Location: home.php');
    }

    mysqli_close($conn);
}
?>