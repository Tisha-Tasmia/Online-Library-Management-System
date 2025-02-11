<?php
include 'db_connect.php';

// Handle loan issuance, renewals, and returns here

if (isset($_POST['issue_book'])) {
    // Process book issuance logic
    $book_id = $_POST['book_id'];
    $user_id = $_SESSION['user_id']; // Assuming user ID is stored in session
    // ... (Insert loan record into database) ...
    echo "<p>Book issued successfully!</p>";
} elseif (isset($_POST['renew_loan'])) {
    // Process loan renewal logic
    $loan_id = $_POST['loan_id'];
    // ... (Update loan record in database) ...
    echo "<p>Loan renewed successfully!</p>";
} elseif (isset($_POST['return_book'])) {
    // Process book return logic
    $loan_id = $_POST['loan_id'];
    // ... (Update loan record and potentially calculate fines) ...
    echo "<p>Book returned successfully!</p>";
}

// Display loan information for the current user
$user_id = $_SESSION['user_id']; 
$sql = "SELECT * FROM loans WHERE user_id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Your Loans:</h2>";
    while($row = $result->fetch_assoc()) {
        echo "<div class='loan'>";
        echo "<p>Book: " . $row["book_title"] . "</p>";
        echo "<p>Due Date: " . $row["due_date"] . "</p>";
        // Add buttons for renewal and return 
        echo "</div>";
    }
} else {
    echo "<p>You have no current loans.</p>";
}

$conn->close();
?>
