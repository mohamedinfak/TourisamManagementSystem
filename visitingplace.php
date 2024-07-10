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
    <title>visitingplaces_View</title>

    <link href="visiting_view.css" rel="stylesheet" type="text/css" />

</head>

<body>
<section class="section-1">
        <?php @include 'header.php' ?>
   

    </section>
    <header>
        <marquee behavior="" direction="left"><span
                class="php"><?php echo "@Your_id:" . $_SESSION['email']; ?></span><br>
        </marquee>
        <h1>Visiting_Place_Experience</h1>
    </header>


    <?php
    $sql = "SELECT * FROM visitingplace ORDER BY id DESC";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        while ($tabledata = mysqli_fetch_assoc($res)) { ?>


            <div class="places-container">
                <div class="place-card">
                    <img class="place-image" src="visitingplace/<?= $tabledata['imagepathe'] ?>" alt="Place 1">
                    <div class="place-info">

                        <h4><?php echo $tabledata['place']; ?></h4>
                        <h3><?php echo $tabledata['placedescription']; ?></h3>


                    </div>
                    <div class="div-desc-1 "><a target="_blank" href="<?= $tabledata['weblink'] ?>"><button class="btn-1">More
                                Details</button></a></div>
                </div>
            </div>
        <?php }
    } ?>




    </div>
    <section>
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