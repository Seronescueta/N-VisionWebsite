<?php
session_start();
include('db_connect.php'); // Include database connection

// Admin login check
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Admin Dashboard</h2>
        <div class="row">
            <!-- Manage Products -->
            <div class="col-md-6">
                <h4>Manage Products</h4>
                <a href="manage_products.php" class="btn btn-primary w-100">View / Add / Edit Products</a>
            </div>
            <!-- Manage Orders -->
            <div class="col-md-6">
                <h4>View Orders</h4>
                <a href="view_orders.php" class="btn btn-primary w-100">View All Orders</a>
            </div>
        </div>
        <div class="mt-5 text-center">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</body>
</html>
