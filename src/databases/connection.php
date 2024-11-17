<?php
// Database connection settings
$servername = "localhost"; // Usually 'localhost' if the database is on the same server
$username = "root";        // Your MySQL username (change this if necessary)
$password = "";            // Your MySQL password (change this if necessary)
$dbname = "apple_dealer";  // The name of your database

// Create connection using MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Exit with error message if connection fails
}

// Uncomment below to confirm connection (for debugging purposes)
// echo "Connected successfully";

// Optionally, set character encoding to UTF-8 for better character handling
$conn->set_charset("utf8");

// You can now use $conn to interact with the database
?>
