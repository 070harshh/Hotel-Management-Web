<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php'; // Ensure this path is correct

// Load configuration
$config = require 'C:\xampp\phpMyAdmin\config.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve form data
    $name = isset($_GET['name']) ? $_GET['name'] : '';
    $email = isset($_GET['email']) ? $_GET['email'] : '';
    // $bookingDetails = isset($_GET['details']) ? $_GET['details'] : '';

    if (empty($name) || empty($email)) {
        echo 'Missing required form data.';
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email address.';
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = $config['smtp']['host'];
        $mail->SMTPAuth   = true;
        $mail->Username   = 'projectemailid29@gmail.com'; // Your email address
        $mail->Password   = 'aata foyu aiue iusj';     // Your app-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('s22cp13@gmail.com', 'Royal Orchid');
        $mail->addAddress($email, $name);


        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Booking Confirmation';
        $mail->Body    = '<p>Dear ' . htmlspecialchars($name) . ',</p>'
                       . '<p>Thank you for your booking. Here are your booking details:</p>'

                    //    . '<p>' . nl2br(htmlspecialchars($bookingDetails)) . '</p>'
                       . '<p>Best regards,<br>Royal Orchid</p>';

        $mail->send();
        echo 'Email sent successfully.';
        header('Location:index.php');
    } catch (Exception $e) {
        echo "Failed to send email. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request method.";
}
?>