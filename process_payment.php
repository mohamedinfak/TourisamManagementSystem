<?php
// Database connection
include ('dbconn.php');
session_start();
// Retrieve form data
$card_holder = mysqli_real_escape_string($conn, $_POST['card_holder']);
$card_number = mysqli_real_escape_string($conn, $_POST['card_number']);
$expiry_date = mysqli_real_escape_string($conn, $_POST['expiry_date']);
$cvv = mysqli_real_escape_string($conn, $_POST['cvv']);
$login_email = $_SESSION['email']; // Assuming 'email' is the name attribute of the email input field in your form

// SQL query to insert payment details into database
$sql = "INSERT INTO payments (card_holder, card_number, expiry_date, cvv) VALUES ('$card_holder', '$card_number', '$expiry_date', '$cvv')";

if (mysqli_query($conn, $sql)) {

    $check_sql = "SELECT * FROM bookingconfirmed WHERE Email_id = '$login_email'";
    $result2 = $conn->query($check_sql);

    if ($result2->num_rows > 0) {

        while ($row = $result2->fetch_assoc()) {
            $id = $row["id"];
            $username = $row["user_name"];
            $nic = $row["user_nic_no"];
            $email = $row["Email_id"];
            $pack = $row["package"];
            $location = $row["place"];
            $tripdays = $row["Trip_days"];
            $tripamount = $row["tripamount"];
            $contactno = $row["contactno"];
            $mambers = $row["touriscount"];
            $bookingdate = $row["bookingdate"];
            $ondate = $row["ondate"];
            $status = $row["status"];

            $bookingconfirmed = "INSERT INTO Paymentsconfirmation (user_name, Email_id, place, Trip_days, ondate, bookingdate, package, status, touriscount, user_nic_no, tripamount, contactno, id) 
                                VALUES ('$username', '$email', '$location', '$tripdays', '$ondate', '$bookingdate', '$pack', '$status', '$mambers', '$nic', '$tripamount', '$contactno', '$id')";

            if ($conn->query($bookingconfirmed) === TRUE) {
                echo "Booking confirmed and copied to Paymentsconfirmation.";
                $id_retrive_sql = "SELECT id FROM Paymentsconfirmation WHERE Email_id = '$login_email' AND id= $id";
                $result3 = $conn->query($id_retrive_sql);

                if ($result3->num_rows > 0) {

                    while ($row = $result3->fetch_assoc()) {
                        $peyment_id = $row["id"];
                        $_SESSION['id_copy'] = $peyment_id;

                    }
                    $sql_delete = "DELETE FROM bookingconfirmed WHERE id = $id";
                    if ($conn->query($sql_delete) === TRUE) {
                        echo "Record successfully separated.";
                        header('Location:pdfdoc.php');
                        exit; // After redirection, make sure to exit to prevent further execution
                    } else {
                        echo "Error separating record: " . $conn->error;
                    }
                }

            } else {
                echo "Error copying booking to Paymentsconfirmation : " . $conn->error;
            }
        }
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>