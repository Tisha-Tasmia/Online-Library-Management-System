<?php
include 'db_connect.php';

$user_id = $_SESSION['user_id']; 

// Fetch user information from the database
$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h2>Your Profile:</h2>";
    echo "<p>Name: " . $row["name"] . "</p>";
    echo "<p>Email: " . $row["email"] . "</p>";
    // Display other user details 
} else {
    echo "<p>User not found.</p>";
}

$conn->close();
?>
