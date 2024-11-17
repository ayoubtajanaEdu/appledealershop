<?php
// Database connection settings
$servername = "localhost"; // Server name (or IP address)
$username = "root";        // Database username
$password = "";            // Database password (if any)
$dbname = "your_database"; // Name of the database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully!";
}

// Close the connection (optional)
$conn->close();
?>
