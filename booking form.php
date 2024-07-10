<?php
@include 'dbconn.php';
session_start();
if (!$_SESSION['account'] == "user") {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Booking Form</title>
    <!-- Bootstrap CSS -->

    <style>
        /* Container */
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Row */
        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -10px;
            margin-left: -10px;
        }

        /* Columns */
        .col {
            flex: 0 0 100%;
            max-width: 100%;
            padding-right: 10px;
            padding-left: 10px;
        }

        /* Form Group */
        .form-group {
            margin-bottom: 20px;
        }

        /* Label */
        label {
            font-weight: bold;
        }

        /* Form Control */
        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease-in-out;
        }

        .form-control:focus {
            outline: none;
            border-color: #007bff;
        }

        /* Select */
        select.form-control {
            height: 40px;
        }

        /* Button */
        .btn {
            display: inline-block;
            font-weight: bold;
            color: #fff;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            user-select: none;
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            line-height: 1;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Primary Button */
        .btn-primary {
            background-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <script>
        // Reload the page every 10 seconds (10000 milliseconds)
        setInterval(function () {
            location.reload();
        }, 300000); // 10000 milliseconds = 10 seconds
    </script>
    <section>
        <span class="php"></span>
        <div class="container">
            <h1 class="mt-5"><u><b>Booking Your Tour Here!!</b></u></h1><br><br>
            <form id="bookingForm" action="bookingprocess.php" method="post" name="bookingform" target="_blank">

                <div class="form-group">
                    <label for="userid">Enter_Your_Name:</label>
                    <input type="text" class="form-control" name="userid" id="userid"
                        placeholder="Enter_Minimum_Five_letters_Your_Name" minlength="5" maxlength="20" required>
                </div>

                <div class="form-group">
                    <label for="emailid">Enter_Your_Gmail-id:</label>
                    <input type="email" class="form-control" name="emailid" value="<?php echo $_SESSION['email']; ?>"
                        placeholder="<?php echo $_SESSION['email']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="phone_No">Phone_No:</label>
                    <input type="text" class="form-control" name="phone_No" id="phone_No"
                        placeholder="Enter_10_Digit_Phone_No" minlength="10" maxlength="10" required>
                </div>
                <div class="form-group">
                    <label for="usernic">NIC_NO:</label>
                    <input type="text" class="form-control" name="usernic" id="usernic"
                        placeholder="Enter_Valid_Nic_No " minlength="12" maxlength="13" required>
                </div>

                <div class="form-group">
                    <label for="package">Select package:</label>
                    <select name="package" id="packages" class="form-control" required>
                        <option>Choice_One_Pack</option>
                        <option value="solo">Solo</option>
                        <option value="couple">Couple</option>
                        <option value="family">Family</option>
                        <option value="friend">Friends</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ondate">Today_Date:</label>
                    <input type="date" class="form-control" id="ondate" name="ondate" placeholder="Select_Today_Date"
                        required>
                </div>
                <div class="form-group">
                    <label for="bookingdate">Booking_Date:</label>
                    <input type="date" class="form-control" id="bookingdate" name="bookingdate"
                        placeholder="Select_Trip_Start_Date" required>
                </div>

                <div class="form-group">
                    <label for="personcount">No_Of_Person:</label>
                    <input type="number" class="form-control" id="personcount" name="personcount"
                        placeholder="Your_Select_Couple_pack_Or_Solo_pack_No_Need_To_Fill_This" required>
                </div>

                <div class="form-group">
                    <label for="tripdays">Select_Trip_Days:</label>
                    <select name="tripdays" id="tripdays" class="form-control" required>
                        <option>Minimum_Five_Days_Allow_To_Booking</option>
                        <option value="5">Five_Days</option>
                        <option value="10">Ten_Days</option>
                        <option value="15">Fifteen_Days</option>
                        <option value="30">One_Month</option>
                        <option value="60">Two_Months</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="place">Choice_Your_Place:</label>
                    <select name="place" id="place" class="form-control" required>
                        <option value="">Select_The_Visiting_District</option>
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

                <button class="btn btn-primary" type="submit" name="submit">Booking</button>
                <button class="btn btn-secondary" type="reset">Reset</button><br><br>

            </form>
        </div>
    </section>

    <script>
        document.getElementById('bookingForm').addEventListener('submit', function (event) {
            const userid = document.getElementById('userid').value.trim();
            const phoneNo = document.getElementById('phone_No').value.trim();
            const usernic = document.getElementById('usernic').value.trim();
            const bookingdate = document.getElementById('bookingdate').value;
            const ondate = document.getElementById('ondate').value;
            const personcount = document.getElementById('personcount').value;

            if (userid.length < 5 || userid.length > 20) {
                alert('Name must be between 5 and 20 characters.');
                event.preventDefault();
            }

            if (phoneNo.length !== 10 || isNaN(phoneNo)) {
                alert('Phone number must be exactly 10 digits.');
                event.preventDefault();
            }

            if (usernic.length < 12 || usernic.length > 13) {
                alert('NIC number must be between 12 and 13 characters.');
                event.preventDefault();
            }

            if (new Date(bookingdate) < new Date()) {
                alert('Booking date cannot be in the past.');
                event.preventDefault();
            }

            if (new Date(ondate) > new Date()) {
                alert('Today\'s date cannot be in the future.');
                event.preventDefault();
            }

            if (personcount <= 0) {
                alert('Number of persons must be greater than 0.');
                event.preventDefault();
            }
        });
    </script>

</body>

</html>