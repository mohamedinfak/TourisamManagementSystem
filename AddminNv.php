<html>

<head>
    <title>Addmin_Navigation_Panel</title>
    <style>
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
    </style>
</head>

<body>
    <section>
        <div class="sidebar">
            <ul>
                <li><a href="dcbord.php" target="_self">Dashboard</a></li>
                <li><a href="managebooking.php" target="_self">Manage Tours</a></li>
                <li><a href="alldataview.php" target="_self">Viwe All System Data</a></li>
                <li><a href="addpackages.php" target="_self">Add Packages</a></li>
                <li><a href="addvisitingplace.php" target="_self">Add visitingplace</a></li>
                <li><a href="delete_package.php">Delete packages</a></li>
                <li><a href="delete_visitingplace.php">Delete Visit_Places</a></li>
                <li><a href="delete_users.php">Delete Accounts</a></li>
            <li><a href="report.php">Reports</a></li>
                <li><a href="adminregister.php" target="_self">Register New AdminAccount</a></li>
                <li><a href="logout.php">logout</a></li>
                <!-- Add more navigation links as needed -->
            </ul>
        </div>
    </section>
</body>

</html>