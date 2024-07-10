<?php
include('dbconn.php');
session_start();
if(!$_SESSION['account']=="admin"){
    header('location:login.php');
 }

function retrieveData($tableName) {
    global $conn;
    $query = "SELECT * FROM $tableName";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));


    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table-1' border='1'>";
   
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($row as $key => $value) {
                echo "<th><b>$key</b></th>";
                
                
                    echo"<td> $value</td>";
            
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No data available.";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>admin page</title>

    

    <style>
.section-head {
    background-color: black;
    width: 100%;
    height: 100px;
   
}
.section-1 {
    background-color:red;
    width: 100%;
    height: 800px;
    background-image:url('image/fm3.jpg');
    background-size:cover;
}
.section-2 {
   
    width: 100%;
    height: 800px;
}
.section-3 {
   
    width: 100%;
    height: 800px;
}
.section-4 {
  
    width: 100%;
    height: 800px;
}
.section-5 {
   
    width: 100%;
    height: 100px;
}
.section-6 {
 
    width: 100%;
    height: 800px;
}
.section-7 {
   
    width: 100%;
    height: 800px;
}





.contain-1 {
    display: flex;
    padding: 10px;
    align-items: center;
    order: right;
}

.div-nv {
    padding: 5px;
  
   
}

nav {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

nav li {
    margin: 0;
    padding: 0px;
  
  
}

nav li a {
    text-decoration: none;
    color: white;
}
.btn {
font-size: 1.2rem;
padding: 1rem 2.5rem;
border: none;
outline: none;
border-radius: 0.4rem;
cursor: pointer;
text-transform: uppercase;
background-color: rgb(14, 14, 26);
color: rgb(234, 234, 234);
font-weight: 700;
transition: 0.6s;
box-shadow: 0px 0px 60px #1f4c65;
-webkit-box-reflect: below 10px linear-gradient(to bottom, rgba(0,0,0,0.0), rgba(0,0,0,0.4));
}

.btn:active {
scale: 0.92;
}

.btn:hover {
background: rgb(2,29,78);
background: linear-gradient(270deg, rgba(2, 29, 78, 0.681) 0%, rgba(31, 215, 232, 0.873) 60%);
color: rgb(4, 4, 38);
}
.table-1 {

width:1000px;
height: auto;
background-color:black;
color:white;
scroll-behavior: smooth;

}
#div-nv{
justify-content:flex-end;
padding:10px;
}





.button {
height: 50px;
width: 150px;
border: none;
border-radius: 10px;
cursor: pointer;
position: relative;
overflow: hidden;
transition: all 0.5s ease-in-out;
}

.button:hover {
box-shadow: .5px .5px 150px #252525;
}

.type1::after {
content: "bye!";
height: 50px;
width: 150px;
background-color: #008080;
color: #fff;
position: absolute;
top: 0%;
left: 0%;
transform: translateY(50px);
font-size: 1.2rem;
font-weight: 600;
display: flex;
align-items: center;
justify-content: center;
transition: all 0.5s ease-in-out;
}

.type1::before {
content: "GO MENU";
height: 50px;
width: 150px;
background-color: #fff;
color: #008080;
position: absolute;
top: 0%;
left: 0%;
transform: translateY(0px) scale(1.2);
font-size: 1.2rem;
font-weight: 600;
display: flex;
align-items: center;
justify-content: center;
transition: all 0.5s ease-in-out;
}

.type1:hover::after {
transform: translateY(0) scale(1.2);
}

.type1:hover::before {
transform: translateY(-50px) scale(0) rotate(120deg);
}
.span-d{
font-size:15px;
color: black ;
}
button:hover{ 
border-radius:20px;

}
.span-d:hover{
background-color:;
font-size:20px;
}

button {
margin-left:20px;
padding:10px;
text-align:center;
font-size: 18px;
color: #e1e1e1;
font-family: inherit;
font-weight: 800;
cursor: pointer;
position: relative;
border: none;
background: none;
background-color: white;
text-transform: uppercase;
transition-timing-function: cubic-bezier(0.25, 0.8, 0.25, 1);
transition-duration: 400ms;
transition-property: color;
}

button:focus,
button:hover {
color: #fff;
}

button:focus:after,
button:hover:after {
width: 100%;
left: 0%;
}

button:after {
content: "";
pointer-events: none;
bottom: -2px;
left: 50%;
position: absolute;
width: 0%;
height: 2px;
background-color: #fff;
transition-timing-function: cubic-bezier(0.25, 0.8, 0.25, 1);
transition-duration: 400ms;
transition-property: width, left;
}
/* Reset some default styles */
body, h1, h2, p, ul, li {
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
}

.container {
    width: 80%;
    margin: 0 auto;
}

/* Section 5 */
.section-5 {
    background-color: #333;
    color: #fff;
    padding: 50px 0;
}

/* Footer */
footer {
    text-align: center;
}

/* Social Icons */
.footer-social-icons ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.footer-social-icons li {
    display: inline-block;
    margin: 0 10px;
}

.footer-social-icons a {
    display: block;
    width: 40px;
    height: 40px;
    text-align: center;
    line-height: 40px;
    color: #fff;
    background-color: #333;
    border-radius: 50%;
    transition: background-color 0.3s ease;
}

.footer-social-icons a:hover {
    background-color: #555;
}

/* Copyright Text */
.copy-right p {
    margin-top: 20px;
    font-size: 14px;
    color: #fff;
}

/* Animation */
.wow {
    visibility: hidden;
}

/* Zoom In Animation */
@keyframes zoomIn {
    0% {
        transform: scale(0);
    }
    100% {
        transform: scale(1);
    }
}

.wow.zoomIn {
    animation-name: zoomIn;
}

/* Fade In Down Animation */
@keyframes fadeInDown {
    0% {
        opacity: 0;
        transform: translateY(-20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.wow.fadeInDown {
    animation-name: fadeInDown;
}
.type{
    color:blue;
    font-size:30px;
    font-family:arial;
}

    </style>
</head>

<body>
    <section class="section-head" id="nv-head"><div><span class="type"> <?php echo $_SESSION['account'];?></span></div>
        <div class="contain-1" id="div-nv">
           


<div class="div-nv"><li><a href="#user-details" ><button>
<span class="span-d">See-User-data</span>
</button></div>

<div class="div-nv"><li><a href="#booking-details"><button>
  <span class="span-d">See-Booking-data</span>
</button></a></div>

<div class="div-nv"><li><a href="#complinte"><button>
<span class="span-d">See-contact </span>
</button></div>

<div class="div-nv"><li><a href="#login-details"><button>
<span class="span-d">See-Login-data</span>
</button></div>

<div class="div-nv"><li><a href="#feedback"><button>
<span class="span-d">See-feedback-data</span>
</button></div>
            </nav>
        </div>
    </section>

    <section class="section-1">
        <div class="contain-1">
            
       
        
    </section>
   

    <section class="section-3" id="user-details">
    <a href="#nv-head"><button class="button type1">
</button></a>
<div class="contain-1">
<form action="" method="post">
                     <div class="div-nv"><button type="submit" class="btn"name="submit2">Show-user-data</button> <div class="table-1">  <?php
             
          
            if (isset($_POST["submit2"])) {


                $tbname="registerform";
               
                echo retrieveData($tbname);
            }
            ?></div> </div>
        </form>
        </div>
      
    </section>
    <section class="section-4" id="booking-details">
    <a href="#nv-head"><button class="button type1">
</button></a>
<div class="contain-1">
<form action="" method="post">
                <div class="div-nv"><button type="submit" class="btn"name="submit3">Show-booking</button> <div class="table-1"></div> </div>
        </form>
        </div>
        <?php
               
           
            if (isset($_POST["submit3"])) {
                
                $tbname="booking";

                echo retrieveData($tbname);
            }
            ?>
    </section>

    </section>
    <section class="section-4" id="complinte">
    <a href="#nv-head"><button class="button type1">
</button></a>
<div class="contain-1">
<form action="" method="post">
                <div class="div-nv"><button type="submit" class="btn"name="submit4">Show-contactdetails</button> <div class="table-1"></div> </div>
            <form>
        </div>
        <?php
           
        
            if (isset($_POST["submit4"])) {
                
                $tbname="contactdetails";

                echo retrieveData($tbname);
            }
            ?>
    </section>
   
    <section class="section-7"id="feedback">
    <a href="#nv-head"><button class="button type1">
</button></a>
<div class="contain-1">
<form action="" method="post">
                <div class="div-nv"><button type="submit" class="btn"name="submit6">Show-feedback</button> <div class="table-1"></div> </div>
        </form>
        </div>
        <?php
            
         
           
            if (isset($_POST["submit6"])) {

                $tbname="feedback";
                echo retrieveData($tbname);
            }
            ?>
    </section>
    </section>
    <section> <section class="section-5">
        <footer>
            <div class="copy-right">
                <div class="container">
                    <div class="footer-social-icons wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
                        <ul>
                            <li><a class="facebook" href="#"><span>Facebook</span></a></li>
                            <li><a class="twitter" href="#"><span>Twitter</span></a></li>
                            <li><a class="flickr" href="#"><span>Flickr</span></a></li>
                            <li><a class="googleplus" href="#"><span>Google+</span></a></li>
                            <li><a class="dribbble" href="#"><span>Dribbble</span></a></li>
                        </ul>
                        
        </div>
                    </div>
                    <p class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">© 2023 TMS.&nbsp;&nbsp;&nbsp;MST ILYAS MOHAMED INFAQ <BR>All Rights Reserved </p>
                </div>
            </div>
        </footer>
    </section>


    <script>
        new WOW().init();
    </script></section>

</body>

</html>



