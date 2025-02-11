<?php
include 'db_connect.php'; // Include your database connection file

$searchTerm = $_GET['q'];

// SQL query to search for books
$sql = "SELECT * FROM books WHERE title LIKE '%" . $searchTerm . "%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display search results
    while($row = $result->fetch_assoc()) {
        echo "<p>" . $row["title"] . " by " . $row["author"] . "</p>";
    }
} else {
    echo "No results found.";
}

$conn->close();
?>
