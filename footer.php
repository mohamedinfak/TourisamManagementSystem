<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Footer Design</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        footer {
            background: #1a1a1a;
            color: #fff;
            padding: 50px 0;
            height: auto;
            text-align: center;
        }

        .footer-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            max-width: 1200px;

            margin: auto;
        }

        .footer-section {
            flex: 1;
            padding: 10px;
            min-width: 250px;
            transition: transform 0.3s ease;
        }

        .footer-section:hover {
            transform: translateY(-10px);
        }

        .footer-section h2 {
            margin-bottom: 15px;
            font-size: 24px;
            position: relative;
        }

        .footer-section h2::after {
            content: '';
            display: block;
            width: 50px;
            height: 2px;
            background: #ffd700;
            margin: 8px auto 0;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin: 10px 0;
        }

        .footer-section ul li a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section ul li a:hover {
            color: #ffd700;
        }

        .footer-section p {
            line-height: 1.6;
            margin: 0;
        }

        .social-links {
            display: flex;

            list-style: none;

            justify-content: center;
            margin-top: 20px;
        }

        .social-links a {
            color: #fff;
            font-size: 20px;
            margin: 0 10px;
            transition: color 0.3s, transform 0.3s;
        }

        .social-links a:hover {
            color: #ffd700;
            transform: scale(1.2);
        }

        .footer-bottom {
            background: #111;
            padding: 20px;
            margin-top: 10px;
        }

        .footer-bottom p {

            font-size: 14px;
        }
    </style>
</head>

<body>
    <!-- Main content of the page -->

    <footer>
        <div class="footer-container">
            <div class="footer-section about">
                <h2>About Us</h2>
                <p>We are a team of passionate developers creating amazing web experiences.</p>
            </div>
            <div class="footer-section links">
                <h2>Quick Links</h2>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section links" id="social-links">
                <h2>Follows</h2>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twiter</a></li>
                    <li><a href="#">Linkedin</a></li>
                    <li><a href="#">Instagram</a></li>
                </ul>
            </div>
        </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 MST ILYAS MOHAMED INFAQ. All rights reserved.</p>
        </div>
    </footer>


</body>

</html>