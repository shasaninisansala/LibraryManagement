<?php
include 'conf.php';

// Fetch books
$sql = "SELECT * FROM book ORDER BY title DESC";
$result = $conn->query($sql);

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Books</title>
    <link rel="stylesheet" href="search.css">
</head>
<body>
    <header>
        <h1>Search Books</h1>
    </header>

    <nav>
        <ul>
            <li><a href="firstpage.html">Home</a></li>
            <li><a href="feedback.php">Feedback</a></li>
        </ul>
    </nav>

    <main>
        <h2>Available Books</h2>

        <!-- Search Bar -->
        <input type="text" id="searchInput" placeholder="Search for books...">
        <br></br>

        <?php if ($result && $result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th>Added On</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= htmlspecialchars($row['title']) ?></td>
                            <td><?= htmlspecialchars($row['author']) ?></td>
                            <td><?= htmlspecialchars($row['genre']) ?></td>
                            <td><?= $row['Added_on'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No books available.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 Library Management System. All Rights Reserved.</p>
    </footer>

    <script>
        // JavaScript for search functionality
        document.getElementById("searchInput").addEventListener("keyup", function() {
            var filter = this.value.toUpperCase();
            var rows = document.querySelectorAll("table tbody tr");
            rows.forEach(function(row) {
                var cells = row.getElementsByTagName("td");
                var title = cells[1].textContent.toUpperCase();
                var author = cells[2].textContent.toUpperCase();
                var genre = cells[3].textContent.toUpperCase();

                if (title.includes(filter) || author.includes(filter) || genre.includes(filter)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>
</body>
</html>