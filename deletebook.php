<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    echo "You must log in first! <a href='DoALogin.php'>Login here</a>";
    exit();
}

// Include the database connection file
include 'conf.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the ISBN from the form
    $isbn = $_POST['isbn'];

    // Validate the ISBN field
    if (empty($isbn)) {
        echo "<p style='color:red;'>Please enter a valid ISBN to delete.</p>";
    } else {
        // Prepare the SQL query to delete the book by ISBN
        $sql = "DELETE FROM book WHERE isbn = ?";
        $stmt = $conn->prepare($sql);
        
        // Check if the statement prepared successfully
        if ($stmt) {
            $stmt->bind_param("s", $isbn); // Bind the ISBN (string type)
            
            // Execute the query
            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    echo "<p style='color:green;'>Book with ISBN $isbn has been successfully deleted.</p>";
                } else {
                    echo "<p style='color:red;'>No book found with ISBN $isbn.</p>";
                }
            } else {
                echo "<p style='color:red;'>Error executing query: " . $stmt->error . "</p>";
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "<p style='color:red;'>Error preparing query: " . $conn->error . "</p>";
        }
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Book</title>
    <link rel="stylesheet" href="delete.css">
</head>
<body>
    <div class="delete-book-form">
        <h2>Delete Book</h2>
        <form method="POST" action="deletebook.php">
            <label for="isbn">Delete by ISBN:</label>
            <input type="text" id="isbn" name="isbn" placeholder="Enter Book ISBN" required>
            <button type="submit">Delete Book</button>
        </form>
        <a href="Adashboard.php">Back to Dashboard</a>
    </div>
    <footer>
        <p>&copy; 2024 Library Management System. All Rights Reserved.</p>
    </footer>
</body>
</html>
