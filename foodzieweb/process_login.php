<?php
// Start a session to store user data later
session_start();

// Simulate login process
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hardcoded user data (replace with database validation later)
    $dummy_user_email = "user@foodzie.com";
    $dummy_user_password = "12345";

    if ($email == $dummy_user_email && $password == $dummy_user_password) {
        $_SESSION['user'] = "Foodzie User"; // Simulate logged-in user
        echo "<script>alert('Login successful!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Invalid email or password.'); window.history.back();</script>";
    }
} else {
    header("Location: login.php");
    exit;
}
?>
