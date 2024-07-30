<?php
include 'includes/dbconnection.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $id = $_POST['id'];
    $type = $_POST['type'];
    $price = $_POST['price'];


   $prefix = $_POST['prefix'];
   $name = ($_POST['name']);
   $surname = ($_POST['surname']);
   $mobile = $_POST['mobile'];
   $email = $_POST['email'];
   $country = $_POST['country'];
   $address1 = $_POST['address1'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $zip = $_POST['zip'];
   
  
}
// where booking_id=(SELECT MAX(booking_id)
 $query1 = "INSERT INTO GUESTS(prefix,name,surname,mobile,email,country,address1,city,state,zip)values('$prefix',
        '$name',
        '$surname'
        ,'$mobile'
        ,'$email',
        '$country',
        ' $address1',
        '$city',
        '$state',
        '$zip')";

// $query="INSERT INTO GUESTS VALUES('$prefix','$first-name','$last-name','$phone','$email','$country',' $address1','$zip')";

$result = mysqli_query($conn, $query1);
if ($result) {
   echo "Booking Done." . "<br>";
   header('Location: payment.php');

} else {
   echo "not succesful";
}

