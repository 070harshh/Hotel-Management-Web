<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Destinations-The Royal Orchid</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-gray-100">
   <?php include 'includes/header.php';?>
<BR>
    <div class="container mx-auto px-4 py-8">
        <!-- <h1 class="text-3xl font-bold text-gray-800 mb-6">Our Destinations</h1> -->
<bR><BR>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Example Destination Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://dummyimage.com/600x400" alt="Destination" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-bold text-gray-800">Agra - The Oberoi Amarvilas</h2>
                    <p class="text-gray-600 mt-2">Experience the luxury and grandeur of The Oberoi Amarvilas in Agra.</p>
                    <a href="#" class="text-indigo-500 hover:underline mt-4 inline-block">Learn More</a>
                </div>
            </div>

            <!-- Duplicate the above block for other destinations -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://dummyimage.com/600x400" alt="Destination" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-bold text-gray-800">Bengaluru - The Oberoi, Bengaluru</h2>
                    <p class="text-gray-600 mt-2">Discover the beauty and serenity of The Oberoi, Bengaluru.</p>
                    <a href="#" class="text-indigo-500 hover:underline mt-4 inline-block">Learn More</a>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://dummyimage.com/600x400" alt="Destination" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-bold text-gray-800">Mumbai - The Oberoi, Mumbai</h2>
                    <p class="text-gray-600 mt-2">Enjoy the vibrant city life at The Oberoi, Mumbai.</p>
                    <a href="#" class="text-indigo-500 hover:underline mt-4 inline-block">Learn More</a>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://dummyimage.com/600x400" alt="Destination" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-bold text-gray-800">New Delhi - The Oberoi, New Delhi</h2>
                    <p class="text-gray-600 mt-2">Explore the rich culture and heritage at The Oberoi, New Delhi.</p>
                    <a href="#" class="text-indigo-500 hover:underline mt-4 inline-block">Learn More</a>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://dummyimage.com/600x400" alt="Destination" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-bold text-gray-800">Jaipur - The Oberoi Rajvilas</h2>
                    <p class="text-gray-600 mt-2">Experience royal luxury at The Oberoi Rajvilas in Jaipur.</p>
                    <a href="#" class="text-indigo-500 hover:underline mt-4 inline-block">Learn More</a>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://dummyimage.com/600x400" alt="Destination" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-bold text-gray-800">Udaipur - The Oberoi Udaivilas</h2>
                    <p class="text-gray-600 mt-2">Relish the majestic views at The Oberoi Udaivilas in Udaipur.</p>
                    <a href="#" class="text-indigo-500 hover:underline mt-4 inline-block">Learn More</a>
                </div>
            </div>

            <!-- Repeat for more destinations as needed -->

        </div>
    </div>
    <script>
            window.addEventListener('scroll', function () {
                const navbar = document.getElementById('navbar');
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
    <script>
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
