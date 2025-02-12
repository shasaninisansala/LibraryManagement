// DOM Elements
const searchBar = document.getElementById('searchBar');
const searchButton = document.getElementById('searchButton');
const clearButton = document.getElementById('clearButton');
const bookResults = document.getElementById('bookResults');

// Function to fetch and display books
const fetchBooks = (query = "") => {
    fetch(`search_books.php?query=${query}`)
        .then(response => response.json())
        .then(data => {
            bookResults.innerHTML = ""; // Clear previous results
            if (data.length === 0) {
                bookResults.innerHTML = "<p>No books found.</p>";
                return;
            }

            data.forEach(book => {
                const bookCard = document.createElement("div");
                bookCard.className = "book-card";
                bookCard.innerHTML = `
                    <img src="${book.picture}" alt="${book.title}">
                    <h3>${book.title}</h3>
                    <p><strong>Author:</strong> ${book.author}</p>
                    <p><strong>Genre:</strong> ${book.genre}</p>
                    <p><strong>ISBN:</strong> ${book.isbn}</p>
                `;
                bookResults.appendChild(bookCard);
            });

            // Show the Clear button if there is a search query
            if (query.trim() !== "") {
                clearButton.style.display = "inline-block";
            }
        })
        .catch(error => {
            console.error("Error fetching books:", error);
        });
};

// Fetch all books on page load
fetchBooks();

// Fetch books when the search button is clicked
searchButton.addEventListener("click", () => {
    const query = searchBar.value.trim();
    fetchBooks(query);
});

// Clear the search bar and show all books when the clear button is clicked
clearButton.addEventListener("click", () => {
    searchBar.value = ""; // Clear the search bar
    fetchBooks();         // Fetch all books again
    clearButton.style.display = "none"; // Hide the Clear button
});

// Fetch books when pressing "Enter" in the search bar
searchBar.addEventListener("keydown", (event) => {
    if (event.key === "Enter") {
        const query = searchBar.value.trim();
        fetchBooks(query);
    }
});
