<?php
include 'conf.php';

// Get updated data
$id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$genre = $_POST['genre'];
$isbn = $_POST['isbn'];


// Update book in the database
$sql = "UPDATE book 
        SET title='$title', author='$author', genre='$genre'
        WHERE id=$id";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="style6.css">
</head>
<body>
    <div class="container">
        <?php
        if ($conn->query($sql) === TRUE) {
            echo "<p class='message success'>Book updated successfully.</p>";
        } else {
            echo "<p class='message error'>Error updating record: " . $conn->error . "</p>";
        }
        $conn->close();
        ?>
        <a href="view.php">View All Books</a>
    </div>
</body>
</html>
