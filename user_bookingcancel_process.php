<?php
include ('dbconn.php');

if (isset($_POST['cancel'])) {
    $package_id1 = $_POST['package_id1'];
    $delete_sql = "DELETE FROM booking WHERE id = $package_id1";
    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('Successfully Booking Cancel')</script>";
        header('Location:bookingconformation.php');
    } else {
        echo "<script>alert('can't Cancel')</script>";
    }
}

$conn->close();
?>