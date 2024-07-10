<?php

@include 'dbconn.php';
session_start();
if (!$_SESSION['account'] == "user") {
    header('location:login.php');
}
?>

<html>

<head>
    <title>contact us</title>
    <link rel="stylesheet" type="text/css" href="style.css">



    <style>
        .section-1 {
            width: 100%;
            height: auto;
            align-items: center;
            display: center;
        }

        .section-2 {
            background-image: url('image/logo.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            height: 1000px;
            margin-top: 0px;
            align-items: center;
            display: inline-flex;

        }

        #nv-spcil {

            border-radius: 5px;
            padding: 5px;
        }

        #btn {
            background-color: green;
            border-radius: 5px;
            padding: 10px;
        }

        .div-1 {
            width: 500px;
            height: 700px;
            background-image: url('image/reg1.webp');
            background-size: cover;
            margin-left: 50px;
            border-radius: 40px;
            padding: 20px;
            display: flex;

        }

        .div-2 {
            width: 500px;
            height: 700px;
            background-color: rgb(11, 9, 9);
            background-image: url('image/ellai1.avif');
            background-size: cover;
            border-radius: 40px;
            color: black;
            margin-left: 13%;
            padding: 20px;
            align-items: center;


        }

        .div1_button {
            background-color: black;
            color: white;
            padding: 0 5px;
            width: 80px;
            height: 40px;
            border-radius: 10px;
            border-color: aqua;
        }

        .div1_button:hover {
            border-color: red;
            background-color: blue;
            cursor: pointer;
        }

        .lbl-1 {
            align: left;
            margin-left: -2%;
            padding: 10px;
        }

        .input {

            border-radius: 6px;
            padding: 10px;
            width: 300px;
            height: 30px;
        }

        #txt-area {
            padding: 100px;
            width: 400px;
            height: 200px;
            align: right;
        }

        #input-date {
            border-radius: 6px;
            padding: 5px;
            width: 300px;
            height: 30px;
        }

        #h1-1 {
            margin-left: 50px;
            align: center;

        }

        #section-3 {
            width: 100%;
            height: 400px;
            background-color: black;
            align-items: center;
            display: flex;


        }

        .container {
            display: flex;

        }

        /* Reset some default styles */
        body,
        h1,
        h2,
        p,
        ul,
        li {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            padding: 0%;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        /* Section 5 */
        .section-5 {
            display: flex;
            background-color: #333;
            color: #fff;
            padding: 50px 0;
        }



        .php {

            color: rgb(175, 21, 21);
            font-size: 20px;

            display: center;
            font-family: Arial, Helvetica, sans-serif;
            background-color: rgb(56, 174, 224);
        }

        .error-message {
            color: red;
        }
    </style>

<body>
    <section class="section-1">
        <?php @include 'header.php' ?>
    </section>


    <section class="section-2">
        <div class="div-1">
            <form action="contact_process.php" method="post" id="contactForm" onsubmit="return validateForm()">
                <h1 id="h1-1"> Contact Me!!</h1><br><br>
                <input type="text" name="name" id="name" class="input" placeholder="User-id:" required><br><br>
                <input type="email" name="email" id="email" class="input" placeholder="E-mail:" required><br><br>
                <label for="input-date" class="lbl-1">Select Date:</label><br>
                <input type="date" name="date" id="input-date" required><br><br>
                <textarea id="txt-area" class="input" name="txtarea" rows="4" cols="50"
                    placeholder="Write your complaint:" required></textarea><br><br>
                <button type="submit" name="submit" class="div1_button"> Report</button>
                <button type="reset" name="Reset" class="div1_button">Reset</button><br>
            </form>
        </div>


        <div class="div-2">
        </div>

    </section>



    <script>
        function validateForm() {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var date = document.getElementById('input-date').value;
            var txtarea = document.getElementById('txt-area').value;

            if (name == "" || email == "" || date == "" || txtarea == "") {
                alert("All fields must be filled out");
                return false;
            }

            // Email validation
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address");
                return false;
            }

            return true; // Submit the form if all validation passed
        }
    </script>




</body>

</html>

