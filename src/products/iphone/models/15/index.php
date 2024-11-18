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
    <!--Meta-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Apple advisor, advising">
    
    <!--Favicon Links-->
    <link rel="shortcut icon" href="../../../../images/logo.png" type="image/x-icon">
    
    <!--CSS Links-->
    <link rel="stylesheet" href="../../../../styles/nav.css">
    <link rel="stylesheet" href="../../../../styles/iphone/productpage.css">
    <link rel="stylesheet" href="../../../../styles/footer.css">

    <!-- Title -->
    <title>Buy iPhone 15 - Apple Dealer Belgium</title>
</head>
<body>
    <header>
        <nav>
            <a href="../../../../">
                <img src="../../../../images/logo.png" alt="Apple Dealer Belgium Logo">
            </a>

            <ul>
                <li><a href="../../../../products/iphone/">iPhone</a></li>
                <li><a href="../../../../products/ipad/">iPad</a></li>
                <li><a href="../../../../products/mac/">Mac</a></li>
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
            <h1>Select Your iPhone</h1>
            <!-- The form submits to the same page, action="" means this page itself -->
            <form action="" method="POST">
                <!-- iPhone 15 -->
                <label class="iphone-option">
                    <input type="radio" name="iphone_model" value="iPhone 15" required>
                    <img src="../../images/iphone-15-finish-select-202309-6-1inch_AV1.webp" alt="iPhone 15">
                    <span>iPhone 15</span>
                </label>

                <!-- iPhone 15 Pro -->
                <label class="iphone-option">
                    <input type="radio" name="iphone_model" value="iPhone 15 Pro">
                    <img src="../../images/iphone-15-finish-select-202309-6-1inch_GEO_EMEA.webp" alt="iPhone 15 Plus">
                    <span>iPhone 15 Plus</span>
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
