<?php
include 'db_connect.php';

if (isset($_POST['submit_review'])) {
    // Process the submitted review
    $book_id = $_POST['book_id'];
    $user_id = $_SESSION['user_id'];
    $rating = $_POST['rating'];
    $review_text = $_POST['review_text'];
    // ... (Insert review into database) ...
    echo "<p>Review submitted successfully!</p>";
}

// Display book reviews
$book_id = $_GET['book_id']; 

$sql = "SELECT u.name, r.rating, r.review_text 
        FROM reviews r 
        JOIN users u ON r.user_id = u.user_id 
        WHERE r.book_id = '$book_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Book Reviews:</h2>";
    while($row = $result->fetch_assoc()) {
        echo "<div class='review'>";
        echo "<p>By: " . $row["name"] . "</p>";
        echo "<p>Rating: " . $row["rating"] . "</p>";
        echo "<p>" . $row["review_text"] . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>No reviews found for this book.</p>";
}

$conn->close();
?>
