<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not logged in, redirect to login.php with a message
    $_SESSION['login_message'] = "Please log in to access your cart.";
    header("Location: ../login/login.php");
    exit;
}

// Assuming you have a database connection (update the connection details as needed)
require '../databases/connection.php';

// Fetch cart items for the logged-in user
$userEmail = $_SESSION['email'];
$cartItems = [];

$stmt = $conn->prepare("SELECT * FROM cart WHERE user_email = ?");
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $cartItems[] = $row;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cart - Apple Dealer Belgium</title>
    <link rel="stylesheet" href="../styles/nav.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <style>
        body {
            font-family: 'Fredoka', sans-serif;
            background-color: #1a1a1a;
            color: #fff;
            margin: 0;
            padding: 2rem;
        }

        .cart-container {
            margin-top: 2rem;
        }

        .cart-item {
            background-color: #333;
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 10px;
        }

        .cart-item h3 {
            margin: 0;
        }

        .cart-item p {
            margin: 0.5rem 0;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <a href="../">
                <img src="../images/logo.png" alt="Apple Dealer Belgium Logo">
            </a>
            <ul>
                <li><a href="../products/iphone/">iPhone</a></li>
                <li><a href="../products/ipad/">iPad</a></li>
                <li><a href="../products/mac/">Mac</a></li>
            </ul>
            <ul>
                <li><a href="../login/login.php">Log in</a></li>
                <li><a href="../login/signup.php">Register</a></li>
                <li><a href="../cart/cart.php"><img src="../images/cart.png" alt="cart"></a></li>
            </ul>
        </nav>
    </header>

    <div class="cart-container">
        <h2>Your Cart</h2>
        <?php if (empty($cartItems)): ?>
            <p>Your cart is empty. Start shopping now!</p>
        <?php else: ?>
            <?php foreach ($cartItems as $item): ?>
                <div class="cart-item">
                    <h3><?php echo htmlspecialchars($item['product_name']); ?></h3>
                    <p>Price: €<?php echo number_format($item['price'], 2); ?></p>
                    <p>Quantity: <?php echo htmlspecialchars($item['quantity']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>

</html>