<?php
// Start a session to store user data later
session_start();

// Simulate processing the signup form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Temporary: Just confirm data has been received
    if (!empty($name) && !empty($email) && !empty($password)) {
        $_SESSION['user'] = $name; // Simulate logged-in user
        echo "<script>alert('Account created successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
    }
} else {
    header("Location: signup.php");
    exit;
}
?>
