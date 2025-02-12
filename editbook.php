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
        <form action="editbook.php" method="GET">
            <label for="isbn">Search Book by ISBN:</label>
            <input type="text" id="isbn" name="isbn" placeholder="Enter ISBN" required>
            <button type="submit">Search</button>
        </form>

        <!-- Book Editing Section -->
        <?php
        include 'conf.php';

        if (isset($_GET['isbn'])) {
            $isbn = $_GET['isbn'];
            $sql = "SELECT * FROM book WHERE isbn='$isbn'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $book = $result->fetch_assoc();
        ?>
        <form action="updatebook.php" method="POST">
            <input type="hidden" name="id" value="<?= $book['id'] ?>">
            
            <label for="title">Book Title:</label>
            <input type="text" id="title" name="title" value="<?= $book['title'] ?>" required>

            <label for="author">Author:</label>
            <input type="text" id="author" name="author" value="<?= $book['author'] ?>" required>

            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" value="<?= $book['genre'] ?>" required>

            <label for="isbn">ISBN:</label>
            <input type="text" id="isbn" name="isbn" value="<?= $book['isbn'] ?>" readonly>

            

            <button type="submit">Update Book</button>
        </form>
        <a href="Adashboard.php">Back to Dashboard</a>

        <?php
            } else {
                echo "<p>Book with ISBN <strong>$isbn</strong> not found.</p>";
            }
        }
        ?>
    </div>
    

    <footer>
        <p>&copy; 2024 Library Management System. All Rights Reserved.</p>
    </footer>
</body>
</html>
