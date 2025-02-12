<?php
include 'conf.php';

// Fetch book data from the database
$sql = "SELECT * FROM book";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books</title>
    <link rel="stylesheet" href="view.css">
</head>
<body>
    <div class="book-container">
        <h1>Book List</h1>
        <table>
            <thead>
                <tr>
                    <th>Picture</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>ISBN</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td>
                        <?php if (!empty($row['picture'])): ?>
                            <img src="<?= $row['picture'] ?>" alt="<?= $row['title'] ?>" class="book-image">
                        <?php else: ?>
                            <span>No Image</span>
                        <?php endif; ?>
                    </td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['author'] ?></td>
                    <td><?= $row['genre'] ?></td>
                    <td><?= $row['isbn'] ?></td>
                    
                    <td>
                        <a href="editbook.php?id=<?= $row['id'] ?>">Edit</a> | 
                        <a href="deletebook.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="Adashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>
