<?php
include ('dbconn.php');
session_start();

if (isset($_POST["submit"])) {
    // Retrieve form data
    $username = $_POST["userid"];
    $usernic = $_POST["usernic"];
    $mail = $_POST["emailid"];
    $contact_no = $_POST["phone_No"];
    $pack = $_POST["package"];
    $place = $_POST["place"];
    $nodays = $_POST["tripdays"];
    $touriscount = $_POST["personcount"];
    $bookingdate = $_POST['bookingdate'];
    $livedate = $_POST['ondate'];

    // Fetch day amount from database
    $sql_query = "SELECT day_amount FROM tourpack  WHERE packages = '$pack' AND districts = '$place' And tripdays='$nodays'";
    $res = mysqli_query($conn, $sql_query);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $dayamount = $row["day_amount"];

        // Calculate total amount
        $totalamount = $dayamount * $nodays * $touriscount;

        $sql_check = "SELECT * FROM booking  WHERE Email_id = '$mail'";
        $result = mysqli_query($conn, $sql_check);
        if (mysqli_num_rows($result) > 0) {
            echo "Your Already Have  booking panding so Try Again later";
            exit;

        }


        // Insert data into database
        $query = "INSERT INTO booking (user_name, Email_id, package, place, Trip_days, ondate, bookingdate, touriscount, user_nic_no,tripamount,contactno) VALUES ('$username', '$mail', '$pack', '$place', '$nodays', '$livedate', '$bookingdate', '$touriscount', '$usernic', '$totalamount','$contact_no')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Redirect to booking confirmation page
            $_SESSION['username'] = $username;
            $_SESSION['usernic'] = $usernic;
            $_SESSION['mail'] = $mail;
            $_SESSION['pack'] = $pack;
            $_SESSION['place'] = $place;
            $_SESSION['nodays'] = $nodays;
            $_SESSION['touriscount'] = $touriscount;
            $_SESSION['bookingdate'] = $bookingdate;
            $_SESSION['livedate'] = $livedate;
            $_SESSION['totalamount'] = $totalamount;

            header('location: bookingconformation.php');
            exit();
        } else {
            // Display error message
            echo 'Failed to insert data into database: ' . mysqli_error($conn);
        }
    } else {
        // Display error message if no rows found
        echo 'We Are Not Provide This Package. SO Try To Book Other Packages';
    }

    // Close database connection
    mysqli_close($conn);
}
?>