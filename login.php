<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login your Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('image/v3.jpg');
            background-size: cover;
            background-size: 100% 120%;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
        }

        #login {
            opacity:80%;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #form-1 {
            
            border-radius: 20px;
            padding: 40px;
            width: 400px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            color:#000000;
            font-weight: bold;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }

        button[type="submit"],
        button[type="reset"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
        }

        button[type="submit"]:hover,
        button[type="reset"]:hover {
            background-color: #0056b3;
        }

        .mt-3 {
            margin-top: 20px;
        }

        #link-1 {
            color: #dc3545;
            text-decoration: none;
        }

        #link-1:hover {
            text-decoration: underline;
        }

        #logo_design{
            border-radius: 100%;
            padding: 5px;
            margin-left:100px;
            width: 200px;
            height: 200px;
        }

        input:hover {
            background-color: #d4edda;
        }

        img:hover {
            background-color: #d2c5bc;
            opacity:60%;
        }
    </style>
</head>

<body>
    <div id="login">
        <form action="" method="post" id="form-1">
            <img src="logonew2.png" id="logo_design">
            <div class="form-group">
                <label for="aidl">Account ID</label>
                <input type="email" name="email" placeholder="ENTER YOUR ACCOUNT ID" required="">
            </div>

            <div class="form-group">
                <label for="lpassword">Password </label>
                <input type="password" name="lpassword" placeholder="ENTER YOUR PASSWORD" required="">
            </div>

            <button type="submit" name="submit">Login</button>
            <button type="reset" name="btnreset">Reset</button>

            <div class="mt-3">
                <a href="register.php" id="link-1">Register Account...?</a>&nbsp;&nbsp;&nbsp;
                <a href="forgetpassword.php" id="link-1">forget  password...?</a>
            </div>
        </form>
    </div>
</body>
</html>
<?php
session_start(); 
include('dbconn.php');

if (isset($_POST['submit'])) {

    $email = $_POST["email"];
    $password = md5($_POST["lpassword"]); 

    $sql_query = "SELECT actype FROM registerform WHERE email = '$email' AND password = '$password'";

    $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
    if ($result == false) {
        echo 'incorrect Password or Email.';
        exit();
    }

    if (mysqli_num_rows($result) == 1) {
        
        $row= mysqli_fetch_array($result,MYSQLI_ASSOC);

        if($row['actype']=='admin'){
            
            $_SESSION['email'] = $email; 
            $_SESSION['account'] = $row['actype'];
            header('Location: dcbord.php');
        
        exit();

        }else{
            $_SESSION['email'] = $email;
            $_SESSION['account'] = $row['actype'];  
            header('Location: home.php');
        exit();
        }
        
        
    } else {
        header('Location: login.php');
    }

    mysqli_close($conn);
}
?>


