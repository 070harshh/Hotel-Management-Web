<?php
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

// Get room ID from URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // Fetch image data from the database
    $query = "SELECT image FROM images WHERE id = $id LIMIT 1";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imageData = $row['image'];

        // Output the image
        header("Content-type: image/jpeg");
        echo $imageData;
    } else {
        echo "Image not found.";
    }
} else {
    echo "Invalid room ID.";
}

// Close the connection
$conn->close();
?>
