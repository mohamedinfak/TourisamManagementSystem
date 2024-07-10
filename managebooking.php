<?php
include ('dbconn.php');
session_start();
if (!$_SESSION['account'] == "admin") {
    header('location:login.php');
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Managebooking data</title>
    <!-- Bootstrap CSS -->

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }


        /* Adjustments for Table */
        table {
            width: auto;
            text-align: center;
        }

        th {
            text-align: center;
        }

        strong {
            color: red;
        }

        /* Adjustments for Card Header */
        .card-header {
            text-align: center;
            padding: 10px;
        }

        /* Adjustments for Container */



        /* Adjustments for Table */
        table {
            width: auto;
            border-collapse: collapse;
            border-spacing: 0;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        /* Adjustments for Card Header */
        .card-header {
            text-align: center;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
        }

        /* Adjustments for Container */
        .container {
            margin-left: 270px;
            /* Ensure proper alignment with sidebar */
            padding: 10px;
        }

        .card-body {
            width: auto;
            overflow-x: auto;
            /* Enable horizontal scrolling for small screens */
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

    <div class="container">
        <h2>
            <center>Tourism Management System Manage Booking</center>
        </h2>
        <!-- Display Booking Packages -->
        <div class="card">
            <div class="card-header">
                Users Booking Tours
                <div><strong><?php echo $_SESSION['msg']; ?></strong></div>
            </div>
            <div class="card-body">
                <!-- PHP code for displaying booking packages goes here -->

                <?php
                // Database connection
                

                // Retrieve booking packages from the database
                $sql = "SELECT * FROM booking";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table class='table'>
                            <thead>
                                <tr>
                                    <th>Booking ID</th>
                                    <th>Customer Name</th>
                                    <th> NIC_NO</th>
                                    <th>Email</th>
                                    <th>Phone_NO</th>
                                    <th>Package Name</th>
                                    <th>Tour Place</th>
                                    <th>Trip Days</th>
                                    <th>Trip  Amount</th>
                                    <th>Touris count</th>
                                    <th>Booking Date</th>
                                    <th>Booking RegisterDate</th>
                                    <th>Action</th>
                                </tr>
                               
                            </thead>
                            <tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["User_name"] . "</td>
                                <td>" . $row["user_nic_no"] . "</td>
                                <td>" . $row["Email_id"] . "</td>
                                <td>" . $row["contactno"] . "</td>
                                <td>" . $row["Package"] . "</td>
                                <td>" . $row["place"] . "</td>
                                <td>" . $row["Trip_days"] . "</td>
                                <td>" . $row["tripamount"] . "</td>
                                <td>" . $row["touriscount"] . "</td>
                                <td>" . $row["bookingdate"] . "</td>
                                <td>" . $row["ondate"] . "</td>
                                <td>
                                    <form method='POST' action=''>
                                        <input type='hidden' name='package_id' value='" . $row["id"] . "'>
                                        <button type='submit' name='confirm' class='btn btn-success'>Confirm</button>
                                        <button type='submit' name='delete' class='btn btn-danger'>Cancel</button>
                                    </form>
                                </td>
                            </tr>";

                    }
                    echo "</tbody></table>";

                } else {
                    echo "No booking packages available.";
                }

                ?>
            </div>
        </div><br><br>

        <div class="card">
            <div class="card-header">
                Confirm Booking Tours

            </div>

            <div class="card-body">
                <!-- PHP code for displaying booking packages goes here -->


                <?php
                // Database connection
                

                // Retrieve booking packages from the database
                $sql = "SELECT * FROM bookingconfirmed ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table class='table'>
                            <thead>
                                <tr>
                                    <th>Booking ID</th>
                                    <th>Customer Name</th>
                                    <th> NIC_NO</th>
                                    <th>Email</th>
                                    <th>Phone_NO</th>
                                    <th>Package Name</th>
                                    <th>Tour Place</th>
                                    <th>Trip  Days</th>
                                    <th>Trip  Amount</th>
                                    <th>NO of touris</th>
                                    <th>Booking  Date</th>
                                    <th>Register Date</th>
                                    <th>Booking  Status</th>
                                </tr>
                            </thead>
                            <tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["user_name"] . "</td>
                                <td>" . $row["user_nic_no"] . "</td>
                                <td>" . $row["Email_id"] . "</td>
                                <td>" . $row["contactno"] . "</td>
                                <td>" . $row["package"] . "</td>
                                <td>" . $row["place"] . "</td>
                                <td>" . $row["Trip_days"] . "</td>
                                <td>" . $row["tripamount"] . "</td>
                                <td>" . $row["touriscount"] . "</td>
                                <td>" . $row["bookingdate"] . "</td>
                                <td>" . $row["ondate"] . "</td>
                                <td>" . $row["status"] . "</td>
                                <td>
                                    
                                </td>
                            </tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No confirmed booking packages available.";
                }

                ?>
            </div>
        </div><br><br>

        <div class="card">
            <div class="card-header">
                Cancel Booking Tours
            </div>
            <div class="card-body">
                <!-- PHP code for displaying booking packages goes here -->


                <?php
                // Database connection
                

                // Retrieve booking packages from the database
                $sql = "SELECT * FROM bookingcancel ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table class='table'>
                            <thead>
                                <tr>
                                    <th>Booking ID</th>
                                    <th>Customer Name</th>
                                    <th> NIC_NO</th>
                                    <th>Email</th>
                                    <th>Phone_NO</th>
                                    <th>Package Name</th>
                                    <th>Tour Place</th>
                                    <th>Trip  Days</th>
                                    <th>Trip  Amount</th>
                                    <th>NO of touris</th>
                                    <th>Booking  Date</th>
                                    <th>Register Date</th>
                                    <th>Booking  Status</th>
                                </tr>
                            </thead>
                            <tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["user_name"] . "</td>
                                <td>" . $row["user_nic_no"] . "</td>
                                <td>" . $row["Email_id"] . "</td>
                                <td>" . $row["contactno"] . "</td>
                                <td>" . $row["package"] . "</td>
                                <td>" . $row["place"] . "</td>
                                <td>" . $row["Trip_days"] . "</td>
                                <td>" . $row["tripamount"] . "</td>
                                <td>" . $row["touriscount"] . "</td>
                                <td>" . $row["bookingdate"] . "</td>
                                <td>" . $row["ondate"] . "</td>
                                <td>" . $row["status"] . "</td>
                                <td>
                                    
                                </td>
                            </tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No cancel booking packages available.";
                }

                ?>
            </div>
        </div><br><br>



        <div class="card">
            <div class="card-header">
                Confirm Booking Tours Paymentsconfirmation
            </div>
            <div class="card-body">
                <!-- PHP code for displaying booking packages goes here -->


                <?php
                // Database connection
                

                // Retrieve booking packages from the database
                $sql = "SELECT * FROM Paymentsconfirmation ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table class='table'>
                            <thead>
                                <tr>
                                    <th>Booking ID</th>
                                    <th>Customer Name</th>
                                    <th> NIC_NO</th>
                                    <th>Email</th>
                                    <th>Phone_NO</th>
                                    <th>Package Name</th>
                                    <th>Tour Place</th>
                                    <th>Trip  Days</th>
                                    <th>TriAamount</th>
                                    <th>NO of touris</th>
                                    <th>Booking  Date</th>
                                    <th>Register Date</th>
                                    <th>Booking  Status</th>
                                </tr>
                            </thead>
                            <tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["user_name"] . "</td>
                                <td>" . $row["user_nic_no"] . "</td>
                                <td>" . $row["Email_id"] . "</td>
                                <td>" . $row["contactno"] . "</td>
                                <td>" . $row["package"] . "</td>
                                <td>" . $row["place"] . "</td>
                                <td>" . $row["Trip_days"] . "</td>
                                <td>" . $row["tripamount"] . "</td>
                                <td>" . $row["touriscount"] . "</td>
                                <td>" . $row["bookingdate"] . "</td>
                                <td>" . $row["ondate"] . "</td>
                                <td>" . $row["status"] . "</td>
                                <td>
                                    
                                </td>
                            </tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No confirmed booking packages available.";
                }

                ?>
            </div>
        </div>





        <!-- Handle Confirm and Delete Actions -->

        <!-- PHP code for handling confirm and delete actions goes here -->
        <?php
        // Handle confirm and delete actions
        
        if (isset($_POST['confirm'])) {

            $package_id = $_POST["package_id"];
            $sql_confirm = "UPDATE booking SET status = 'confirmed' WHERE id = $package_id";
            if ($conn->query($sql_confirm) === TRUE) {
                $msg = "Package ID " . $package_id . " confirmed.";

                $sql = "SELECT * FROM booking WHERE id = $package_id";
                $sqlresult = $conn->query($sql);
                if ($sqlresult->num_rows > 0) {
                    $row = $sqlresult->fetch_assoc();
                    $user_name = $row["User_name"];
                    $user_nic = $row["user_nic_no"];
                    $Email_id = $row["Email_id"];
                    $contact_no = $row["contactno"];
                    $tourpackage = $row["Package"];
                    $place = $row["place"];
                    $Trip_days = $row["Trip_days"];
                    $touriscount = $row["touriscount"];
                    $ondate = $row["ondate"];
                    $bookingdate = $row["bookingdate"];
                    $bookingstatus = $row["status"];
                    $tripamount = $row["tripamount"];
                    $_SESSION['booking'] = $bookingstatus;

                    $sql_check = "SELECT * FROM bookingconfirmed WHERE Email_id='$Email_id' ";
                    $check_result = mysqli_query($conn, $sql_check);
                    if (mysqli_num_rows($check_result) > 0) {
                        $msg = "Alredy have panding booking payment  so You cant conformid this booking!!!";
                        $_SESSION['msg'] = $msg;
                        exit;
                    }

                    $bookingconfirmed = "INSERT INTO bookingconfirmed (user_name, Email_id, place, Trip_days, ondate, bookingdate,package,status,touriscount,user_nic_no,tripamount,contactno) VALUES ('$user_name', '$Email_id', '$place', '$Trip_days', '$ondate', '$bookingdate',' $tourpackage','$bookingstatus','$touriscount',' $user_nic','$tripamount','$contact_no')";


                    if ($conn->query($bookingconfirmed) === TRUE) {

                        echo "Booking confirmed and copied to confirmed bookings.";
                        $sql_delete = "DELETE FROM booking WHERE id = $package_id";
                        if ($conn->query($sql_delete) === TRUE) {
                            echo "Bookingdata successfully separated.";
                        } else {
                            echo "Error Bookingdata separated: " . $conn->error;
                        }

                    } else {

                        echo "Error copying booking to confirmed bookings: " . $conn->error;
                    }
                } else {
                    echo "No booking found with ID: " . $package_id;
                }
            } else {
                echo "Error confirming package: " . $conn->error;
            }
        }


        if (isset($_POST['delete'])) {

            $package_id = $_POST["package_id"];
            $sql_confirm = "UPDATE booking SET status = 'cancel' WHERE id = $package_id";
            if ($conn->query($sql_confirm) === TRUE) {
                $msg = "Package ID " . $package_id . " canceled.";

                $sql = "SELECT * FROM booking WHERE id = $package_id";
                $sqlresult = $conn->query($sql);
                if ($sqlresult->num_rows > 0) {
                    $row = $sqlresult->fetch_assoc();
                    $user_name = $row["User_name"];
                    $user_nic = $row["user_nic_no"];
                    $Email_id = $row["Email_id"];
                    $contact_no = $row["contactno"];
                    $tourpackage = $row["Package"];
                    $place = $row["place"];
                    $Trip_days = $row["Trip_days"];
                    $touriscount = $row["touriscount"];
                    $ondate = $row["ondate"];
                    $bookingdate = $row["bookingdate"];
                    $bookingstatus = $row["status"];
                    $tripamount = $row["tripamount"];
                    $_SESSION['booking'] = $bookingstatus;
                    $bookingcancel = "INSERT INTO bookingcancel (user_name, Email_id, place, Trip_days, ondate, bookingdate,package,status,touriscount,user_nic_no,tripamount,contactno) VALUES ('$user_name', '$Email_id', '$place', '$Trip_days', '$ondate', '$bookingdate',' $tourpackage','$bookingstatus','$touriscount',' $user_nic','$tripamount','$contact_no')";


                    if ($conn->query($bookingcancel) === TRUE) {

                        echo "Booking canceled and copied to canceled bookings.";
                        $sql_delete = "DELETE FROM booking WHERE id = $package_id";
                        if ($conn->query($sql_delete) === TRUE) {
                            echo "Cancel Bookingdata successfully separated.";
                        } else {
                            echo "Error  CancelBookingdata separated: " . $conn->error;
                        }

                    } else {

                        echo "Error copying booking to cancel bookings: " . $conn->error;
                    }
                } else {
                    echo "No booking found with ID: " . $package_id;
                }
            } else {
                echo "Error canceling package: " . $conn->error;
            }
        }



        $conn->close();
        ?>

    </div>




</body>

</html>