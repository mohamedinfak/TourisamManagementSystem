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
    <title>About Us</title>
    <style>
        /* Reset some default styles */
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        ul,
        li,
        a {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
            color: inherit;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .navbar {
            background-color: #333;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .navbar .navbar-brand {
            color: white;
            font-size: 24px;
        }

        .navbar ul {
            display: flex;
        }

        .navbar ul li {
            margin-left: 20px;
        }

        .navbar ul li a {
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .navbar ul li a:hover {
            background-color: #575757;
        }

        .navbar .btn {
            background-color: white;
            color: #333;
            padding: 10px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .navbar .btn:hover {
            background-color: #ccc;
        }

        .section-1 {
            padding-top: 0px;
            /* To avoid content being hidden under fixed navbar */
        }

        .header-1 {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 50px 0;
        }

        .container {
            padding: 20px;
            margin-top: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .about-section {
            text-align: center;
        }

        .about-section h2 {
            margin-bottom: 20px;
            font-size: 32px;
        }

        .about-p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .about-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .about-text {
            flex: 1;
            padding: 20px;
            min-width: 300px;
        }

        .about-image {
            flex: 1;
            text-align: center;
            padding: 20px;
            min-width: 300px;
        }

        .about-image img {
            max-width: 100%;
            border-radius: 8px;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <section class="section-1">
        <?php @include 'header.php' ?>
    </section>

    <header class="header-1">
        <h1>Master Travel's</h1>
    </header>

    <div class="container">
        <section class="about-section">
            <h2>About Us</h2>
            <p class="about-p"><b><u>Infakmohamedstc@gmail.com</u></b></p><br>
            <div class="about-content">
                <div class="about-text">
                    <p>
                        Welcome to our Tourism Management System! We are dedicated to providing a seamless and enjoyable
                        travel experience. Our system is designed to assist you in planning your trips, managing
                        bookings, and exploring new destinations.
                    </p>
                    <p>
                        Whether you're a traveler or a tourism professional, our platform aims to make the journey
                        smoother and more memorable. Discover the beauty of the world with us!
                    </p>
                </div>
                <div class="about-image">
                    <img src="image/about.jpg" alt="About Us Image">
                </div>
            </div>
        </section>
    </div>

    <footer>
        <p>&copy; 2024 Tourism Management System.<br>
            MST .&nbsp;&nbsp;&nbsp;<b>Ilyas Mohamed INFAQ</b> <br>All Rights Reserved.</p>
    </footer>

</body>

</html>