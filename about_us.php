<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - The Royal Orchid Mumbai</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Customize your styles here */

        /* Ensure existing styles for header and navbar remain intact */
        body {
          font-feature-settings: 'dlig' 0, 'liga' 0, 'lnum' 1, 'kern' 1;
            margin: 0;
            color: #000000;
            font-size: 1.2rem;
            font-weight: 300;
            font-family: 'EB Garamond', serif;
            text-transform: none;
            line-height: 1.3;
        }

        /* Navbar styles */
        .nav-container {
            background: transparent;
            position: fixed;
            width: 100%;
            z-index: 1000;
            transition: background-color 0.5s ease;
        }

        .nav-container.scrolled {
            background: rgba(0, 0, 0, 0.8);
        }

        .nav-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
        }

        .nav-logo img {
            max-height: 70px;
        }

        .nav-controls a {
            color: rgb(243, 189, 216);
            margin-left: 20px;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .nav-controls a:hover {
            color: #C57ED3;
        }

        /* Main content section */
        .main-content {
            background-color: #fff;
            padding: 50px 20px;
        }

        .main-content .card {
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
        }

        .main-content h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #4a4a4a;
        }

        .main-content p {
            font-size: 1.2em;
            line-height: 1.6;
            margin-bottom: 20px;
            color: #666;
        }

        /* Footer styles */
        .footer {
            background-color: #333;
            color: #fff;
            padding: 50px 20px;
            text-align: center;
        }

        .footer p {
            font-size: 1em;
            margin-bottom: 10px;
            color: #ccc;
        }

        .footer .social-icons {
            margin-top: 20px;
        }

        .footer .social-icons a {
            color: #ccc;
            margin: 0 10px;
            font-size: 1.5em;
            transition: color 0.3s ease;
        }

        .footer .social-icons a:hover {
            color: #fff;
        }
    </style>
</head>

<body>
  <?php include 'includes/header.php'; ?>
  <?php include 'includes/dbconnection.php'; ?>

    <!-- <div class="main-content"> -->
        <!-- <div class="container"> -->
            <!-- <h2>About Us</h2> -->

            <!-- Card 1: Our Story
            <div class="card" style="border-radius: 5px;">
                <section class="text-gray-400 bg-purple-200 body-font" style="border-radius: 5px;">
                    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-left">
                        <div
                            class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-left text-left">
                            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-500">
                                <h1>Our Story</h1>
                                <br class="hidden lg:inline-block">
                            </h1>
                            <p class="mb-8 leading-relaxed">
                            <p>Welcome to The Royal Orchid Mumbai, where luxury meets comfort. Nestled in the heart of
                                Mumbai, our hotel offers unparalleled hospitality and a unique blend of traditional
                                elegance with modern amenities.</p>
                            <p>Established with a vision to redefine luxury accommodation, we strive to create memorable
                                experiences for our guests, ensuring every stay is exceptional.</p>
                            <div class="flex justify-center">

                            </div>
                        </div>
                        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                            <img class="object-cover object-center rounded" alt="hero" src="images/aboutus.jpg">
                        </div>
                    </div>
                </section>

            </div> -->

            <!-- Card 2: Mission and Values -->
            <!-- <div class="card" style="border-radius: 5px;">
                <section class="text-gray-400 bg-purple-200 body-font" style="border-radius: 5px;">
                    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-left">
                        <div
                            class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-left text-left">
                            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-500">
                                <h1>Mission and Values</h1>
                                <br class="hidden lg:inline-block">
                            </h1>
                            <p>At The Royal Orchid Mumbai, our mission is to provide an oasis of luxury and relaxation
                                amidst the bustling city. We are committed to:</p>
                            <ul>
                                <li>Exceeding guest expectations through personalized service.</li>
                                <li>Creating a warm and welcoming environment for all our guests.</li>
                                <li>Embracing sustainability and responsible tourism practices.</li>
                                <li>Supporting our local community and cultural heritage.</li>
                            </ul>
                            <div class="flex justify-center">

                            </div>
                        </div>
                        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6" >
                        <img class="object-cover object-center rounded" alt="hero" src="images/aboutus.jpg">
                      </div>
                    </div>
                </section> -->

            <!-- </div>

            <!-- Card 3: Our Facilities -->
            <!-- <div class="card" style="border-radius: 5px;">
                <section class="text-gray-400 bg-purple-200 body-font" style="border-radius: 5px;">
                    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-left">
                        <div
                            class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-left text-left">
                            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-500">
                                <h1>Our Facilities</h1>
                                <br class="hidden lg:inline-block">
                            </h1>
                            <p class="mb-8 leading-relaxed">
                            <p>Discover a sanctuary amidst the bustling city, where every detail is crafted to exceed
                                your expectations. Our world-class facilities include:</p>
                            <ul>
                                <li>Luxurious rooms and suites with breathtaking views.</li>
                                <li>Exceptional dining experiences featuring local and international cuisines.</li>
                                <li>State-of-the-art conference and event spaces.</li>
                                <li>Spa and wellness center offering rejuvenating treatments.</li>
                                <li>Outdoor pool and fitness facilities.</li>
                            </ul> -->
                            <!-- <div class="flex justify-center">

                            </div>
                        </div>
                        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                            <img class="object-cover object-center rounded" alt="hero" src="images/aboutus.jpg">
                        </div>
                    </div>
                </section> -->

            <!-- </div> --> 


            <!-- blog -->
            
            <section class="title container">
                
                  <div class="col-md-12">
                    <h1>About Us</h1>
                    <div class="seperator"></div>
                    <p>Story and mission of our Hotel.</p>
                  </div>
                
              </section>
              
              <!-- Start Blog Layout -->
              <div class="container">
                <div class="row">
                  <div class="col-md-6 item">
                    <div class="item-in">
                      <h4>Our Motto:</h4>
                      <div class="seperator"></div>
                      <p>

                        "Excellence in Every Experience"
                        
                        At Oberoi Hotels, we believe in delivering unparalleled luxury and service to create unforgettable memories for our guests. Our commitment to excellence ensures that every moment spent with us is extraordinary, from the elegant ambiance and exceptional dining to the personalized care and attention. Welcome to a world where your comfort and satisfaction are our highest priorities.</p>
                      <a href="#">Read More
                        <i class="fa fa-long-arrow-right"></i>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-6 item">
                    <div class="item-in">
                      <h4>Some Kind of Title</h4>
                      <div class="seperator"></div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi expedita eveniet consectetur, voluptates voluptatum, sit excepturi earum. Veniam eius amet, accusantium, deserunt officia, quos qui debitis laboriosam velit quis autem!</p>
                      <a href="#">Read More
                        <i class="fa fa-long-arrow-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <!-- <p style="text-align:center;">With Icons <em>(hover over icons)</em></p> -->
                <!-- With Icons -->
                <div class="row">
                  <div class="col-md-6 item">
                    <div class="item-in">
                      <!-- <div class="icon">
                        <a href="#">
                        
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16.662 16.662" xml:space="preserve" width="512px" height="512px">
                          <g>
                            <path d="M13.365,0.324H3.297L0,5.109l8.331,11.229l8.331-11.229C16.662,5.109,13.365,0.324,13.365,0.324z    M15.213,4.734h-3.4l1.298-3.054C13.111,1.68,15.213,4.734,15.213,4.734z M12.526,1.303l-1.342,3.156L9.071,1.303H12.526z    M10.544,4.734H6.442l1.909-3.273L10.544,4.734z M7.648,1.303L5.856,4.378L4.185,1.303H7.648z M3.584,1.634l1.685,3.1h-3.82   C1.449,4.734,3.584,1.634,3.584,1.634z M1.45,5.421h4.124l1.95,8.184C7.524,13.605,1.45,5.421,1.45,5.421z M6.279,5.421h4.548   l-2.468,8.732C8.359,14.153,6.279,5.421,6.279,5.421z M9.28,13.413l2.259-7.992h3.672L9.28,13.413z" fill="#777777"/>
                          </g>
                          </svg>
                           <div class="icon-topic">Work Topic</div>
                          </a>
                      </div> -->
                      <h4>Some Kind of Title</h4>
                      <div class="seperator"></div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi expedita eveniet consectetur, voluptates voluptatum, sit excepturi earum. Veniam eius amet, accusantium, deserunt officia, quos qui debitis laboriosam velit quis autem!</p>
                      <a href="#">Read More
                        <i class="fa fa-long-arrow-right"></i>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-6 item">
                    <div class="item-in">
                      <!-- <div class="icon">
                        <a href="#">
                      
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16.662 16.662" xml:space="preserve" width="512px" height="512px">
                          <g>
                            <path d="M13.365,0.324H3.297L0,5.109l8.331,11.229l8.331-11.229C16.662,5.109,13.365,0.324,13.365,0.324z    M15.213,4.734h-3.4l1.298-3.054C13.111,1.68,15.213,4.734,15.213,4.734z M12.526,1.303l-1.342,3.156L9.071,1.303H12.526z    M10.544,4.734H6.442l1.909-3.273L10.544,4.734z M7.648,1.303L5.856,4.378L4.185,1.303H7.648z M3.584,1.634l1.685,3.1h-3.82   C1.449,4.734,3.584,1.634,3.584,1.634z M1.45,5.421h4.124l1.95,8.184C7.524,13.605,1.45,5.421,1.45,5.421z M6.279,5.421h4.548   l-2.468,8.732C8.359,14.153,6.279,5.421,6.279,5.421z M9.28,13.413l2.259-7.992h3.672L9.28,13.413z" fill="#777777"/>
                          </g>
                          </svg>
                           <div class="icon-topic">Another Category or Post Type</div>
                          </a>
                      </div> -->
                      <h4>Some Kind of Title</h4>
                      <div class="seperator"></div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi expedita eveniet consectetur, voluptates voluptatum, sit excepturi earum. Veniam eius amet, accusantium, deserunt officia, quos qui debitis laboriosam velit quis autem!</p>
                      <a href="#">Read More
                        <i class="fa fa-long-arrow-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              
<!-- reviews -->
              <div class="container" style="justify-content: center;">
            <figure class="snip1533">
                <figcaption>
                  <blockquote>
                    <p>Fantastic stay! The service was impeccable, and the rooftop restaurant offered stunning views. Highly recommend for a luxurious experience.</p>
                  </blockquote>
                  <h3>Wisteria Ravenclaw</h3>
                  <h4>Delhi</h4>
                </figcaption>
              </figure>
              <figure class="snip1533">
                <figcaption>
                  <blockquote>
                    <p>Exceeded expectations! Beautiful decor, excellent spa services, and a serene garden. The concierge was very helpful. Will definitely return.</p>
                  </blockquote>
                  <h3>Ursula Gurnmeister</h3>
                  <h4>Sydney</h4>
                </figcaption>
              </figure>
              <figure class="snip1533">
                <figcaption>
                  <blockquote>
                    <p>Wonderful stay with spacious rooms and delicious food. Wi-Fi was a bit slow, but the friendly staff made up for it. Highly recommend.
                    </p>
                  </blockquote>
                  <h3>Ingredia Nutrisha</h3>
                  <h4>London</h4>
                </figcaption>
              </figure>

              <figure class="snip1533">
                <figcaption>
                  <blockquote>
                    <p>Exceptional experience! Perfect location, comfortable rooms, and outstanding service. The breakfast buffet was delicious. Can't wait to come back.
                    </p>
                  </blockquote>
                  <h3>Michael Lee</h3>
                  <h4>Los Angeles</h4>
                </figcaption>
              </figure>
            </div>


       <!-- footer -->
      <?php include 'includes/footer.php'; ?>


            <script src="script.js"></script>
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
                    const text = "About Us";
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

            <script>      
            /* Demo purposes only */
            $(".hover").mouseleave(
              function() {
                $(this).removeClass("hover");
              }
            );
            </script>
</body>
</html>