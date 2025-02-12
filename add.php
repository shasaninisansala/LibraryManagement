<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'studentlogin';

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // File upload handling
    $uploadDir = 'uploads/';
    $picture = $_FILES['picture']['name'];
    $uploadFile = $uploadDir . basename($picture);

    if (!move_uploaded_file($_FILES['picture']['tmp_name'], $uploadFile)) {
        die("Error uploading the file.");
    }

    // Input data
    $title = $conn->real_escape_string($_POST['title']);
    $author = $conn->real_escape_string($_POST['author']);
    $genre = $conn->real_escape_string($_POST['genre']);
    $isbn = $conn->real_escape_string($_POST['isbn']);

    // SQL query
    $sql = "INSERT INTO book (picture, title, author, genre, isbn) VALUES ('$uploadFile', '$title', '$author', '$genre', '$isbn')";

    if ($conn->query($sql) === TRUE) {
        echo "Book added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
