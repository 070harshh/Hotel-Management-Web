<script src="https://cdn.tailwindcss.com"></script>
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        a{
            color: #ffffff;
            text-decoration: none;
        }
    </style>


<div class="nav-container" id="navbar" >
    <div class="nav-row " >
        <div class="nav-logo" >
            <a href="index.php">
                <img src="images/logo.png" alt="Logo">
            </a>
        </div>
            <a href="">Destinations</a><h1>|</h1>
            <a href="room_details.php">Room Tariffs</a><h1>|</h1>
            <a href="room_details.php">Book Room</a><h1>|</h1>
            <a href="about_us.php">About us</a><h1>|</h1>
            <a href="contact_us.php">Contact Us</a><h1>|</h1>
        <!-- <div class="nav-controls"> -->
            <div class="flex space-x-6">
                <div class="relative dropdown">
                    <button a class="text-white-600 hover:text-white-800 focus:outline-none">Other services</button a><h1>|</h1>
                    <div class="absolute left-0 mt-2 w-64 bg-white shadow-md rounded-md py-2 z-20 dropdown-menu hidden">
                        <a href="#" class="block px-4 py-2 text-sm text-white-700 hover:bg-gray-100">Residential
                            Suites</a>
                        <a href="#" class="block px-4 py-2 text-sm text-white-700 hover:bg-gray-100">Special Offers</a>
                        <a href="#" class="block px-4 py-2 text-sm text-white-700 hover:bg-gray-100">Experiences</a>
                        <a href="#" class="block px-4 py-2 text-sm text-white-700 hover:bg-gray-100">Luxury Gifting By
                            Oberoi</a>
                        <a href="#" class="block px-4 py-2 text-sm text-white-700 hover:bg-gray-100">COU COU by
                            Oberoi</a>
                        <a href="#" class="block px-4 py-2 text-sm text-white-700 hover:bg-gray-100">Amadeo by Oberoi</a>
                        <a href="#" class="block px-4 py-2 text-sm text-white-700 hover:bg-gray-100">The Oberoi Concours
                            d'Elegance</a>
                        <a href="#" class="block px-4 py-2 text-sm text-white-700 hover:bg-gray-100">The O&MO
                            Alliance</a>
                        <a href="#" class="block px-4 py-2 text-sm text-white-700 hover:bg-gray-100">Best Rate
                            Guarantee</a>
                        <a href="#" class="block px-4 py-2 text-sm text-white-700 hover:bg-gray-100">Gift Card</a>
                        <a href="#" class="block px-4 py-2 text-sm text-white-700 hover:bg-gray-100">Gallery</a>
                        <a href="#" class="block px-4 py-2 text-sm text-white-700 hover:bg-gray-100">Awards</a>
                        <a href="#" class="block px-4 py-2 text-sm text-white-700 hover:bg-gray-100">About Us</a>
                    </div>
                </div>
                <!-- Add more nav items here -->
            </div>
            

        </div>
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