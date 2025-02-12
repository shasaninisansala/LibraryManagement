<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <div class="book-container">
        <h1>Edit Book</h1>
        
        <!-- Search Form -->
        <form action="edit1.php" method="GET">
            <label for="isbn">Search Book by ISBN:</label>
            <input type="text" id="isbn" name="isbn" placeholder="Enter ISBN" required>
            <button type="submit">Search</button>
        </form>

        <!-- Book Editing Section -->
        <?php
        include 'conf.php';

        if (isset($_GET['isbn']) && !empty($_GET['isbn'])) {
            $isbn = $conn->real_escape_string($_GET['isbn']); // Sanitize input
            $sql = "SELECT * FROM book WHERE isbn = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $isbn);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $book = $result->fetch_assoc();
        ?>
        <form action="edit.php" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($book['id']) ?>">
            
            <label for="title">Book Title:</label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($book['title']) ?>" required>

            <label for="author">Author:</label>
            <input type="text" id="author" name="author" value="<?= htmlspecialchars($book['author']) ?>" required>

            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" value="<?= htmlspecialchars($book['genre']) ?>" required>

            <label for="isbn">ISBN:</label>
            <input type="text" id="isbn" name="isbn" value="<?= htmlspecialchars($book['isbn']) ?>" readonly>

            <button type="submit">Update Book</button>
        </form>
        <a href="Adashboard.php">Back to Dashboard</a>

        <?php
            } else {
                echo "<p class='error'>Book with ISBN <strong>" . htmlspecialchars($isbn) . "</strong> not found.</p>";
            }
            $stmt->close();
        } elseif (isset($_GET['isbn'])) {
            echo "<p class='error'>Please provide a valid ISBN.</p>";
        }
        $conn->close();
        ?>
    </div>
    
    <footer>
        <p>&copy; 2024 Library Management System. All Rights Reserved.</p>
    </footer>
</body>
</html>
