<?php
// Start the session to store the data
session_start();

// Include the database connection file (adjust path as needed)
require_once '../../../../databases/connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['iphone_model'])) {
    // Get the selected iPhone model
    $iphone_model = $_POST['iphone_model'];

    // Prepare an SQL query to insert the data into the 'products' table
    $stmt = $conn->prepare("INSERT INTO products (name) VALUES (?)");
    $stmt->bind_param("s", $iphone_model); // 's' denotes the type is a string

    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        echo "<p>Product added to the database successfully!</p>";
    } else {
        echo "<p>Error: Could not add product to the database.</p>";
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Apple advisor, advising">

    <!-- Favicon Links -->
    <link rel="shortcut icon" href="../../../../images/logo.png" type="image/x-icon">

    <!-- CSS Links -->
    <link rel="stylesheet" href="../../../../styles/nav.css">
    <link rel="stylesheet" href="../../../../styles/iphone/productpage.css">
    <link rel="stylesheet" href="../../../../styles/footer.css">

    <!-- Title -->
    <title>Buy iPhone 16 - Apple Dealer Belgium</title>
</head>
<body>
    <header>
        <nav>
            <a href="../../../../">
                <img src="../../../../images/logo.png" alt="Apple Dealer Belgium Logo">
            </a>

            <ul>
                <li><a href="../../../iphone/">iPhone</a></li>
                <li><a href="../../../ipad/">iPad</a></li>
                <li><a href="./../../../mac/">Mac</a></li>
            </ul>

            <ul>
                <li><a href="../../../../login/login.php">Log in</a></li>
                <li><a href="../../../../login/signup.php">Register</a></li>
                <li><a href="../../../../cart/index.php"><img src="../../../../images/cart.png" alt="cart"></a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="iphone-selection">
            <h1>Select Your iPhone 16</h1>
            <!-- Form submits to the same page -->
            <form action="" method="POST">
                <!-- iPhone 16 -->
                <label class="iphone-option">
                    <input type="radio" name="iphone_model" value="iPhone 16" required>
                    <img src="../../images/iphone-16-model-unselect-gallery-1-202409.webp" alt="iPhone 16">
                    <span>iPhone 16</span>
                </label>

                <!-- iPhone 16 Pro -->
                <label class="iphone-option">
                    <input type="radio" name="iphone_model" value="iPhone 16 Pro">
                    <img src="../../images/iphone-16-pro-model-unselect-gallery-1-202409.webp" alt="iPhone 16 Pro">
                    <span>iPhone 16 Pro</span>
                </label>

                <!-- Add to Cart Button -->
                <button type="submit" class="add-to-cart-button">Add to Cart</button>
            </form>
        </div>
    </main>

    <footer>
        <section>
            <ul>
                <li>
                    <a href="../../../../about/">About us</a>
                </li>
                <li>
                    <a href="../../../../privacy_policy/">Privacy Policy</a>
                </li>
                <li>
                    <a href="../../../../support/">Support Page</a>
                </li>
            </ul>
        </section>
        <section>
            <p>Copyright &copy; 2024 - Apple Dealer Belgium</p>
        </section>
    </footer>
</body>
</html>
