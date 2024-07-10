<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="nvstyl.css">
    
    <title>Navigation_Master_Travel's</title>
    <style>






body{
    margin:0;
    padding:0;
  
    height:auto;
}

nav{
    background-color:#4ef037;
    font-size: 20px;
    width:100%;
    height: 80px;
    display:flex;
    align-items:center;
    justify-content: space-around;

}

nav li{
    display:inline-block;
    margin:0 8px;
}

nav a{
    text-decoration: none;
}

.logo{
    font-size:36px;
    font-weight: bolder;
}

nav a:hover{
    color:whitesmoke;
}

.menu-line{
    height:3px;
    width:20px;
    background-color: rgb(76, 173, 211);
    margin-bottom: 3px;
}

.menu{
    cursor:pointer;
    display:none;   
}

@media all and (max-width:700px){
    nav{
        flex-direction: column;
        height: auto;
    }

    nav li{
        display:block;
        padding:10px 0;
    }
    ul{
        text-align: center;
        padding:0;
        display:none;
    }

    .logo{
        align-self:flex-start;
        margin:10px 0px 0px 30px;
    }

    .menu{
        display:block;
        position:absolute;
        right:20px;
        top:25px;
    }

    .showmenu{
        display:block;
    }
    
}
        .content {
            padding: 100px 0;
            background-color: #f2cff0;
        }

        .content-text {
            padding-right: 30px;
        }

        .content-text h2 {
            font-size: 42px;
            font-weight: bold;
            color: #333;
            margin-bottom: 30px;
        }

        .content-text p {
            font-size: 18px;
            line-height: 1.6;
            color: #666;
            margin-bottom: 20px;
        }

        .content-image {
            text-align: center;
        }

        .content-image:hover {
            padding: 50px;
            border-radius: 20px;
        }

        .content-image img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-size: 18px;
            padding: 12px 30px;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        /* Adjustments for smaller screens */
        @media (max-width: 768px) {
            .content {
                padding: 50px 0;
            }

            .content-text {
                padding-right: 0;
            }
        }


       
    
 
    </style>
</head>

<body>
    <nav>
        <div class="logo">
            <a href="">Master Travel's</a>
        </div>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="package.php">Packages</a></li>
            <li><a href="visitingplace.php">Visit_Places</a></li>
            <li><a href="bookingconformation.php">Booking_status</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <button class="btn-primary"><a href="contact.php">Contact Us</a></button>&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="btn-primary"><a href="logout.php">logOut</a></button>

        </ul>
        <div class="menu">
            <div class="menu-line"></div>
            <div class="menu-line"></div>
            <div class="menu-line"></div>
        </div>
    </nav>

</body>
<script>
    const menu = document.querySelector('.menu')
    const menuList = document.querySelector('nav ul')
    menu.addEventListener('click', () => {
        menuList.classList.toggle('showmenu')
    })
</script>

</html>