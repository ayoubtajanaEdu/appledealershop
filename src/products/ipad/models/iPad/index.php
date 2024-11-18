<?php
// Start the session to store the data
session_start();

// Include the database connection file
require_once '../../../../databases/connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ipad_model'])) {
    // Get the selected iPad model
    $ipad_model = $_POST['ipad_model'];

    // Prepare the SQL query
    $stmt = $conn->prepare("INSERT INTO products (name) VALUES (?)");
    $stmt->bind_param("s", $ipad_model); // 's' denotes the type is a string

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
    <link rel="stylesheet" href="../../../../styles/ipad/productpages.css">
    <link rel="stylesheet" href="../../../../styles/footer.css">

    <!-- Title -->
    <title>Buy iPad - Apple Dealer Belgium</title>
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
        <div class="ipad-selection">
            <h1>Select Your iPad</h1>
            <!-- Form submits to the same page -->
            <form action="" method="POST">
                <!-- iPad -->
                <label class="ipad-option">
                    <input type="radio" name="ipad_model" value="iPad" required>
                    <img src="../../images/iPad-cards.png" alt="iPad">
                    <span>iPad</span>
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
