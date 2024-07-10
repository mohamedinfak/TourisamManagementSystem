<?php
// Include the database connection file
include ('dbconn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Delete the product with the given ID from the database
    $sql = "DELETE FROM visitingplace WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: delete_visitingplace.php");
    exit();
}
?>
