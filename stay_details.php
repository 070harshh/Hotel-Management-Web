<?php
include 'includes/dbconnection.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $guests=$_POST['guests'];
    $checkin=$_POST['checkin'];
    $checkout=$_POST['checkout'];
}

$query1 = "INSERT INTO bookings  (guests, checkin, checkout) VALUES('$guests', '$checkin', '$checkout')";

$result = mysqli_query($conn, $query1);
if ($result) {
   
    header('Location: room_details.php');
}
?>