<?php
@include 'dbconn.php';
session_start();
if (!$_SESSION['account'] == "user") {
    header('location:login.php');
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User Booking Status Details </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #007bff;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 17px;
        }

        .navbar a:hover {
            background-color: #575757;
        }

        .navbar .btn {
            float: right;
            margin: 10px;
            padding: 10px;
            border: none;
            background-color: white;
            color: #007bff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }

        .navbar .btn:hover {
            background-color: #575757;
            color: white;
        }

        .container {
            padding: 20px;
        }

        .card {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border-bottom: 1px solid #007bff;
            border-radius: 8px 8px 0 0;
        }

        .card-body {
            padding: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 5px;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .table td {
            vertical-align: middle;
         
        }

        .btn {
            padding: 4px 5px;
            font-size: 15px;
            width: 100px;
            border-radius: 70px;
            cursor: pointer;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
            border: 1px solid #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border: 1px solid #218838;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
            border: 1px solid #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border: 1px solid #c82333;
        }

        #btn {
            border-radius: 50%;
            background-color: red;
            color: white;
            padding: 20px;

        }
    </style>
</head>

<body>
    <script>
        // Reload the page every 10 seconds (10000 milliseconds)
        setInterval(function () {
            location.reload();
        }, 100000); // 100000 milliseconds = 1 minite
    </script>
    <section class="section-1">
        <?php @include 'header.php' ?>
    </section>

    <div class="container">
        <h2>
            <center><b>Master Travels Tour Booking Details User View</b></center>
        </h2>
        <div class="card">
            <div class="card-header">
                <b>Booking Status</b>
            </div>
            <div class="card-body">
                <?php
                // Database connection
                

                $mail = $_SESSION['email'];


                $sql1 = "SELECT * FROM booking WHERE Email_id ='$mail'";
                $result = $conn->query($sql1);

                if ($result->num_rows > 0) {
                    echo "<table class='table'>
                    <thead>
                        <tr>
                        <th>Booking ID</th>
                        <th>Customer Name</th>
                        <th>NIC NO</th>
                        <th>Email</th>
                        <th>Package Name</th>
                        <th>Tour Place</th>
                         <th>Trip Days</th>
                        <th>Trip Amount</th>
                        <th>Touris Count</th>
                        <th>Booking Date</th>
                        <th>Booking Register Date</th>
                        <th>Action</th>
                        <th>Cancel</th>
                        </tr>
                    </thead>
                    <tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>" . $row["id"] ."</td>
                        <td>" . $row["User_name"] . "</td>
                        <td>" . $row["user_nic_no"]."</td>
                        <td>" . $row["Email_id"]. "</td>
                        <td>" . $row["Package"]."</td>
                        <td>" . $row["place"]."</td>
                        <td>" . $row["Trip_days"]."</td>
                        <td>" . $row["tripamount"]."</td>
                        <td>" . $row["touriscount"]."</td>
                        <td>" . $row["bookingdate"]."</td>
                        <td>" . $row["ondate"]."</td>
                        <td>" . $row["status"]."</td>
                        <td>
                            <form method='POST' action='user_bookingcancel_process.php'>
                                <input type='hidden' name='package_id1' value='" . $row["id"] . "'>
                                <button type='submit' name='cancel' class='btn btn-danger'>Cancel Booking</button>
                            </form>
                        </td>
                        </tr>";
                    }
                    echo "</tbody></table>";
                }

                $sql2 = "SELECT * FROM bookingconfirmed WHERE Email_id ='$mail'";
                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
                    echo "<table class='table'>
                    <thead>
                        <tr>
                        <th>Booking ID</th>
                        <th>Customer Name</th>
                        <th>NIC NO</th>
                        <th>Email</th>
                        <th>Package Name</th>
                        <th>Tour Place</th>
                        <th>Trip Days</th>
                        <th>Touris Count</th>
                        <th>Booking Date</th>
                        <th>Booking Register Date</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>";
                    while ($row = $result2->fetch_assoc()) {
                        echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["user_name"] . "</td>
                        <td>" . $row["user_nic_no"] . "</td>
                        <td>" . $row["Email_id"] . "</td>
                        <td>" . $row["package"] . "</td>
                        <td>" . $row["place"] . "</td>
                        <td>" . $row["Trip_days"] . "</td>
                        <td>" . $row["touriscount"] . "</td>
                        <td>" . $row["bookingdate"] . "</td>
                        <td>" . $row["ondate"] . "</td>
                        <td>" . $row["status"] . "</td>
                        <td>
                            <form method='POST' action='payprocesses.php'>
                                <input type='hidden' name='package_id2' value='" . $row["id"] . "'>
                                <button type='submit' name='pay' class='btn btn-success'>Pay Here</button>
                            </form>
                        </td>
                        </tr>";
                    }
                    echo "</tbody></table>";
                }

                $sql3 = "SELECT * FROM bookingcancel WHERE Email_id ='$mail'";
                $result3 = $conn->query($sql3);
                if ($result3->num_rows > 0) {
                    echo "<table class='table'>
                    <thead>
                        <tr>
                        <th>Booking ID</th>
                        <th>Customer Name</th>
                        <th>NIC NO</th>
                        <th>Email</th>
                        <th>Package Name</th>
                        <th>Tour Place</th>
                        <th>Trip Days</th>
                        <th>Touris Count</th>
                        <th>Booking Date</th>
                        <th>Booking Register Date</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>";
                    while ($row = $result3->fetch_assoc()) {
                        echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["user_name"] . "</td>
                        <td>" . $row["user_nic_no"] . "</td>
                        <td>" . $row["Email_id"] . "</td>
                        <td>" . $row["package"] . "</td>
                        <td>" . $row["place"] . "</td>
                        <td>" . $row["Trip_days"] . "</td>
                        <td>" . $row["touriscount"] . "</td>
                        <td>" . $row["bookingdate"] . "</td>
                        <td>" . $row["ondate"] . "</td>
                        <td>" . $row["status"] . "</td>
                        <td>
                            <form method='POST' action='hotlineprocesses.php'>
                                <input type='hidden' name='package_id3' value='" . $row["id"] . "'>
                                <button type='submit' name='contact' class='btn btn-success'>Contact</button>
                            </form>
                        </td>
                        </tr>";
                    }
                    echo "</tbody></table>";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>

