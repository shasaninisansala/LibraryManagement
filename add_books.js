document.getElementById('addBookForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = new FormData(this);
    const message = document.getElementById('message');

    fetch('process.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            message.textContent = data;
            message.style.color = "green";
            this.reset();
        })
        .catch(error => {
            message.textContent = "Error: " + error.message;
            message.style.color = "red";
        });
});