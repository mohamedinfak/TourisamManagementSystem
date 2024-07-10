<!-- dashboard.php -->
<?php
@include 'dbconn.php';
session_start();
if (!$_SESSION['account'] == "admin") {
    header('location:login.php');
} ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Records Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="visitingplacestyle.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }



        .container {
            margin-left: 250px;
            padding: 20px;
        }

        .card {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 20px;
            height: 100%;
            /* Ensure all cards have the same height */
            box-sizing: border-box;
            /* Include padding and border in the height */
            background-color: greenyellow;
        }

        .card-title {
            margin-bottom: 10px;
        }

        .card-text {
            color: red;
            font-size: large;
            font: bold;
            padding: 5px;

        }
    </style>
</head>

<body>
    <script>
        // Reload the page every 10 seconds (10000 milliseconds)
        setInterval(function () {
            location.reload();
        }, 10000); // 10000 milliseconds = 10 seconds
    </script>
    <?php @include 'AddminNv.php'; ?>

    <div class="container mt-5">
        <h1>Database Records Counts</h1>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-title">New_Bookings_Orders</h5>
                    <?php


                    // Query to get count of records from Table 1
                    $sql = "SELECT COUNT(*) AS count FROM booking";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo "<p class='card-text'>Total Records: " . $row["count"] . "</p>";
                    ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-title">Feedback_Counts</h5>
                    <?php


                    // Query to get count of records from Table 1
                    $sql = "SELECT COUNT(*) AS feed FROM feedback";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo "<p class='card-text'>Total Records: " . $row["feed"] . "</p>";
                    ?>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-title">Booking_Rejection_Counts</h5>
                    <?php


                    // Query to get count of records from Table 1
                    $sql = "SELECT COUNT(*) AS count FROM bookingcancel";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo "<p class='card-text'>Total Records: " . $row["count"] . "</p>";
                    ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-title">Booking_Confirmed_Counts</h5>
                    <?php


                    // Query to get count of records from Table 1
                    $sql = "SELECT COUNT(*) AS feed FROM bookingconfirmed";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo "<p class='card-text'>Total Records: " . $row["feed"] . "</p>";
                    ?>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-title">Enquiries_Counts</h5>
                    <?php


                    // Query to get count of records from Table 1
                    $sql = "SELECT COUNT(*) AS count FROM Enquiries";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo "<p class='card-text'>Total Records: " . $row["count"] . "</p>";
                    ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-title">Payments_Confirmation_Counts</h5>
                    <?php


                    // Query to get count of records from Table 1
                    $sql = "SELECT COUNT(*) AS feed FROM Paymentsconfirmation";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo "<p class='card-text'>Total Records: " . $row["feed"] . "</p>";
                    ?>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-title">Register_Account_Counts</h5>
                    <?php


                    // Query to get count of records from Table 1
                    $sql = "SELECT COUNT(*) AS count FROM registerform";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo "<p class='card-text'>Total Records: " . $row["count"] . "</p>";
                    ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-title">Tour_Packs_Counts</h5>
                    <?php


                    // Query to get count of records from Table 1
                    $sql = "SELECT COUNT(*) AS feed FROM tourpack";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo "<p class='card-text'>Total Records: " . $row["feed"] . "</p>";
                    ?>
                </div>
            </div>
        </div>

</body>

</html>