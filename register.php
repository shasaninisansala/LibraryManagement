<?php
session_start();
include 'conf.php';  // Include database connection

// Initialize message variable
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $first_name = $_POST['first'];
    $last_name = $_POST['last'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];

    // Prepare SQL query
    $sql = "INSERT INTO register (f_Name, L_Name, username, email, contact, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters and execute query
        mysqli_stmt_bind_param($stmt, "ssssss", $first_name, $last_name, $username, $email, $contact, $password);
        if (mysqli_stmt_execute($stmt)) {
            // Registration successful, set success message
            $_SESSION['message'] = "Registration successful!";
        } else {
            // Registration failed, set error message
            $_SESSION['message'] = "Error: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        // Error preparing the statement
        $_SESSION['message'] = "Error preparing the statement: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);

    // Redirect back to the same page to display the message
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/1.jpg" width="120" height="120">
        </div>
    </header>

    <div class="box1">
        <form name="Register" action="" method="POST">
            <div class="login">
                <h2>Register Student</h2>
                <input type="text" name="first" placeholder="First Name" required=""><br><br>
                <input type="text" name="last" placeholder="Last Name" required=""><br><br> 
                <input type="text" name="username" placeholder="Username" required=""><br><br>
                <input type="text" name="email" placeholder="E mail" required=""><br><br>
                <input type="text" name="contact" placeholder="Contact No" required=""><br><br>
                <input type="password" name="password" placeholder="Password" required=""><br><br>
            </div>
            <button type="submit">Register</button>
            <a href="StudentLogin.html">Login</a>
        </form>

        <?php
        // Check if there's a session message to display
        if (isset($_SESSION['message'])) {
            echo "<p>" . $_SESSION['message'] . "</p>";
            // Unset the message so it doesn't show again after page refresh
            unset($_SESSION['message']);
        }
        ?>
    </div>
</body>
</html>
