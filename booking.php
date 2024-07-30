<!-- booking.php -->
<?php
include 'includes/dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $type = $_POST['type'];
    $price = $_POST['price'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking</title>
</head>
<body>
    <h1>Book Your Room</h1>
    <p>Room Type: <?php echo $type; ?></p>
    <p>Price: $<?php echo $price; ?> per night</p>

    <form action="confirm_booking.php" method="post">
        <!-- Pass room details -->
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="type" value="<?php echo $type; ?>">
        <input type="hidden" name="price" value="<?php echo $price; ?>">
        
        <!-- Guest details -->
        <label for="prefix">Prefix:</label>
        <input type="text" id="prefix" name="prefix" required><br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" required><br>
        <label for="mobile">Mobile:</label>
        <input type="text" id="mobile" name="mobile" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="country">Country:</label>
        <input type="text" id="country" name="country" required><br>
        <label for="address1">Address 1:</label>
        <input type="text" id="address1" name="address1" required><br>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" required><br>
        <label for="state">State:</label>
        <input type="text" id="state" name="state" required><br>
        <label for="zip">Zip:</label>
        <input type="text" id="zip" name="zip" required><br>

        <!-- Booking details -->
        <label for="guests">Number of Guests:</label>
        <input type="number" id="guests" name="guests" required><br>
        <label for="checkin">Check-in Date:</label>
        <input type="date" id="checkin" name="checkin" required><br>
        <label for="checkout">Check-out Date:</label>
        <input type="date" id="checkout" name="checkout" required><br>

        <button type="submit">Confirm Booking</button>
    </form>
</body>
</html>
