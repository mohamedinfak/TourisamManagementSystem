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
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="homestyle.css">
</head>

<body>
    <section class="section-1" id="nv-spcil">
        <?php @include 'header.php'; ?>
    </section>
    <section class="heading">
        <div>
            <h1 class="hading-h1">&nbsp;Welcome to <br>Tourism | Management System</h1>
            <marquee behavior="" direction="right">
                <span class="php">@Owner id:[&nbsp;<b><?php echo $_SESSION['email'] ?></b>&nbsp;]</span>
            </marquee>
        </div>
    </section>
    <section class="section-content">
        <section class="content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="content-text">
                            <h2>Welcome to Our Tourism Management System</h2>
                            <p>Embark on a journey with us and discover the wonders of the world!</p>
                            <p>Explore our handpicked destinations, crafted with love and passion just for you.</p>
                            <p>With seamless booking and expert guidance, your dream vacation is just a click away.</p>
                            <a href="package.php" class="btn-primary">Explore Packages</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="content-image">
                            <img src="image/homelogo.jpg" alt="Image" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section class="content-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Discover Our Exclusive Features</h2>
                    <div class="feature-list">
                        <div class="feature-item">
                            <i class="fas fa-globe"></i>
                            <h3>Global Destinations</h3>
                            <p>Explore our vast collection of destinations worldwide.</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-users"></i>
                            <h3>Expert Guides</h3>
                            <p>Get insights and tips from our experienced travel guides.</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-shield-alt"></i>
                            <h3>Safe Travel</h3>
                            <p>Travel with peace of mind with our comprehensive safety measures.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section><?php @include 'footer.php'; ?></section>
</body>

</html>