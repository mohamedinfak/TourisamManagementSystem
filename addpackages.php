<?php
include ('dbconn.php');
session_start();
if (!$_SESSION['account'] == "admin") {
    header('location:login.php');
}

$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
unset($_SESSION['message']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_New_Packages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: inline-flex;
        }

        /* Adjustments for Table */
        table {
            width: 100%;
            text-align: center;
        }

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
            margin-left: 250px;
            /* Ensure proper alignment with sidebar */
            width: 300px;
            padding: 20px;
        }

        .container-2 {
            margin-left: 20px;
            margin-top: 120px;
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

        button[type="submit"] {
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
    <script>
        function validateForm() {
            var package = document.getElementById('package').value;
            var district = document.getElementById('district').value;
            var tripdays = document.getElementById('tripdays').value;
            var dayAmount = document.getElementById('dayAmount').value;
            var numberOfPersons = document.getElementById('numberOfPersons').value;
            var photo = document.getElementById('photo').value;
            var txtarea = document.getElementById('txt-area').value;

            var errorMsg = '';

            if (package == 'Select') {
                errorMsg += 'Please select a package.\n';
            }

            if (district == '') {
                errorMsg += 'Please select a district.\n';
            }

            if (tripdays == 'Choice') {
                errorMsg += 'Please select trip days.\n';
            }

            if (dayAmount == '' || dayAmount <= 0) {
                errorMsg += 'Please enter a valid day amount.\n';
            }

            if (numberOfPersons == '' || numberOfPersons <= 0) {
                errorMsg += 'Please enter a valid number of persons.\n';
            }

            if (photo == '') {
                errorMsg += 'Please upload a photo.\n';
            }

            if (txtarea == '') {
                errorMsg += 'Please enter a package description.\n';
            }

            if (errorMsg) {
                alert(errorMsg);
                return false;
            }

            return true;
        }
        window.onload = function () {
            var message = "<?php echo $message; ?>";
            if (message === "success") {
                alert("New Package Added successfully !");
            } else if (message === "failure") {
                alert("New Package Added failure. Please try again.");
            }
            else if (message === "alreadyAvailabalepack") {
                alert("Already Available in This Pacakge do Changes in The Adding Package.");
            }
            else if (message === "can'tuploadfile") {
                alert("You can't upload files of this type");
            }
            else if (message === "unknown_error") {
                alert("unknown error occurred!");
            }
            else if (message === "largefile") {
                alert("Sorry, your file is too large!");
            }

        }
    </script>
</head>

<body>

    <?php @include 'AddminNv.php'; ?>

    <div class="container">
        <center>
            <h2>Add New Tour Packages</h2>
        </center><br><br>
        <form method="post" action="addpackagespreccess.php" name="addtour" enctype="multipart/form-data"
            onsubmit="return validateForm()">
            <div class="form-group">
                <label for="package">Select Package:</label>
                <select class="form-control" id="package" name="package">
                    <option>Select</option>
                    <option value="solo">Solo </option>
                    <option value="couple">Couple</option>
                    <option value="family">Family</option>
                    <option value="friend">Friends</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="district">Select District:</label>
                <select class="form-control" id="district" name="district">
                    <option value="">Select</option>
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
            </div>
            <div class="form-group">
                <label for="tripdays">Select Trip Days:</label>
                <select name="tripdays" id="tripdays" class="form-control">
                    <option>Choice</option>
                    <option value="5">Five Days</option>
                    <option value="10">Ten Days</option>
                    <option value="15">Fifteen Days</option>
                    <option value="30">One Month</option>
                    <option value="60">Two Months</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="dayAmount">Enter Day Amount:</label>
                <input type="number" class="form-control" id="dayAmount" name="dayAmount"
                    placeholder="Enter The day Of Amount">
            </div>
            <div class="form-group">
                <label for="numberOfPersons">Enter Number of Persons:</label>
                <input type="number" class="form-control" id="numberOfPersons" name="numberOfPersons"
                    placeholder="Enter number of persons">
            </div>
            <div class="form-group">
                <label for="photo">Upload Photo:</label>
                <input type="file" class="form-control-file" id="photo" name="photo">
            </div>
            <div class="form-group">
                <textarea id="txt-area" class="input" name="txtarea" rows="6" cols="50"
                    placeholder="Package description" require="add package description enter"></textarea><br><br>
                <button type="submit" name="submit" class="btn btn-primary">Add packages</button>
            </div>
        </form>
    </div>
    <div class="container-2">
        <div class="card">
            <div class="card-header">
                Available_Tour_Packs

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
                                    <th>Packages</th>
                                    <th>Districts</th>
                                    <th>No_of_pearson</th>
                                    <th>Day_Amount</th>
                                    <th>Trip_Days</th>
                                </tr>
                            </thead>
                            <tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["packages"] . "</td>
                                <td>" . $row["districts"] . "</td>
                                <td>" . $row["no_of_pearson"] . "</td>
                                <td>" . $row["day_amount"] . "</td>
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

</body>

</html>