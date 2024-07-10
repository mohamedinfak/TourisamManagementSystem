<?php
@include 'dbconn.php';
session_start();
if (!$_SESSION['account'] == "user") {
    header('location:login.php');
}
$_SESSION['msg'] =" ";
?>


<html>

<head>
    <title>feedback</title>

    <link rel="stylesheet" type="text/css" href="feedbackstyle.css">

    <style>

    </style>
</head>

<body>
    <section class="section-1">
        <?php @include 'header.php' ?>
    </section>


    <section class="section-2">

        <div class="div1">
            <h1 class="h1-div"> Give The Feedback Here!!!</h1>
            <div class="contain-div">
                <span> <?php
                echo$_SESSION['msg'];?></span>
                <form action="feedback_process.php" method="post" class="form-1">

                    <input type="text" name="username" class="username-input" placeholder="Enter Your User Name :"
                        require="Plse enter your name"><br><br><br>
                    <input type="email" name="email" class="username-input" value="<?php echo $_SESSION['email']; ?>"
                        placeholder="<?php echo $_SESSION['email']; ?>" readonly><br><br><br>
                    <textarea id="txt-area" class="input" name="txtarea" rows="6" cols="50"
                        placeholder="Write your FeedBack:" require="Plse enter your feedback"></textarea><br><br>

                    <label for="" class="rating"><u>Performance:</u></label><br>
                    <label for="" class="rating">Excelante</label> &nbsp;&nbsp;<input type="radio" name="radio" class=""
                        value="Excelante"> &nbsp;|&nbsp;&nbsp;
                    <label for="" class="rating">Normel</label> &nbsp;&nbsp;<input type="radio" name="radio" class=""
                        value="Normel">&nbsp; |&nbsp;&nbsp;
                    <label for="" class="rating">ordinary</label> &nbsp;&nbsp;<input type="radio" name="radio" class=""
                        value="ordinary">&nbsp;| <br><br>
                    <button type="submit" name="submit"> Submit</button>
                    <button type="reset" name="reset">Reset</button>

                </form>
               
            </div>

        </div>

        <div class="pic"></div>
    </section>
    <section class="section-5">
        <footer>
            <div class="copy-right">
                <div class="container">
                    <div class="footer-social-icons wow fadeInDown animated animated" data-wow-delay=".5s"
                        style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
                        <ul>
                            <li><a class="facebook" href="#"><span>Facebook</span></a></li>
                            <li><a class="twitter" href="#"><span>Twitter</span></a></li>
                            <li><a class="flickr" href="#"><span>Flickr</span></a></li>
                            <li><a class="googleplus" href="#"><span>Google+</span></a></li>
                            <li><a class="dribbble" href="#"><span>Dribbble</span></a></li>
                        </ul>
                    </div>
                    <p class="wow zoomIn animated animated" data-wow-delay=".5s"
                        style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">© 2024
                        TMS.&nbsp;&nbsp;&nbsp;MST ILYAS MOHAMED INFAQ <BR>All Rights Reserved </p>
                </div>
            </div>
        </footer>
    </section>

    <script>
        new WOW().init();
    </script>
    </section>





</body>

</html>

