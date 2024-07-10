<?php
include('dbconn.php');
session_start();
if(!$_SESSION['account']=="admin"){
    header('location:login.php');
 }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Admin </title>
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        /* Custom styles for sidebar */
        .sidebar {
            height: 100%; /* Full-height sidebar */
            width: 250px; /* Set sidebar width */
            position: fixed; /* Fix the sidebar */
            top: 0; /* Position it at the top */
            left: 0; /* Position it at the left */
            background-color: #2c3e50; /* Set sidebar background color */
            padding-top: 50px; /* Add padding top */
        }

        .sidebar ul {
            list-style-type: none; /* Remove list bullet */
            padding: 0; /* Remove default padding */
        }

        .sidebar ul li {
            padding: 10px; /* Add padding */
        }

        .sidebar ul li a {
            color: #ffffff; /* Set link color */
            text-decoration: none; /* Remove underline */
            display: block; /* Make links block elements */
        }

        .sidebar ul li a:hover {
            background-color: #34495e; /* Set hover background color */
        }

        .content {
            margin-left: 250px; /* Adjust content margin to match sidebar width */
            padding: 20px; /* Add padding */
        }

        /* Custom styles for footer */
        .footer {
            background-color: #34495e; /* Set footer background color */
            color: #ffffff; /* Set text color */
            text-align: center; /* Center-align text */
            padding: 20px; /* Add padding */
            position: fixed; /* Fix the footer to the bottom */
            width: 100%; /* Full width */
            bottom: 0; /* Stick to the bottom */
            left: 0; /* Stick to the left */
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <ul>
            <li><a href="dcbord.php" target="_self">Dashboard</a></li>
            <li><a href="managebooking.php"target="_self">Manage Tours</a></li>
            <li><a href="displayalldata.php"target="_self">Viwe All System Data</a></li>
            <li><a href="addpackages.php"target="_self">Add Packages</a></li>
            <li><a href="addvisitingplace.php"target="_self">Add visitingplace</a></li>
            <li><a href="adminregister.php"target="_self">Register New AdminAccount</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="logout.php">logout</a></li>
            <!-- Add more navigation links as needed -->
        </ul>
    </div>

    <!-- Main Content Area -->
    <div class="content">
        <div class="container">
            <!-- You can add your main content here -->
            <h1>Welcome to Tourism Management System Admin Panel</h1>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Tourism Management System. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
