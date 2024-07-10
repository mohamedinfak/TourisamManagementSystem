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
    <title>Delete_Packages</title>
    <style>
        body {
            display: inline-flex;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #2c3e50;
            padding-top: 30px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 15px;
        }

        .sidebar ul li a {
            color: #ffffff;
            text-decoration: none;
            display: block;
        }

        .sidebar ul li a:hover {
            background-color: #6495ED;
            border-radius: 30px;
            padding: 10px;
            font-size: 20px;
        }

        /* Adjustments for Table */


        th {
            text-align: center;
        }

        /* Adjustments for Card Header */
        .card-header {
            text-align: center;
            padding: 40px;

            /* Adjust padding */
        }

        /* Adjustments for Container */
        .container {
            margin-left: 280px;
            /* Ensure proper alignment with sidebar */
            width: 350px;
            padding: 20px;
        }

        .container-1 {
            margin-left: 50px;
            margin-top: 110px;
            /* Ensure proper alignment with sidebar */
            width: auto;
            padding: 20px;
        }

        /* Alternative CSS Design */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="number"],
        input[type="file"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        button[type="submit"],
        button[type="reset"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        button[type="reset"]:hover {
            background-color: lightcoral;
        }

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


        .card-body {
            width: auto;
            overflow-x: auto;
            /* Enable horizontal scrolling for small screens */
        }
    </style>
</head>

<body>

    <section>
    <?php @include 'AddminNv.php'; ?>
    </section>

    <div class="container">
        <center>
            <h2>Delete Tour Packages</h2>
        </center><br><br>
        <form method="post" name="addtour" enctype="multipart/form-data">
            <div class="form-group">
                <label for="package">Select Package:</label>
                <select class="form-control" id="package" name="package">
                    <option>Select</option>
                    <option value="solo">Solo </option>
                    <option value="cuple">Couple</option>
                    <option value="family">Family</option>
                    <option value="friend">Friends</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="district">Select District:</label>
                <select class="form-control" id="district" name="district">
                    <option value="">Districts</option>


                    <option value="Jaffna">Jaffna</option>
                    <option value="Anuradhapura">Anuradhapura</option>
                    <option value="Hambantota">Hambantota</option>
                    <option value="Ampara">Ampara</option>
                    <option value="Batticaloa">Batticaloa</option>
                    <option value="Kalutara">Kalutara</option>
                    <option value="Kandy">Kandy</option>
                    <option value="Kegalle">Kegalle</option>
                    <option value="Kilinochchi">Kilinochchi</option>
                    <option value="Mannar">Mannar</option>
                    <option value="Matale">Matale</option>
                    <option value="Mullaitivu">Mullaitivu</option>
                    <option value="NuwaraEliya">NuwaraEliya</option>
                    <option value="Colombo">Colombo</option>
                    <option value="Galle">Galle</option>
                    <option value="Kurunegala">Kurunegala</option>
                    <option value="Vavuniya">Vavuniya</option>
                    <option value="Badulla">Badulla</option>
                    <option value="Matara">Matara</option>
                    <option value="Polonnaruwa">Polonnaruwa</option>
                    <option value="Gampaha">Gampaha</option>
                    <option value="Monaragala">Monaragala</option>
                    <option value="Ratnapura">Ratnapura</option>
                    <option value="Puttalam">Puttalam</option>
                </select>
                <!-- Add more options as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="tripdays">Select Trip Days:</label>
                <select name="tripdays" id="tripdays" class="form-control">
                    <option>Choice</option>
                    <option value="5">Five_Days</option>
                    <option value="10">Ten_Days</option>
                    <option value="15">Fifteen_Days</option>
                    <option value="30">One_Month</option>
                    <option value="60">Two_Months</option>
                    <!-- Add more options as needed -->
                </select>
            </div>


            <div class="form-group">

                <!-- Add more options as needed -->

                <button type="submit" name="delete" class="btn btn-primary">Delete packages</button>
                <button type="reset" name="reset" class="btn btn-primary">Reset</button>
            </div>
        </form>

    </div>
    <div class="container-1">

        <div class="form-group">

            <div class="card">
                <div class="card-header">
                    Providing TourPacks
                </div>
                <div class="card-body">
                    <!-- PHP code for displaying booking packages goes here -->

                    <?php
                    // Database connection
                    

                    // Retrieve booking packages from the database
                    $sql = "SELECT * FROM tourpack";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<table class='table'>
                            <thead>
                                <tr>
                                    <th>Package_ID</th>
                                    <th>Package_Name</th>
                                    <th> Districts</th>
                                    <th>Tripdays</th>
                                   
                                </tr>
                               
                            </thead>
                            <tbody>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["packages"] . "</td>
                                <td>" . $row["districts"] . "</td>
                                <td>" . $row["tripdays"] . "</td>
                                
                                

                            </tr>";

                        }
                        echo "</tbody></table>";

                    } else {
                        echo "No booking packages available.";
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<?php




// Check if the form is submitted
if (isset($_POST['delete'])) {
    // Collect form data

    $package = $_POST["package"];
    $district = $_POST["district"];
    $tripdays = $_POST["tripdays"];
    $_SESSION['msg'] = "The Record";
    // Delete  Database
    $sql = "DELETE FROM tourpack WHERE packages='$package' AND districts='$district' AND tripdays='$tripdays'";

    if (mysqli_query($conn, $sql)) {

        echo "The Record Delete successfully";
    } else {
        $msg = "Error: " . $sql . "<br>" . mysqli_error($conn);
        $_SESSION['msg'] = $msg;
    }
}
?>