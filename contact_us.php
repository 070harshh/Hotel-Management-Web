<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Royal Orchid - Contact Us</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
            height: 100%;
        }

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

        .nav-logo {
            max-height: 80px;
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

        .hero-section {
            position: relative;
            text-align: center;
            color: white;
        }

        .hero-section img {
            width: 100%;
            height: auto;
        }

        .hero-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: 500;
        }

        .hero-text h1 {
            font-size: 2em;
            white-space: nowrap;
            overflow: hidden;
            border-right: 0.15em solid #f3bdd8;
            width: 0;
        }

        .hero-text p {
            font-size: 1.2em;
            opacity: 0;
        }

        .hero-text button {
            opacity: 0;
        }

        .contact-section {
            padding: 100px 20px;
            background-color: #f3f3f3;
            text-align: center;
        }

        .contact-section h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .contact-form {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        .contact-form input:focus,
        .contact-form textarea:focus {
            border-color: #ff6700;
        }

        .contact-form button {
            background-color: #ff6700;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .contact-form button:hover {
            background-color: #e65c00;
        }

        .contact-info {
            display: flex;
            justify-content: space-around;
            margin-top: 50px;
        }

        .contact-info div {
            flex: 1;
            padding: 20px;
        }

        .contact-info div h3 {
            margin-bottom: 10px;
        }

        .contact-info div p {
            margin: 5px 0;
        }

        @media (max-width: 768px) {
            .contact-info {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
       <?php include 'includes/header.php'; ?>


    <!-- <div class="hero-section">
        <img src="images/hero.jpg" alt="Hero Image">
        <div class="hero-text">
            <h1 id="hero-heading">Contact The Royal Orchid</h1>
            <p id="hero-subtext">We are here to assist you with any inquiries or concerns.</p>
        </div>
    </div> -->
    
        <div class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
            
        </div>
    <div class="contact-section">
        <h1>Get in Touch</h1>
        <div class="contact-form">
            <form action="submit_contact_form.php" method="POST">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>
        <div class="contact-info">
            <div>
                <h3>Our Address</h3>
                <p>123 Royal Orchid Street, Mumbai, India</p>
                <p>Phone: +91 12345 67890</p>
                <p>Email: info@theroyalorchid.com</p>
            </div>
            <div>
                <h3>Follow Us</h3>
                <p>Facebook: @RoyalOrchid</p>
                <p>Twitter: @RoyalOrchid</p>
                <p>Instagram: @RoyalOrchid</p>
            </div>
        </div>
    </div>


    <?php include 'includes/footer.php'; ?>


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
    </script>
</body>

</html>
