<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Royal Orchid</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-feature-settings: 'dlig' 0, 'liga' 0, 'lnum' 1, 'kern' 1;
            margin: 0;
            color: #000000;
            font-size: 1.2rem;
            font-weight: 300;
            font-family: 'EB Garamond', serif;
            text-transform: none;
            line-height: 1.3;
            padding: none;
        }



        /* hero */
        /* .hero-container {
            width: 1519px;
            height: 570px;
            background: linear-gradient(-90deg, rgba(0, 0, 0, .01) .51%, rgba(0, 0, 0, .3) 62.06%, rgba(0, 0, 0, .5) 99.78%);
            /* padding-top: 150px; */

        } */
    </style>
</head>

<body>
    <?php include 'includes/header.php'; ?>

    <div class="hero-section">
        <img src="images/pool.jpg" alt="Hero Image">

        <!-- <div class="hero-text">
            <p class="herosubtext">Discover the ultimate sanctuary in Mumbai, where luxury and comfort are our top
                priorities.</p>

            <div class="hero-container">
                <h1 class="heroheading">Welcome to Your Sanctuary in the Heart of Mumbai.</h1>
                <p class="herosubtext">Experience Unmatched Comfort and Luxury in Every Detail.<br><br>Visit Us Today.
                </p>
                <button type="button" id="hero-button" onclick="header.window(" room_details.php") " style=" border: 2px
                    black;"> -->
                    <h2>Book now</h2>
                </button>
            </div>
        </div>
    </div>
    <div class="booking-menu">
        <select name="location" id="location" Required>
            <option value="shimla">Mumbai - Wildflower Hall.Royal Orchid</option>
            <option value="shimla">Shimla - Granduer,Royal Orchid</option>
            <option value="shimla">Delhi - Royal Orchid Delhi</option>
            <!-- Add more options as needed -->
        </select>

        <label for="checkin">Checkin</label>
        <input type="date" id="checkin" name="checkin" Required>

        <label for="checkout">Checkout</label>
        <input type="date" id="checkout" name="checkout" Required>

        <select name="room" id="room" required>
            <label for="room"><br>Rooms Required</label>
            <option value="1">Room 01</option>
            <option value="2">Room 02</option>
            <!-- Add more options as needed -->
        </select>

        <select name="guests" id="guests" required>
            <option value="1">Guests 01</option>
            <option value="2">Guests 02</option>
            <!-- Add more options as needed -->
        </select>

        <button type="button" onclick="window.location.href='room_details.php'">View Availability</button>
    </div>

    <!-- <div class="container"> -->
    <div class="row">
        <section class="text-black-400 bg-gray-200 body-font">
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                <div
                    class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-small text-black">Welcome To
                        <br class="hidden lg:inline-block">Mumbai
                    </h1>
                    <p class="mb-8 leading-relaxed">Copper mug try-hard pitchfork pour-over freegan heirloom neutra air
                        plant cold-pressed tacos poke beard tote bag. Heirloom echo park mlkshk tote bag selvage hot
                        chicken authentic tumeric truffaut hexagon try-hard chambray.</p><br>
                    <!-- <p class="mb-8 leading-relaxed">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iure ea
                        quaerat deleniti iusto commodi, nisi earum asperiores, blanditiis ut molestiae dignissimos eius
                        est placeat deserunt quis natus debitis ex amet!</p> -->
                    <div class="flex justify-center">
                        <button
                            class="inline-flex text-black bg-gray-200 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Button</button>
                        <button
                            class="ml-4 inline-flex text-black-400 bg-gray-500 border-0 py-2 px-6 focus:outline-none hover:bg-gray-700 hover:text-black rounded text-lg">Button</button>
                    </div>
                </div>
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                    <img class="object-cover object-center rounded image" alt="hero" src="images/heromumbai.jpg" style="width: 100%; height: auto;">
                </div>
            </div>
        </section>
    </div>
    <!-- </div> -->


    <!-- awards -->
    <section class="recognition">
        <h2>Recognition.</h2>
        <p>For which we thank our guests and our people.</p>
        <div class="awards-container">
            <div class="award">
                <h3>Best City Hotel (Editor’s Choice)</h3>
                <p>2023</p>
                <p>Travel + Leisure, India’s Best Awards</p>
            </div>
            <div class="divider"></div>
            <div class="award">
                <h3>Editor’s Choice for Best Bleisure Hotel in India</h3>
                <p>2022</p>
                <p>Travel + Leisure, India’s Best Awards</p>
            </div>
            <div class="divider"></div>
            <div class="award">
                <h3>Top 25 Hotels in India (Ranked 3rd)</h3>
                <p>2022</p>
                <p>TripAdvisor Travelers’ Choice Awards</p>
            </div>
            <div class="divider"></div>
            <div class="award">
                <h3>Top 25 Luxury Hotels in India</h3>
                <p>2022</p>
                <p>TripAdvisor Travelers’ Choice Awards</p>
            </div>
        </div>
        <a href="#" class="view-all-awards">VIEW ALL AWARDS</a>
    </section>

    <!-- magazine -->


    <body style="font-family: 'Open Sans', sans-serif; margin: 0; padding: 0; background-color: #f0f0f0; color: #333;">
        <div style="padding: 20px;">
            <h1 style="font-size: 24px; font-weight: normal;">THE OBEROI MAGAZINE</h1>
            <h2 style="font-size: 36px; font-weight: 300; margin-bottom: 20px;">Stories to inspire new journeys.</h2>
            <div style="display: flex; gap: 20px; overflow: auto;">
                <div
                    style="flex: 0 0 300px; background-color: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                    <img src="images/mag1.webp" alt="Card image 1"
                        style="width: 100%; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                    <div style="padding: 15px;">
                        <h3 style="font-size: 16px; font-weight: bold; margin: 0;">ART</h3>
                        <h4 style="font-size: 20px; font-weight: normal; margin: 5px 0;">Art at the Heart: A Cultural
                            Makeover for Mumbai’s Business Precinct</h4>
                        <p style="font-size: 14px; color: #888;">By Sohini Dasgupta</p>
                        <p style="font-size: 14px;">Nita Mukesh Ambani Cultural Centre brings to the city a vibrant
                            space for the world of music, dance, ...</p>
                    </div>
                </div>
                <div
                    style="flex: 0 0 300px; background-color: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                    <img src="images/mag2.webp" alt="Card image 2"
                        style="width: 100%; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                    <div style="padding: 15px;">
                        <h3 style="font-size: 16px; font-weight: bold; margin: 0;">WANDERLUST</h3>
                        <h4 style="font-size: 20px; font-weight: normal; margin: 5px 0;">A Perfect Mountain Retreat</h4>
                        <p style="font-size: 14px; color: #888;">By Vir Sanghvi</p>
                        <p style="font-size: 14px;">I sometimes feel as though the legacy of Lord Kitchener has pursued
                            me all of my life. I studied his ...</p>
                    </div>
                </div>
                <div
                    style="flex: 0 0 300px; background-color: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                    <img src="images/mag3.webp" alt="Card image 3"
                        style="width: 100%; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                    <div style="padding: 15px;">
                        <h3 style="font-size: 16px; font-weight: bold; margin: 0;">WANDERLUST</h3>
                        <h4 style="font-size: 20px; font-weight: normal; margin: 5px 0;">In the shadow of TAJ</h4>
                        <p style="font-size: 14px; color: #888;">By Vir Sanghvi</p>
                        <p style="font-size: 14px;">In 1992, Prince Charles, the Prince of Wales and heir to the British
                            Throne visited India along with ...</p>
                    </div>
                </div>

            </div>
            <a href="#"
                style="display: inline-block; margin-top: 20px; font-size: 14px; color: #ff7f00; text-decoration: none;">View
                all stories</a>
        </div>




        <!-- gallery -->
        <section class="text-gray-400 bg-gray-900 body-font">
            <div class="container px-5 py-24 mx-auto flex flex-wrap">
                <div class="flex w-full mb-20 flex-wrap">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-white lg:w-1/3 lg:mb-0 mb-4">Catch a
                        glimpse
                    </h1>
                    <p class="lg:pl-6 lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr
                        hexagon
                        brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't
                        heard of
                        them man bun deep jianbing selfies heirloom.</p>
                </div>
                <div class="flex flex-wrap md:-m-2 -m-1">
                    <div class="flex flex-wrap w-1/2">
                        <div class="md:p-2 p-1 w-1/2">
                            <img alt="gallery" class="w-full object-cover h-full object-center block"
                                src="images/img2.webp">
                        </div>
                        <div class="md:p-2 p-1 w-1/2">
                            <img alt="gallery" class="w-full object-cover h-full object-center block"
                                src="images/img3.webp">
                        </div>
                        <div class="md:p-2 p-1 w-full">
                            <img alt="gallery" class="w-full h-full object-cover object-center block"
                                src="images/img7.webp">
                        </div>
                    </div>
                    <div class="flex flex-wrap w-1/2">
                        <div class="md:p-2 p-1 w-full">
                            <img alt="gallery" class="w-full h-full object-cover object-center block"
                                src="images/img5.webp">
                        </div>
                        <div class="md:p-2 p-1 w-1/2">
                            <img alt="gallery" class="w-full object-cover h-full object-center block"
                                src="images/img6.webp">
                        </div>
                        <div class="md:p-2 p-1 w-1/2">
                            <img alt="gallery" class="w-full object-cover h-full object-center block"
                                src="images/img4.webp">
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- Footer -->
        <!-- Footer -->

        <?php include 'includes/footer.php'; ?>
        <?php include 'includes/dbconnection.php'; ?>

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
                const speed = 70;
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
    </body>

</html>