
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
    <title>Delete_visiting_places</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
         display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            margin-left:30%;
            background-color: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: auto;
           
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: auto;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .message {
            color: green;
            text-align: center;
            margin-bottom: 15px;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>    <?php @include 'AddminNv.php'; ?>

   

<div class="container">
    <h2>Visiting_placess</h2>
    <?php
    // Fetch products from the database
    $sql = "SELECT * FROM visitingplace";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <thead>
                    <tr>
                        <th>Item Id</th>
                        <th>Districts</th>
                        <th>Place</th>
                     <th>Image_Pathe</th>
                     <th>Action</th>
             
                    </tr>
                </thead>
                <tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['districts']}</td>
                    <td>{$row['place']}</td>
                   <td>{$row['imagepathe']}</td>
                 
                   <td><form action='delete_v_place.php' method='post'><input type='hidden' name='id' value='{$row['id']}'><button type='submit'>Delete</button></form></td> <!-- Delete button -->
                </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>No Visiting_placess found.</p>";
    }
    ?>
</div>

</body>
</html>
