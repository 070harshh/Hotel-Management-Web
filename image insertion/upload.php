<?php
// Database configuration
    // Database configuration
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'hoteldb';

// Create database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database connection


// Check connection


if (isset($_POST['submit'])) {
    // Get image name
    $imageName = $_FILES['image']['name'];
    
    // Get image file
    $image = $_FILES['image']['tmp_name'];
    
    // Read image file into a variable
    $imgContent = addslashes(file_get_contents($image));
    
    // Insert image into the database
    $sql = "INSERT INTO images (image, image_name) VALUES ('$imgContent', '$imageName')";
    
    if ($conn->query($sql) === TRUE) {
        echo "File uploaded successfully.";
    } else {
        echo "File upload failed, please try again.";
    }
}

// Close the connection
$conn->close();
?>
