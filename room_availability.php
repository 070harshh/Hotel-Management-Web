<?php
session_start();
include('includes/dbconnection.php');

function checkRoomAvailability($checkin, $checkout) {
    global $dbh;
    $sql = "SELECT * FROM rooms WHERE id NOT IN (
                SELECT booking_id FROM bookings 
                WHERE 
                    (:checkin < checkout AND :checkout > checkin)
            )";
    $query = $dbh->prepare($sql);
    $query->bindParam(':checkin', $checkin, PDO::PARAM_STR);
    $query->bindParam(':checkout', $checkout, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

if (isset($_POST['check_availability'])) {
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $availableRooms = checkRoomAvailability($checkin, $checkout);
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <title>Hotel Management System - Check Room Availability</title>
</head>
<body>
    <form method="post">
        <label for="checkin">Check-In Date:</label>
        <input type="date" id="checkin" name="checkin" required>
        <label for="checkout">Check-Out Date:</label>
        <input type="date" id="checkout" name="checkout" required>
        <button type="submit" name="check_availability">Check Availability</button>
    </form>

    <?php
    if (isset($availableRooms)) {
        if (count($availableRooms) > 0) {
            echo "<h3>Available Rooms:</h3>";
            echo "<ul>";
            foreach ($availableRooms as $room) {
                echo "<li>(Type: " . htmlentities($room->type) . ")</li>";
                // Room Number: " . htmlentities($room->RoomNumber) . " 
            }
            echo "</ul>";
        } else {
            echo "<p>No rooms available for the selected dates.</p>";
        }
    }
    ?>
</body>
</html>
