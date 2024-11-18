<?php
session_start();

// Include the connection file
require_once '../databases/connection.php';

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not logged in, redirect to the login page
    header("Location: ../login/login.php");
    exit;
}

// Fetch items from the database (for the cart)
$query = "SELECT * FROM products"; // Adjust the table name if needed
$result = $conn->query($query);

if (!$result) {
    die("Error fetching items: " . $conn->error);
}

$items = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Apple Dealer Belgium</title>
    <link rel="stylesheet" href="../styles/nav.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&family=Hubot+Sans:ital,wght@0,200..900;1,200..900&family=Sofia+Sans+Condensed:ital,wght@0,1..1000;1,1..1000&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Fredoka', sans-serif;
            background-color: white;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 2rem 0;
        }

        .form-container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 1200px;
            margin-top: 10rem;
            margin-bottom: 2rem;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 1rem;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .cart-item img {
            width: 100px;
            height: auto;
            margin-right: 1rem;
        }

        .cart-item-details {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .cart-item button {
            padding: 0.5rem 1rem;
            background-color: #f2b632;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .cart-item button:hover {
            background-color: #e49a28;
        }

        .total-price {
            text-align: center;
            font-size: 1.2rem;
            margin-top: 2rem;
            padding: 1rem;
            background-color: #f2f2f2;
            border-radius: 5px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .total-price span {
            font-weight: bold;
        }

        .checkout-button {
            display: block;
            width: 100%;
            padding: 0.7rem;
            background-color: aquamarine;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 1rem;
        }

        .checkout-button:hover {
            background-color: #48c9b0;
        }
    </style>
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <header>
        <nav>
            <a href="../">
                <img src="../images/logo.png" alt="Apple Dealer Belgium Logo" />
            </a>
            <ul>
                <li><a href="../products/iphone/">iPhone</a></li>
                <li><a href="../products/ipad/">iPad</a></li>
                <li><a href="../products/mac/">Mac</a></li>
            </ul>
            <ul>
                <li><a href="../login/login.php">Log in</a></li>
                <li><a href="../login/signup.php">Register</a></li>
                <li><a href="../cart/index.php"><img src="../images/cart.png" alt="cart"></a></li>
            </ul>
        </nav>
    </header>

    <div class="form-container">
        <h2>Your Cart</h2>

        <?php if (empty($items)): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <?php
            $totalPrice = 0;
            foreach ($items as $item):
                $totalPrice += $item['price']; // Assume there's a price field in the products table
                ?>
                <div class="cart-item">
                    <img src="../images<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                    <div class="cart-item-details">
                        <strong><?= htmlspecialchars($item['name']) ?></strong>
                        <p>Price: €<?= number_format($item['price'], 2) ?></p>
                    </div>
                    <button>Remove</button> <!-- Implement removal functionality later -->
                </div>
            <?php endforeach; ?>

            <div class="total-price">
                <p>Total Price: <span>€<?= number_format($totalPrice, 2) ?></span></p>
                <a href="../checkout/checkout.php">
                    <button class="checkout-button">Proceed to Checkout</button>
                </a>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>