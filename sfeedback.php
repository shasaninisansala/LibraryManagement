<?php
// Database connection
include 'conf.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO feedback (user_name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user_name, $email, $message);

    // Execute and check the query
    if ($stmt->execute()) {
        echo "<script>
                alert('Thank you for your feedback!');
                window.location.href = 'sfeedback.html'; // Reload the page to clear the form
              </script>";
    } else {
        echo "<script>
                alert('Error submitting feedback: " . htmlspecialchars($stmt->error) . "');
                window.location.href = 'sfeedback.html'; // Reload the page to allow retry
              </script>";
    }

    $stmt->close(); // Close the statement
}

$conn->close(); // Close the connection after the operation
?>
