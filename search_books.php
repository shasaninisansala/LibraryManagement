<?php

    // Database connection
    $host = 'localhost';
    $username = 'shasani';
    $password = 'sha0224';
    $database = 'studentlogin';

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

// Get the search query from the URL
$searchQuery = isset($_GET['query']) ? trim($_GET['query']) : "";

// SQL query to retrieve data based on the search query
if ($searchQuery) {
    $sql = "SELECT * FROM book WHERE title LIKE ? OR author LIKE ?";
    $stmt = $conn->prepare($sql);
    $likeQuery = "%" . $searchQuery . "%";
    $stmt->bind_param("ss", $likeQuery, $likeQuery);
} else {
    $sql = "SELECT * FROM book";
    $stmt = $conn->prepare($sql);
}

$stmt->execute();
$result = $stmt->get_result();

$books = [];
while ($row = $result->fetch_assoc()) {
    $books[] = $row;
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($books);
