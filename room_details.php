<?php
include 'includes/dbconnection.php';


session_start();
include('includes/dbconnroom.php');

// Function to check room availability
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $guests = $_POST['guests'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $query1 = "INSERT INTO bookings  (guests, checkin, checkout) VALUES('$guests', '$checkin', '$checkout')";
    $result1 = mysqli_query($conn, $query1);
}
?>
<?php
// Start the session
// session_start();
?>
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
<?php
include 'includes/dbconnection.php';

$query = "SELECT * FROM rooms";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $type = $row['type'];
    $price = $row['price'];
    // Output room details
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Royal Orchid</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            /* font-family: Arial, sans-serif; */
            font-feature-settings: 'dlig' 0, 'liga' 0, 'lnum' 1, 'kern' 1;
            margin: 0;
            color: #000000;
            font-size: 1.2rem;
            font-weight: 300;
            font-family: 'EB Garamond', serif;
            text-transform: none;
            line-height: 1.3;
        }

        .room-container {
            position: absolute;
            left: 5%;

        }

        .room-card {
            display: flex;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            width: 960px;
            margin: 20px auto;
            padding: 7px 7px 7px 7px;
            font-family: garamond;
            transition: box-shadow 0.3s ease;

        }

        .room-image img {
            width: 450px;
            height: auto;
            border-radius: 5px;
        }

        .room-details {
            padding: 20px;
            flex: 1;
        }

        .room-details h2 {
            margin-top: 0;
            font-size: 24px;
        }

        .room-details p {
            margin: 5px 0;
        }

        .room-details .room-details-link {
            color: #007bff;
            text-decoration: none;
        }

        .room-details .room-details-link:hover {
            text-decoration: underline;
        }

        hr {
            border: 0;
            border-top: 1px solid #ddd;
            margin: 10px 0;
        }

        .rate-details {
            margin-top: 10px;
        }

        .rate-details p {
            margin: 5px 0;
        }

        .rate-details ul {
            list-style-type: none;
            padding-left: 0;
        }

        .rate-details ul li {
            margin-bottom: 5px;
        }

        .price {
            font-size: 24px;
            font-weight: bold;
        }

        .price span {
            font-size: 14px;
            font-weight: normal;
        }

        .tax-note {
            font-size: 12px;
            color: #888;
        }

        .book-now {
            background-color: #ff6600;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .book-now:hover {
            background-color: #e65c00;
        }

        /* guest-info */
        body {
            font-family: Garamond, serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;

        }

        /* .booking-container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            padding: 15px;
            background-color: #fff;
            margin: 20px auto;
            width: 50%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        } */

        .booking-info {
            display: flex;
            flex-direction: row;
            width: 45%;
            margin-left: 5%;
            margin-top: 2%;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
            border-radius: 10px;
            background: transparent;
        }

        .booking-info>div {
            margin-bottom: 20px;
        }

        .booking-info span {
            font-weight: bold;
            color: #ff6600;
        }

        .room-selection {
            width: 50%;
        }

        .room-selection h2 {
            margin: 0 0 10px 0;
        }

        .steps {
            display: flex;
            justify-content: space-around;
            margin: 10px 0;
        }

        .step {
            padding: 10px;
            border-radius: 50%;
            background-color: #f0f0f0;
            text-align: center;
            width: 30px;
            height: 30px;
            line-height: 30px;
            color: #ccc;
        }

        .step.active {
            background-color: #008cba;
            color: #fff;
        }

        .view-sort-options {
            /* display: flex; */
            justify-content: space-between;
            position: absolute;
            top: 550px;
            left: 13%;
        }

        .view-sort-options select {
            padding: 5px;

        }

        .stay-summary {
            width: 25%;
            height: 40%;
            background-color: #fdf1e3;
            padding: 20px;
            border-radius: 5px;
            position: absolute;
            right: 100px;
        }

        .stay-summary h2 {
            margin: 0 0 10px 0;
        }

        .stay-details {
            margin-bottom: 20px;
        }

        .stay-details p {
            margin: 5px 0;
        }

        .total-cost {
            display: flex;
            justify-content: space-between;
        }

        .total-cost p {
            font-weight: bold;
            color: #000;
        }

        #guest-select,
        #checkin-date,
        #checkout-date {
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
        }

        /* footer */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {}

        a,
        a:hover,
        a:focus,
        a:active {
            text-decoration: none;
            outline: none;
        }

        a,
        a:active,
        a:focus {
            color: #333;
            text-decoration: none;
            transition-timing-function: ease-in-out;
            -ms-transition-timing-function: ease-in-out;
            -moz-transition-timing-function: ease-in-out;
            -webkit-transition-timing-function: ease-in-out;
            -o-transition-timing-function: ease-in-out;
            transition-duration: .2s;
            -ms-transition-duration: .2s;
            -moz-transition-duration: .2s;
            -webkit-transition-duration: .2s;
            -o-transition-duration: .2s;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        section {
            padding: 60px 0;
            /* min-height: 100vh;*/
        }



        .main-footer {
            position: relative;
            padding: 110px 0px 0px;
            background-color: #f4f5f7;
            background-repeat: repeat-x;
            background-position: right bottom;
        }

        .main-footer .footer-widget {
            position: relative;
            margin-bottom: 40px;
        }

        .main-footer .widgets-section {
            position: relative;
            padding-bottom: 60px;
        }

        .main-footer .footer-widget h2 {
            position: relative;
            font-size: 22px;
            font-weight: 600;
            color: #161c42;
            line-height: 1.2em;
            margin-bottom: 30px;
            margin-top: 25px;
            text-transform: capitalize;
        }

        .main-footer .about-widget {
            position: relative;
        }

        .main-footer .about-widget .logo {
            position: relative;
            margin-bottom: 15px;
            width: 210px;
        }

        .main-footer .about-widget .text {
            position: relative;
        }

        .main-footer .about-widget .text p {
            position: relative;
            color: #8a8d91;
            font-size: 15px;
            line-height: 1.7em;
            margin-bottom: 20px;
        }

        .main-footer .about-widget .text p:last-child {
            margin-bottom: 0px;
        }

        /* Footer List */

        .main-footer .footer-list {
            position: relative;
        }

        .main-footer .footer-list li {
            position: relative;
            margin-bottom: 17px;
        }

        .main-footer .footer-list li a {
            position: relative;
            color: #8a8d91;
            font-size: 15px;
            padding-left: 15px;
            -webkit-transition: all 300ms ease;
            -ms-transition: all 300ms ease;
            -o-transition: all 300ms ease;
            -moz-transition: all 300ms ease;
            transition: all 300ms ease;
        }

        .main-footer .footer-list li a:hover {
            text-decoration: underline;
            color: #ff6666;
        }

        .main-footer .footer-list li a:before {
            position: absolute;
            content: '\f105';
            left: 0px;
            top: 0px;
            color: #8a8d91;
            font-weight: 800;
            font-family: 'Font Awesome 5 Free';
        }

        /*Gallery Widget*/

        .main-footer .gallery-widget {
            position: relative;
            max-width: 350px;
        }

        .main-footer .gallery-widget .images-outer {
            position: relative;
            margin: 0px -3px;
        }

        .main-footer .gallery-widget .image-box {
            position: relative;
            float: left;
            width: 33.333%;
            padding: 0px 5px;
            margin-bottom: 10px;
        }

        .main-footer .gallery-widget .image-box img {
            position: relative;
            display: block;
            width: 100%;
            border-radius: 4px;
            -webkit-transition: all 300ms ease;
            -ms-transition: all 300ms ease;
            -o-transition: all 300ms ease;
            -moz-transition: all 300ms ease;
            transition: all 300ms ease;
        }

        .main-footer .gallery-widget .image-box img:hover {
            opacity: 0.70;
        }

        /* Info List */

        .main-footer .info-list {
            position: relative;
        }

        .main-footer .info-list li {
            position: relative;
            color: #8a8d91;
            font-size: 15px;
            line-height: 1.8em;
            margin-bottom: 12px;
        }

        .main-footer .info-widget .social-links {
            position: relative;
            float: left;
            padding: 15px 0px;
        }

        .main-footer .info-widget .social-links li {
            position: relative;
            margin-right: 8px;
            display: inline-block;
        }

        .main-footer .info-widget .social-links li:last-child {
            margin-right: 0px;
        }

        .main-footer .info-widget .social-links li a {
            position: relative;
            color: #ffffff;
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            border-radius: 50%;
            display: inline-block;
            -webkit-transition: all 300ms ease;
            -moz-transition: all 300ms ease;
            -ms-transition: all 300ms ease;
            -o-transition: all 300ms ease;
            transition: all 300ms ease;
        }

        .main-footer .info-widget .social-links li.google a {
            background-color: #dd4b39;
        }

        .main-footer .info-widget .social-links li.facebook a {
            background-color: #4a6fbe;
        }

        .main-footer .info-widget .social-links li.twitter a {
            background-color: #55acee;
        }

        .main-footer .info-widget .social-links li.instagram a {
            background-color: #ea4c89;
        }

        .main-footer .info-widget .social-links li.vimeo a {
            background-color: #1ab7ea;
        }

        .main-footer .footer-bottom {
            position: relative;
            padding: 20px 0px;
            border-top: 1px solid #e5e5e5;
        }

        .main-footer .footer-bottom .footer-nav {
            position: relative;
            text-align: right;
        }

        .main-footer .footer-bottom .footer-nav li {
            position: relative;
            padding-right: 10px;
            margin-right: 10px;
            line-height: 1.1em;
            display: inline-block;
            border-right: 1px solid #8a8d91;
        }

        .main-footer .footer-bottom .footer-nav li:last-child {
            padding-right: 0px;
            margin-right: 0px;
            border-right: none;
        }

        .main-footer .footer-bottom .footer-nav li a {
            position: relative;
            color: #8a8d91;
            font-size: 15px;
            -webkit-transition: all 300ms ease;
            -moz-transition: all 300ms ease;
            -ms-transition: all 300ms ease;
            -o-transition: all 300ms ease;
            transition: all 300ms ease;
        }

        .main-footer .footer-bottom .footer-nav li a:hover {
            color: #ff6666;
            text-decoration: underline;
        }


        /* guest details--form */
    </style>
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/dbconnection.php'; ?>

    <div class="hero-section">
        <img src="images/sealink_cover.jpg" alt="Hero Image">
    </div>
    <!-- <div class="hero-text">
            <h1 id="hero-heading">Welcome to Your Sanctuary in the Heart of Mumbai.</h1>
            <p id="hero-subtext">Experience Unmatched Comfort and Luxury in Every Detail.<br><br>Visit Us Today.</p>
            <button type="button" id="hero-button" onclick="" style="border: 2px black;">
                <h2>Book now</h2>
            </button>
        </div> -->
    </div>


    <!-- <div class="booking-container"> -->


    <div class="booking-info">
        <div class="guest-info">
            <form id="myForm" target="" action="" method="post">
                <span></i>Guests</span>

                <select id="guest-select" oninput="myFunction()" name="guests" required>
                    <option value="No. of guests">No. of guests</option>
                    <option value="1">1 Adult, 0 Children</option>
                    <option value="2">2 Adults, 0 Children</option>
                    <option value="1">1 Adult, 1 Child</option>
                    <option value="2">2 Adults, 1 Child</option>
                    <!-- Add more options as needed -->
                </select>
        </div>
        <div class="checkin-info" style="width: auto;">
            <span>Check-in</span>
            <input type="date" id="checkin-date" oninput="myFunction()" placeholder="Select Check-in Date"
                name="checkin" required>
        </div>
        <div class="checkout-info">
            <span>Check-out</span>
            <input type="date" id="checkout-date" oninput="myFunction()" placeholder="Select Check-out Date"
                name="checkout" required>
        </div>
        <div class="submit-button">
            <button type="submit" id="submit-button" onclick="myFunction3()">Check Availability</button>
        </div>
        </form>
    </div>


    </div>

    </div>
    </div>
    <div class="container-viewsort" style="display: flex; justify-content: space-evenly;">
        <div class="view-sort-options">
            <select>
                <option>View Results By</option>
                <option>Rooms</option>
            </select>
            <select>
                <option>Sort By</option>
                <option>Lowest Price</option>
            </select>
        </div>
    </div>




    <div class="stay-summary" style="position:fixed">
        <h2>Your Stay</h2>
        <div class="stay-details">
            <p>Check-in: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Check-out:
            </p>
            <p>After 2:00 PM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; before 12 noon</p>
            <p></p>
            <p id="guest-info"></p>
            <p id="checkin"></p>
            <p id="checkout"></p>




            <script>
                function myFunction() {

                    let text = document.getElementById("guest-select").value;
                    document.getElementById("guest-info").innerHTML = "Guests: " + text;

                    let text1 = document.getElementById("checkin-date").value;
                    document.getElementById("checkin").innerHTML = "Check-in date: " + text1;

                    let text2 = document.getElementById("checkout-date").value;
                    document.getElementById("checkout").innerHTML = "<p>Check-out date: " + text2;


                }
            </script>


            <!-- <script>
                    function myFunction1() {
                      let text1 = document.getElementById("checkout-date").value;
                      document.getElementById("checkout").innerHTML = "Check-in: " +text1;
                    }
                    </script> -->
            <!-- <p id="stay-dates">Wed, Jul 3, 2024 - Thu, Jul 4, 2024</p> -->

        </div>
        <!-- <hr> -->
        <!-- <div class="total-cost">
            <p>Total:</p>
            <p>₹0.00</p>
        </div> -->

        <div class="room-selection">
            <!-- <h2>Select a Room</h2> -->
            <!-- <div class="steps">
        <div class="step active">1</div>
        <div class="step">2</div>
        <div class="step">3</div>
    </div> -->

        </div>

    </div>




    <!-- room cards -->
    <div class="room-container">
        <?php
        include 'includes/dbconnection.php';
        $query = "SELECT rooms.id, rooms.type, rooms.size,rooms.description, rooms.features, rooms.price, images.image_name 
     FROM rooms 
     LEFT JOIN images ON rooms.id = images.id";
        $result = $conn->query($query);


        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $type = $row['type'];
            $description = $row['description'];
            $features = $row['features'];
            $price = $row['price'];
            $image_name = $row['image_name'];
            ?>

            <div class="room-card">
                <div class="room-image">
                    <?php echo "<img src='retrieve_image.php?id=$id' alt='$image_name'>"; ?>
                </div>
                <div class="room-details">

                    <h2> <?php echo $row["type"]; ?></h2> <br>

                    <h2 style="font-weight: 100;"><strong></strong></h2>
                    <?php
                    echo $row["size"] . "<br><br>";
                    echo $row["description"];

                    ?>
                    <hr>
                    <a href="#" class="room-details-link">Room details</a>
                    <div class="container" style="display: flex; padding: 20px 20px 20px 20px;">
                        <div class="rate-details">
                            <?php
                            echo $row["features"] . "<br><br>";
                            ?>
                        </div>
                        <div class="room-price" style="margin: auto; ">
                            <p class="price"><?php
                            echo "₹" . $row["price"];
                            ?><span> Per Night</span></p>
                            <p class="tax-note">Excluding taxes and fees</p>
                            <?php echo "
                            <form action='book_room.php' method='post'>
                                <input type='hidden' name='id' value='$id'>
                                <input type='hidden' name='type' value='$type'>
                                <input type='hidden' name='price' value='$price'>
                                <button class='book-now' type='submit'>Select</button>
                            </form>
                            "?>
                            <!-- <button class="book-now" onclick="window.location.href='book_room.php'">Book Now</button> -->
                        </div>

                    </div>
                    <hr>
                    <!-- <div class="container" style="display: flex;padding: 20px 20px 20px 20px;">
                        <div class="rate-details">
                            <?php
                            echo $row["features"] . "<br><br>";
                            ?>
                        </div>
                        <div class="room-price" style="margin: auto;">
                            <p class="price"><?php
                            echo "₹" . $row["price"];
                            ?><span>Per Night</span></p>
                            <p class="tax-note">Excluding taxes and fees</p>
                            <button class="book-now" onclick="window.location.href='book_room.php';">Book Now</button>
                        </div>

                    </div> -->

                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <br>




    <!-- JS -->
    <script>
        function myFunction2() {
            document.getElementById("myForm").submit();
        }
    </script>


    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="scripts.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script>
        window.addEventListener('scroll', function () {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            const text = "Welcome to Your Sanctuary in the Heart of Mumbai.";
            let index = 0;
            const speed = 50;
            const heroHeading = document.getElementById('hero-heading');
            const heroSubtext = document.getElementById('hero-subtext');
            const heroButton = document.getElementById('hero-button');

            function typeWriter() {
                if (index < text.length) {
                    heroHeading.style.width = `${index + 1}ch`;
                    heroHeading.textContent += text.charAt(index);
                    index++;
                    setTimeout(typeWriter, speed);
                } else {
                    heroSubtext.style.opacity = 1;
                    heroButton.style.opacity = 1;
                }
            }

            typeWriter();
        });
    </script>
<?php
}
?>
</body>

</html>