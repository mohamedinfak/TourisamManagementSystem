<?php
include ('dbconn.php');
session_start();
if (!$_SESSION['account'] == "admin") {
    header('location:login.php');
}

function retrieveData($tableName)
{
    global $conn;
    $query = "SELECT * FROM $tableName";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));


    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table-1' border='1'>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($row as $key => $value) {
                echo "<th><b>$key</b></th>";


                echo "<td> $value</td>";

            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No data available.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> View all system data</title>
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
        .container {
            margin-left: 220px;
            /* Ensure proper alignment with sidebar */
            padding: 10px;
        }


        /* Adjustments for Table */
        table {
            width: 100%;
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
            <center> User Report Information</center>
        </h2>
        <!-- Display Booking Packages -->

        <div class="card">
            <div class="card-header">
                Touris Compalints Details
            </div>
            <div class="card-body">
                <!-- PHP code for displaying booking packages goes here -->


                <section class="section-3" id="user-details">

                    <div class="contain-1">
                        <form action="" method="post">
                            <div class="div-nv">
                                <div class="table-1"> <?php





                                $tbname = "Enquiries";

                                echo retrieveData($tbname);
                                ?></div>
                            </div>
                        </form>
                    </div>

                </section>
            </div>
        </div>





</body>

</html>