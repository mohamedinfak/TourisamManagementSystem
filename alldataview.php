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
            margin-left: 280px;
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
            margin-left: 280px;
            /* Ensure proper alignment with sidebar */
            padding: 20px;
        }

        .card-body {
            width: auto;
            overflow-x: auto;
            /* Enable horizontal scrolling for small screens */
        }

        .btn {
            width: 120PX;
            height: 40PX;
            color: #f2f2f2;
            background-color: green;
            border-radius: 100px;


        }

        .btn:hover {
            background-color: gold;
            color: black;
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
            <center> Viwe All System Data</center>
        </h2>
        <!-- Display Booking Packages -->
        <div class="card">
            <div class="card-header">
                Register_Account_Details

            </div>
            <div class="card-body">
                <section class="section-3" id="user-details">

                    <div class="contain-1">
                        <form action="" method="post">
                            <div class="div-nv"><button type="submit" class="btn"
                                    name="btnRegister">Show-user-data</button>
                                <div class="table-1"> <?php


                                if (isset($_POST["btnRegister"])) {


                                    $tbname = "registerform";

                                    echo retrieveData($tbname);
                                }
                                ?></div>
                            </div>
                        </form>
                    </div>

                </section><!-- PHP code for displaying booking packages goes here -->

            </div>
        </div><BR></BR></BR>

        <div class="card">
            <div class="card-header">
                Touris Compalints Details
            </div>
            <div class="card-body">
                <!-- PHP code for displaying booking packages goes here -->


                <section class="section-3" id="user-details">

                    <div class="contain-1">
                        <form action="" method="post">
                            <div class="div-nv"><button type="submit" class="btn"
                                    name="btnCompalints">Show-Touris-Compalints </button>
                                <div class="table-1"> <?php


                                if (isset($_POST["btnCompalints"])) {


                                    $tbname = "Enquiries";

                                    echo retrieveData($tbname);
                                }
                                ?></div>
                            </div>
                        </form>
                    </div>

                </section>
            </div>
        </div>
        <BR></BR></BR>


        <div class="card">
            <div class="card-header">
                Touris Feedback Details
            </div>
            <div class="card-body">
                <!-- PHP code for displaying booking packages goes here -->





                <div class="contain-1">
                    <form action="" method="post">
                        <div class="div-nv"><button type="submit" class="btn"
                                name="btnFeedback">Show-user-Feedback</button>
                            <div class="table-1"> <?php


                            if (isset($_POST["btnFeedback"])) {


                                $tbname = "feedback";

                                echo retrieveData($tbname);
                            }
                            ?></div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <BR></BR></BR>









        <div class="card">
            <div class="card-header">
                Touris Payments Details
            </div>
            <div class="card-body">
                <!-- PHP code for displaying booking packages goes here -->


                <section class="section-3" id="user-details">

                    <div class="contain-1">
                        <form action="" method="post">
                            <div class="div-nv"><button type="submit" class="btn"
                                    name="btnPayments">Show-Touris-Payments-Details</button>
                                <div class="table-1"> <?php


                                if (isset($_POST["btnPayments"])) {


                                    $tbname = "payments";

                                    echo retrieveData($tbname);
                                }
                                ?></div>
                            </div>
                        </form>
                    </div>

                </section>
            </div>
        </div>







    </div>




</body>

</html>