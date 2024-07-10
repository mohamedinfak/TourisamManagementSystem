<?php
include ('dbconn.php');
session_start();
if (!$_SESSION['account'] == "admin") {
    header('location:login.php');
} 

$_SESSION['errormsg'] = " ";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register your Account</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            scroll-behavior: smooth;
            background-image: url("image/reg1.webp");
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: auto;
            font-family: 'Roboto', sans-serif;
            color: #fff;
            margin: 0;
        }

        #form-1 {
            background: rgba(0, 0, 0, 0.4);
            padding: 10px;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 600px;
            height: auto;


            text-align: center;
        }

        #rcorners2 {
            border-radius: 50%;
            width: 130px;
            height: 130px;
            margin-top: 50px;

        }

        #rcorners2:hover {
            width: 150px;
            height: 150px;

        }

        .h1-1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .form {
            text-align: left;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: calc(100% - 20px);
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-left: 10px;
        }

        .div-select {
            margin-bottom: 15px;
        }

        select.form-control {
            width: calc(100% - 20px);
        }

        small.error-message {
            display: block;
            margin-left: 10px;
            font-size: 12px;
        }

        .btn {
            width: calc(50% - 5px);
            padding: 10px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
            margin-left: 4px;
        }

        .btn:first-child {
            margin-right: 5px;
        }

        .btn:hover {
            background: #007BFF;
            color: #fff;
        }

        .link-div {

            margin-top: 10px;
        }

        .link-div a {
            color: red;
            font-size: 20px;
            text-decoration: none;
        }

        .link-div a:hover {

            text-decoration: underline;
        }

        input.error {
            border: 2px solid red;
        }

        strong {
            color: red;
        }
    </style>
</head>

<body>
    <div id="form-1">
        <img src="logonew2.png" id="rcorners2">
        <h1 class="h1-1">Register Here!!!</h1>
        <strong><?php echo $_SESSION['errormsg']; ?></strong>
        <div class="form">
            <form name="myform2" id="form" action="admin_register_process.php" method="POST" onsubmit="return validateForm()">
                <div class="form-group div-select">
                    <label for="sex"><b>Select Gender:</b></label>
                    <select name="sex" id="sex" class="form-control" required>
                        <option value="">Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group div-select">
                    <label for="type"><b>Your Account Type:</b></label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="username"><b>Username:</b></label>
                    <input type="text" class="form-control" name="uname1" id="username" placeholder="Enter Username"
                        required>
                    <small id="username-error" class="error-message"></small>
                </div>
                <div class="form-group">
                    <label for="email"><b>Email:</b></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email id"
                        required>
                    <small id="email-error" class="error-message"></small>
                </div>
                <div class="form-group">
                    <label for="password"><b>Password:</b></label>
                    <input type="password" class="form-control" name="upswd1" placeholder="Enter Password" id="password"
                        required>
                    <small id="password-error" class="error-message"></small>
                </div>
                <div class="form-group">
                    <label for="password2"><b>Re-Enter Password:</b></label>
                    <input type="password" class="form-control" name="upswd2" placeholder="Re-Enter Password"
                        id="password2" required>
                    <small id="password2-error" class="error-message"></small>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" name="register">Register</button><br><br>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
                <div class="link-div">
                    <center><a href="login.php" class="link-div1"><b>Existing user? Login!</b></a></center>
                </div>
            </form>
        </div>
    </div>
    <script>
        function validateForm() {
            const username = document.getElementById('username');
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const password2 = document.getElementById('password2');
            let isValid = true;

            if (username.value.length < 4) {
                showError('username', 'Username must be at least 4 characters long.');
                isValid = false;
            } else {
                showSuccess('username');
            }

            if (!isValidEmail(email.value)) {
                showError('email', 'Please enter a valid email address.');
                isValid = false;
            } else {
                showSuccess('email');
            }

            if (password.value.length < 8) {
                showError('password', 'Password must be at least 8 characters long.');
                isValid = false;
            } else if (!isValidPassword(password.value)) {
                showError('password', 'Password must contain at least one lowercase letter, one uppercase letter, and one number.');
                isValid = false;
            } else {
                showSuccess('password');
            }

            if (password.value !== password2.value) {
                showError('password2', 'Passwords do not match.');
                isValid = false;
            } else {
                showSuccess('password2');
            }

            return isValid;
        }

        function showError(inputId, message) {
            const input = document.getElementById(inputId);
            const errorElement = document.getElementById(inputId + '-error');
            input.classList.add('error');
            errorElement.textContent = message;
        }

        function showSuccess(inputId) {
            const input = document.getElementById(inputId);
            const errorElement = document.getElementById(inputId + '-error');
            input.classList.remove('error');
            errorElement.textContent = '';
        }

        function isValidEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        function isValidPassword(password) {
            const re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
            return re.test(password);
        }
    </script>
</body>

</html>




