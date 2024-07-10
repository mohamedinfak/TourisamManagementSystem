<?php
include ('dbconn.php');
session_start();
if (!$_SESSION['account'] == "user") {
  header('location:login.php');
}
//require_once "pdf/fpdf.php"; //fpdf supporting file
include ('pdf/fpdf.php');

//Page Creation (Default value is P;Default value is mm;default page size: A4)
#$pdf = new FPDF(); 
//or
$pdf = new FPDF('l', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 13);
$pdf->Image("logonew2.png", 20, 3, 40, 40);



//  Column Title
$peyment_id = $_SESSION['id_copy'];

$sql2 = "SELECT * FROM  Paymentsconfirmation WHERE id ='$peyment_id' ";
// $sql = "SELECT * FROM bookingconfirmed "; 	
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {


  while ($row = $result2->fetch_assoc()) {

    $pdf->Cell(100, 10, 'Master Travels', 0, 0, 'R');
    $pdf->Cell(260, 10, 'Gmail: Mstertravels@gmail.com', 0, 1, 'C', false);
    $pdf->Cell(460, 10, 'Booking_Date:  ' . $row["ondate"], 0, 1, 'C', false);
    $pdf->Cell(460, 15, 'Address: 133/B Goal_Road Colombo ', 'B', 1, 'C', false);
    $pdf->Cell(300, 30, 'Master Travels Booking Tour Details', 0, 1, 'C', false);
    $pdf->Cell(100, 0, '', 0, 1, 'C', false);




    $pdf->Cell(13, 20, 'Id', 'B', 0, 'C', false);
    $pdf->Cell(30, 20, 'Name', 'B', 0, 'C', false);
    $pdf->Cell(35, 20, 'Nic_No', 'B', 0, 'C', false);
    $pdf->Cell(35, 20, 'Location', 'B', 0, 'C', false);
    $pdf->Cell(40, 20, 'Tour_Date', 'B', 0, 'C', false);
    $pdf->Cell(25, 20, 'Mambers', 'B', 0, 'C', false);
    $pdf->Cell(20, 20, 'Days', 'B', 0, 'C', false);
    $pdf->Cell(28, 20, 'Package', 'B', 0, 'C', false);

    $pdf->Cell(32, 20, 'Amount', 'B', 1, 'C', false);

    $pdf->Cell(13, 40, $row["id"], 'B', 0, 'C', false);
    $pdf->Cell(30, 40, $row["user_name"], 'B', 0, 'C', false);
    $pdf->Cell(35, 40, $row["user_nic_no"], 'B', 0, 'C', false);
    $pdf->Cell(35, 40, $row["place"], 'B', 0, 'C', false);
    $pdf->Cell(40, 40, $row["bookingdate"], 'B', 0, 'C', false);
    $pdf->Cell(25, 40, $row["touriscount"], 'B', 0, 'C', false);
    $pdf->Cell(20, 40, $row["Trip_days"], 'B', 0, 'C', false);
    $pdf->Cell(30, 40, $row["package"], 'B', 0, 'C', false);
    $pdf->Cell(35, 40, 'Rs' . $row["tripamount"] . '/=', 'B', 1, 'C', false);
    $pdf->Cell(190, 30, 'Thank You For Your Booking Come Back Again !!!', 'B', 1, 'C');
    $pdf->Cell(190, 20, '', 0, 1, 'C', false);

  }
}

















$pdf->Output(); // Display output
ob_end_flush();
?>