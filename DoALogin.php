<?php
session_start();
include 'conf.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['username'] === $username && $row['password'] === $password) {
        // Set session variable and redirect to dashboard
        $_SESSION['username'] = $username;
        header("Location: Adashboard.php");
        exit();
    } else {
        // Redirect back to login page with an error message
        header("Location: AdminLogin.html?error=invalidpassword");
        exit();
    }
} else {
    // Redirect back to login page with an error message
    header("Location: AdminLogin.html?error=invalidcredentials");
    exit();
}
?>
