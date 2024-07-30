 <!-- <div class="header">
            <img src="images/room1.png" alt="Luxury Rooms">

            <div class="details">
                <div class="title">Luxury Rooms</div>
                <div class="rate">Room Only Rate<br>Jul 4 - Jul 5, 2024</div>
            </div>
        </div> -->


        <!-- <form action="guest_details.php" method="POST">
            <div class="form-group">
                <label for="prefix"> <span class="required">*</span></label>
                <select id="prefix" name="prefix" required placeholder="prefix">
                    <option value="no value">prefix</option>
                    <option value="Mr">Mr</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Ms">Ms</option>
                </select>

                <label for="name"><span class="required">*</span></label>
                <input type="textarea" id="name" name="name" required placeholder="First Name">

                <label for="surname"><span class="required">*</span></label>
                <input type="textarea" id="surname" name="surname" required required placeholder="Last Name">
            </div>

            <div class="form-group">
                <label for="mobile"><span class="required">*</span></label>
                <input type="text" id="mobile" name="mobile" required required placeholder="Mobile no.">

                <label for="email"><span class="required">*</span></label>
                <input type="email" id="email" name="email" required required placeholder="Email id">
            </div>

            <h2>Address</h2>
            <div class="form-group">
                <label for="country"> <span class="required">*</span></label>
                <select id="country" name="country" required>
                    <option value="in">India</option>
                    <option value="us">United States</option>
                    <option value="ca">Canada</option>
                 
                </select>

                <label for="address1"><span class="required">*</span></label>
                <input type="text" id="address1" name="address1" required placeholder="Address">

                <label for="zip"><span class="required">*</span></label>
                <input type="text" id="zip" name="zip" required placeholder="Postal code">
            </div>

            <hr>

            <h2>Card Details</h2>
            <div class="form-group">
                <label for="card-number">Card Number <span class="required">*</span></label>
                <input type="text" id="card-number" name="card-number" required>

                <label for="expiry-date">Expiry Date <span class="required">*</span></label>
                <input type="text" id="expiry-date" name="expiry-date" required>
            </div>
            <div class="form-group">
                <label for="cvv">CVV <span class="required">*</span></label>
                <input type="text" id="cvv" name="cvv" required>


                <label for="name">Name on Card <span class="required">*</span></label>
                <input type="text" id="name" name="name" required>
            </div>

            <button type="submit" value="submit">Submit</button>
        </form> -->


<!-- 

        <div class="policy-container">
            <div class="policies">
                <p>
                <h2>Hotel Policy:</h2>
                </p>
                Check-in After 2:00 PM <br>
                Check-out Before 12 noon <br>
                Room 1 Luxury Rooms<br>
                <h3>Guarantee Policy</h3>
                Your credit card will be charged with the final bill amount at the hotel. In case of late cancellation
                or No
                Show, hotel is authorized to charge the applicable cancellation charge, including any taxes and fees on
                the
                credit card used to guarantee the stay.
                <h3>Cancel Policy</h3>
                Guaranteed reservations may be cancelled 02 days prior to date of arrival without any cancellation
                charge.
                Cancellations received less than 02 days prior to arrival will incur 100% cancellation charge of the
                entire
                stay including applicable taxes and fees.
            </div>
        </div>
        </div> -->
        <!-- <div class="foo"> -->
        <!-- <div class="acknowledgement-container">
            <div class="acknowledgement">
                We will not be liable for any cancellation or no-show due to technical issues or unforeseen
                circumstances.<br>
        
                Acknowledgement<br>
                By completing this booking, I agree with the Booking Conditions.<br>
                <input type="checkbox" id="check" name="checkbox">I agree to all the applicable terms and Conditions.
            </div>
        </div>
        </div> -->
       <!-- list_rooms.php -->
<?php
include 'includes/dbconnection.php';

$query = "SELECT * FROM rooms";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $type = $row['type'];
    $price = $row['price'];
    // Output room details
    echo "
    <div class='room-card'>
        <h2>$type</h2>
        <p>Price: $$price per night</p>
        <form action='booking.php' method='post'>
            <input type='hidden' name='id' value='$id'>
            <input type='hidden' name='type' value='$type'>
            <input type='hidden' name='price' value='$price'>
            <button type='submit'>Select</button>
        </form>
    </div>";
}
?>
