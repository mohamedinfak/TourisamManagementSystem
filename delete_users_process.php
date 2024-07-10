<?php
// Include the database connection file
include ('dbconn.php');

if (isset($_POST["delete"])) {
    $username = $_POST['username'];
    $email = $_POST['email'];


    // Delete the product with the given ID from the database
    $sql = "DELETE FROM registerform WHERE email = '$email' and username='$username'";

    if ($conn->query($sql) === TRUE) {
        header("Location: delete_users.php");
    } else {
        echo "<script>alert('Can't Cancel Booking')";
    }
  
    exit();
}
?>
