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
// include 'includes/dbconnection.php';

// $query = "SELECT * FROM rooms";
// $result = mysqli_query($conn, $query);

// while ($row = mysqli_fetch_assoc($result)) {
//     $id = $row['id'];
//     $type = $row['type'];
//     $price = $row['price'];
//     // Output room details
//     echo "
//     <div class='room-card'>
//         <h2>$type</h2>
//         <p>Price: $$price per night</p>
//         <form action='booking.php' method='post'>
//             <input type='hidden' name='id' value='$id'>
//             <input type='hidden' name='type' value='$type'>
//             <input type='hidden' name='price' value='$price'>
//             <button type='submit'>Select</button>
//         </form>
//     </div>";
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Navbar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="text-xl font-bold text-gray-800">Logo</div>
                <div class="flex space-x-6">
                    <div class="relative dropdown">
                        <button class="text-gray-600 hover:text-gray-800 focus:outline-none">Destinations</button>
                        <div class="absolute left-0 mt-2 w-64 bg-white shadow-md rounded-md py-2 z-20 dropdown-menu hidden">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Residential Suites</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Special Offers</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Experiences</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Luxury Gifting By Oberoi</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">COU COU by Oberoi</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Amadeo by Oberoi</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">The Oberoi Concours d'Elegance</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">The O&MO Alliance</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Best Rate Guarantee</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Gift Card</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Gallery</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Awards</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">About Us</a>
                        </div>
                    </div>
                    <!-- Add more nav items here -->
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold">Dropdown Navbar Example</h1>
    </div>

    <script>
        // Optional: Add JavaScript to handle the dropdown behavior on small screens
        document.addEventListener('DOMContentLoaded', function () {
            const dropdown = document.querySelector('.dropdown');
            const dropdownMenu = dropdown.querySelector('.dropdown-menu');

            dropdown.addEventListener('mouseenter', function () {
                dropdownMenu.classList.remove('hidden');
            });

            dropdown.addEventListener('mouseleave', function () {
                dropdownMenu.classList.add('hidden');
            });
        });
    </script>
</body>
</html>
