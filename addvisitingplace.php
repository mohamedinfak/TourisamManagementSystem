<?php
include ('dbconn.php');
session_start();
if (!$_SESSION['account'] == "admin") {
    header('location:login.php');

}
$message = isset($_SESSION['message1']) ? $_SESSION['message1'] : '';
unset($_SESSION['message1']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage_visiting_places</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: inline-flex;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
            padding: 10px;
            /* Adjust padding */
        }

        /* Adjustments for Container */
        .container {
            margin-left: 280px;
            /* Ensure proper alignment with sidebar */
            width: 400px;
            overflow-x: hidden;
            padding: 20px;
        }

        .container-2 {
            margin-left: 60px;
            margin-top: 120px;
            width: auto;

            padding: 20px;
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

            var district = document.getElementById('district').value;
            var place = document.getElementById('place').value;
            var weblink = document.getElementById('weblink').value;
            var photo = document.getElementById('photo').value;
            var txtarea = document.getElementById('txt_area').value;

            var errorMsg = '';

            if (district == '') {
                errorMsg += 'Please select a district.\n';
            }

            if (place == '') {
                errorMsg += 'Please enter The place.\n';
            }
            if (weblink == '') {
                errorMsg += 'Please enter The weblink.\n';
            }

            if (photo == '') {
                errorMsg += 'Please upload a photo.\n';
            }

            if (txtarea == '') {
                errorMsg += 'Please enter a place description.\n';
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
            <h2>Add New visitingplaces </h2>
        </center><br><br>
        <form method="post" name="addtour" action="addvisitingplace_process.php" enctype="multipart/form-data" onsubmit="return validateForm()">

            <div class="form-group">
                <label for="district">Select_District:</label>
                <select class="form-control" id="district" name="district" required="">
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
                <label for="placename">Enter_The_placeName:</label>
                <input type="text" class="form-control-file" id="place" name="place" placeholder=" Visiting placeName"
                    required="Pls Enter The Place Name">
            </div>
            <div class="form-group">
                <label for="placename">Enter the website Hyperlink:</label>
                <input type="text" class="form-control-file" id="weblink" name="weblink" placeholder="website Hyperlink"
                    required="">
            </div>
            <div class="form-group">
                <label for="photo">Upload Photo:</label>
                <input type="file" class="form-control-file" id="photo" name="photo">
            </div>
            <div class="form-group">
                <textarea id="txt-area" class="input" id="txt_area" name="txtarea" rows="6" cols="35"
                    placeholder="place description" require=" place  enter The Description "
                    minlength="15"></textarea><br><br>
                <!-- Add more options as needed -->
                <button type="submit" name="submit" class="btn btn-primary">Add Visitingplace</button>
                <button type="reset" name="submit" class="btn btn-primary">Reset</button>
            </div>
        </form>
    </div>
    <!-- Handle Confirm and Delete Actions -->
    <!-- PHP code for handling confirm and delete actions goes here -->
    </div>
    <div class="container-2">
        <div class="card">
            <div class="card-header">
                Already_Visiting_Places

            </div>
            <div class="card-body">
                <!-- PHP code for displaying booking packages goes here -->

                <?php
                // Database connection
                

                // Retrieve booking packages from the database
                $sql = "SELECT * FROM visitingplace";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table class='table'>
                            <thead>
                                <tr>
                                    <th>visiting_place_ID</th>
                                    <th>Districts</th>
                                    <th>Place</th>
                                   
                                   
                                </tr>
                               
                            </thead>
                            <tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["districts"] . "</td>
                                <td>" . $row["place"] . "</td>
                               
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


    <!-- Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
