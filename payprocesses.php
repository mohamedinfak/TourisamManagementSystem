<?php

if(isset($_POST['pay'])) {

    $package_id2=$_POST['package_id2'];
    $_SESSION['pack_id']=$package_id2;

    header('location: onlinepayment.php');
    exit;

}



?>