<?php
include('dbconn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tourism Management System Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Tourism Management System Admin Panel</h2>
        <!-- Display Booking Packages -->
        <div class="card">
            <div class="card-header">
                Booking Packages
            </div>
            <div class="card-body">
                <?php
                // Database connection
                include ('dbconn.php');

                // Retrieve booking packages from the database
                $sql = "SELECT * FROM booking";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table class='table'>
                            <thead>
                                <tr>
                                <th>Booking ID</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Package Name</th>
                                <th>Tour Place</th>
                                <th>Trip Days</th>
                                <th>Booking Date</th>
                                <th>On Date</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>".$row["id"]."</td>
                                <td>".$row["User_name"]."</td>
                                <td>".$row["Email_id"]."</td>
                                <td>".$row["Package"]."</td>
                                <td>".$row["place"]."</td>
                                <td>".$row["Trip_days"]."</td>
                                <td>".$row["bookingdate"]."</td>
                                <td>".$row["ondate"]."</td>
                                <td>
                                    <form method='POST' action=''>
                                        <input type='hidden' name='package_id' value='".$row["id"]."'>
                                        <button type='submit' name='confirm' class='btn btn-success'>Confirm</button>
                                        <button type='submit' name='delete' class='btn btn-danger'>Delete</button>
                                    </form>
                                </td>
                            </tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No booking packages available.";
                }
                $conn->close();
                ?>
            </div>
        </div>
        <!-- Handle Confirm and Delete Actions -->
        <?php
        // Handle confirm and delete actions
        if(isset($_POST['confirm'])) {
            $package_id = $_POST["package_id"];
            // Your code to update booking status in the database
            echo "Package ID ".$package_id." confirmed.";
        }
        if(isset($_POST['delete'])) {
            $package_id = $_POST["package_id"];
            // Your code to delete booking from the database
            echo "Package ID ".$package_id." deleted.";
        }
        ?>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
