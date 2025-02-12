<?php
session_start();

if (!isset($_SESSION['username'])) {
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
    <link rel="stylesheet" href="prodash.css">
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <div class="logo">
                <img src="logo.jpeg" alt="Hospital Logo">
                <h2>Apollo Hospital</h2>
            </div>
            <h1>Receptionist</h1>
            <a href="cashierdash.php">Dashboard</a>
            <a href="cashierdash.php">My Profile</a>
            <a href="patientRegister.html">Patient Registration</a>
            <a href="patientprofiledash.php">Patient Profile</a>
            <a href="invoice.php">Appointment</a>
            <a href="transactions.php">Visitors</a>
            <a href="transactions.php">Records</a>
            <a href="login.html">Log Out</a>
        </div>

        <main class="main-content">
            <header>
                <h1>Patient Profile</h1>
            </header>
            <section>
                <h2>Operations</h2><br><br>
                <div class="operations">
                <div class="operation-box">
                    <img src="images/10.webp" alt="Add Icon">
                    <a href="add.html">Add Patient Profile</a>
                </div>
                <div class="operation-box">
                    <img src="images/edit.png" alt="Edit Icon">
                    <a href="edit1.php">Edit Patient Profile</a>
                </div>
                <div class="operation-box">
                    <img src="images/delete.png" alt="Delete Icon">
                    <a href="deletebook.php">Delete Patient Profile</a>
                </div>
                <div class="operation-box">
                    <img src="images/view.webp" alt="View Icon">
                    <a href="view.php">View Profile Details</a>
                </div>
            </div>

            </section>
        </main>
    </div>
    <footer>
        <p>&copy; 2024 Hospital Management System. All Rights Reserved.</p>
    </footer>
</body>
</html>
';
?>
