<?php
// Start the session
session_start();

// Initialize cart array if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle "Add to Cart" request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Add product to session cart
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += 1;  // Increase quantity if already in the cart
    } else {
        $_SESSION['cart'][$productId] = 1;   // Add product if not in the cart
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOODZIE WEBSITE</title>
    <!-- Bootstrap CSS links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome links for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">FOODZIE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="cart.php">Cart (<?= count($_SESSION['cart']); ?>)</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                        <?php
                        session_start();
                        if (isset($_SESSION['user'])) {
                            echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout (' . htmlspecialchars($_SESSION['user']) . ')</a></li>';
                        } else {
                            echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="signup.php">Sign Up</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- Hero Section -->
    <section class="hero bg-primary text-white py-5" style="background: url('images/logoheader.png') no-repeat center center/cover;">
        <div class="container">
            <h1 class="display-4">WELCOME TO FOODZIE</h1>
            <p class="lead">Home Of The Authentic Filipino Dishes.</p>
            <a href="#products" class="btn btn-light btn-lg">Browse Products</a>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="products-container py-5">
        <div class="container">
            <h2 class="text-center mb-4">Our Products</h2>
            <div class="row">
                <!-- Product 1 -->
                <div class="col-md-4 mb-4">
                    <div class="product card">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product 1">
                        <div class="card-body">
                            <h5 class="card-title">Product 1</h5>
                            <p class="card-text">Description of Product 1.</p>
                            <p class="price">₱100</p>
                            <form method="POST">
                                <input type="hidden" name="product_id" value="1">
                                <button class="btn btn-primary" type="submit">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Product 2 -->
                <div class="col-md-4 mb-4">
                    <div class="product card">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product 2">
                        <div class="card-body">
                            <h5 class="card-title">Product 2</h5>
                            <p class="card-text">Description of Product 2.</p>
                            <p class="price">₱100</p>
                            <form method="POST">
                                <input type="hidden" name="product_id" value="2">
                                <button class="btn btn-primary" type="submit">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Product 3 -->
                <div class="col-md-4 mb-4">
                    <div class="product card">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product 3">
                        <div class="card-body">
                            <h5 class="card-title">Product 3</h5>
                            <p class="card-text">Description of Product 3.</p>
                            <p class="price">₱100</p>
                            <form method="POST">
                                <input type="hidden" name="product_id" value="3">
                                <button class="btn btn-primary" type="submit">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
        <p>&copy; 2024 FOODZIE. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS links -->  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
