<?php
session_start();

// Handle "Remove from Cart" request
if (isset($_GET['remove'])) {
    $productId = $_GET['remove'];
    unset($_SESSION['cart'][$productId]);  // Remove product from cart
}

// Handle "Update Cart" request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Update the quantity of the product in the cart
    if ($quantity > 0) {
        $_SESSION['cart'][$productId] = $quantity;
    } else {
        unset($_SESSION['cart'][$productId]);  // Remove product if quantity is 0
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOODZIE Cart</title>
    <!-- Bootstrap CSS links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">FOODZIE</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="checkout.php">Checkout</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- Cart Section -->
    <section id="cart" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Your Cart</h2>
            <?php if (empty($_SESSION['cart'])): ?>
                <p class="text-center">Your cart is empty.</p>
            <?php else: ?>
                <form method="POST">
                    <div class="row">
                        <?php
                        $totalPrice = 0;
                        foreach ($_SESSION['cart'] as $productId => $quantity) {
                            // Example: replace with actual product data from database
                            $productName = "Product $productId";  // Example name
                            $productPrice = 100;  // Example price
                            $productTotal = $productPrice * $quantity;
                            $totalPrice += $productTotal;
                        ?>
                            <div class="col-md-4 mb-4">
                                <div class="product card">
                                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="<?= $productName ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $productName ?></h5>
                                        <p class="price">₱<?= $productPrice ?></p>
                                        <p>Quantity: 
                                            <input type="number" name="quantity" value="<?= $quantity ?>" min="1">
                                        </p>
                                        <input type="hidden" name="product_id" value="<?= $productId ?>">
                                        <button type="submit" class="btn btn-primary">Update Quantity</button>
                                        <a href="?remove=<?= $productId ?>" class="btn btn-danger">Remove</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="text-center">
                        <h4>Total: ₱<?= $totalPrice ?></h4>
                        <a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>
                    </div>
                </form>
            <?php endif; ?>
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
