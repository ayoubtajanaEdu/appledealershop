<?php
session_start();

// Sample products for the cart (replace this with database logic)
$products = [
    ["id" => 1, "name" => "iPhone 15", "price" => 999],
    ["id" => 2, "name" => "iPhone 15 Pro", "price" => 1199],
    ["id" => 3, "name" => "iPhone 15 Pro Max", "price" => 1399]
];

// Handle adding items to the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['product_id'];
    $productQty = $_POST['quantity'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($products[$productId - 1])) {
        $product = $products[$productId - 1];
        $_SESSION['cart'][] = [
            'id' => $product['id'],
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => $productQty
        ];
    }
}

// Handle clearing the cart
if (isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Apple Dealer Belgium</title>
    <link rel="stylesheet" href="../styles/nav.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&family=Hubot+Sans:ital,wght@0,200..900;1,200..900&family=Sofia+Sans+Condensed:ital,wght@0,1..1000;1,1..1000&display=swap"
      rel="stylesheet"
    />
    
    <link rel="stylesheet" href="../styles/footer.css">
    <style>
        main {
            margin-top: 8rem;
            padding: 2rem;
        }

        .cart-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 2rem auto;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 1rem;
            text-align: center;
        }

        th {
            background-color: #f5f5f5;
        }

        .empty-cart {
            text-align: center;
            margin: 2rem 0;
            font-size: 1.5rem;
        }

        .btn {
            background-color: #007aff;
            color: white;
            padding: 1rem 2rem;
            border: none;
            cursor: pointer;
            margin-top: 1rem;
        }

        .btn:hover {
            background-color: #005bb5;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <header>
        <nav>
            <a href="../"><img src="../images/logo.png" alt="Apple Dealer Belgium Logo"></a>
            <ul>
                <li><a href="../products/iphone/">iPhone</a></li>
                <li><a href="../products/ipad/">iPad</a></li>
                <li><a href="../products/mac/">Mac</a></li>
            </ul>
            <ul>
                <li><a href="../login/login.php">Log in</a></li>
                <li><a href="../login/register.php">Register</a></li>
                <li><a href="cart.php"><img src="../images/cart.png" alt="cart"></a></li>
            </ul>
        </nav>
    </header>

    <!-- Main content -->
    <main>
        <div class="cart-container">
            <h2>Your Shopping Cart</h2>

            <?php if (!empty($_SESSION['cart'])): ?>
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                    <?php
                    $totalPrice = 0;
                    foreach ($_SESSION['cart'] as $item):
                        $itemTotal = $item['price'] * $item['quantity'];
                        $totalPrice += $itemTotal;
                        ?>
                        <tr>
                            <td><?php echo $item['name']; ?></td>
                            <td>€<?php echo $item['price']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td>€<?php echo $itemTotal; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <th colspan="3">Grand Total</th>
                        <th>€<?php echo $totalPrice; ?></th>
                    </tr>
                </table>

                <!-- Clear Cart Button -->
                <form method="POST">
                    <button type="submit" name="clear_cart" class="btn">Clear Cart</button>
                </form>
            <?php else: ?>
                <p class="empty-cart">Your cart is empty!</p>
            <?php endif; ?>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <section>
            <ul>
                <li><a href="../about/">About us</a></li>
                <li><a href="../privacy_policy/">Privacy Policy</a></li>
                <li><a href="../support/">Support Page</a></li>
            </ul>
        </section>
        <section>
            <p>&copy; 2024 - Apple Dealer Belgium</p>
        </section>
    </footer>
</body>

</html>