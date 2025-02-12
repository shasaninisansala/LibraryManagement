<?php
session_start();

if(!isset($_SESSION['username'])){
    echo "You must login first! <a href='DoALogin.php'>Login here</a>";
    exit();
}
    echo '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Admin Dashboard</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <div class="dashboard">
       
        <aside class="sidebar">
            <h2>Library Dashboard</h2>
            <ul>
                <li><a href="firstpage.html">Home</a></li>
                <li><a href="search_books.html">Search Books</a></li>
                <li><a href="sfeedback.html">Feedback</a></li>
                <li><a href="StudentLogin.html">Logout</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <header>
                <h1>Welcome: '.$_SESSION['username'].'!</h1>
            </header>
            <section class="slideshow-container">
                <div class="slide fade">
                    <img src="images/4.webp" alt="Books Collection">
                    <div class="caption">Explore Our Vast Book Collection</div>
                </div>
                <div class="slide fade">
                    <img src="images/4.jpeg" alt="Reading Area">
                    <div class="caption">Comfortable Reading Spaces</div>
                </div>
                <div class="slide fade">
                    <img src="images/5.webp" alt="Library Events">
                    <div class="caption">Join Our Exciting Events</div>
                </div>
                <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
                <a class="next" onclick="changeSlide(1)">&#10095;</a>
            </section>
        </main>
    </div>

    <script>
        let slideIndex = 0;
        const showSlides = () => {
            let slides = document.querySelectorAll(".slide");
            slides.forEach((slide, index) => {
                slide.style.display = "none";
            });
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 5000); // Change image every 5 seconds
        };
        showSlides();
    </script>
    <footer>
        <p>&copy; 2024 Library Management System. All Rights Reserved.</p>
    </footer>
</body>
</html>
';
?>
