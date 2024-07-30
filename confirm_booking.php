<!-- confirm_booking.php -->
<?php
include 'includes/dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $type = $_POST['type'];
    $price = $_POST['price'];

    // Guest details
    $prefix = $_POST['prefix'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $address1 = $_POST['address1'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];

    // Booking details
    $guests = $_POST['guests'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];

    // Insert booking details
    $query1 = "INSERT INTO bookings (booking_id, guests, checkin, checkout) VALUES ('$booking_id', '$guests', '$checkin', '$checkout')";
    $result1 = mysqli_query($conn, $query1);

    if ($result1) {
        // Retrieve the last inserted booking_id
        $booking_id_query = "SELECT MAX(booking_id) AS max_booking_id FROM bookings";
        $booking_id_result = mysqli_query($conn, $booking_id_query);
        $booking_id_row = mysqli_fetch_assoc($booking_id_result);
        $booking_id = $booking_id_row['max_booking_id'];

        // Insert guest details with the associated booking_id
        $query2 = "INSERT INTO guests (booking_id, prefix, name, surname, mobile, email, country, address1, city, state, zip) 
                   VALUES ('$booking_id', '$prefix', '$name', '$surname', '$mobile', '$email', '$country', '$address1', '$city', '$state', '$zip')";
        $result2 = mysqli_query($conn, $query2);

        if ($result2) {
            // Redirect to a confirmation page
            header('Location: confirmation.php');
            exit;
        } else {
            echo "Error: " . $query2 . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error: " . $query1 . "<br>" . mysqli_error($conn);
    }
}
?>
