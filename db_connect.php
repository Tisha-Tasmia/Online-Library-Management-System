<?php
$servername = "localhost"; // Replace with your actual server name if different
$username = "your_username"; // Replace with your actual username
$password = "your_password"; // Replace with your actual password
$dbname = "your_database_name"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// You can optionally close the connection at the end of your script
// $conn->close(); 
?>
