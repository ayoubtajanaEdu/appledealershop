<?php
// Initialize the session and cart
session_start();

// Check if a MacBook model is selected
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['macbook_model'])) {
    $selectedMacBook = $_POST['macbook_model'];

    // Store the selected model in the session (cart)
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $_SESSION['cart'][] = $selectedMacBook;

    // Redirect to the cart page after adding to cart
    header("Location: ../../../../cart/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <!--Meta-->
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Apple advisor, advising, buy MacBook Pro">

   <!--Favicon Links-->
   <link rel="shortcut icon" href="../../../../images/logo.png" type="image/x-icon">

   <!--CSS Links-->
   <link rel="stylesheet" href="../../../../styles/nav.css">
   <link rel="stylesheet" href="../../../../styles/mac/productpages.css">
   <link rel="stylesheet" href="../../../../styles/footer.css">

   <!-- Title -->
   <title>Buy MacBook Pro - Apple Dealer Belgium</title>
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
      <div class="macbook-selection">
         <h1>Select Your MacBook Pro</h1>
         <form action="" method="POST">
            <!-- MacBook Pro 14 inch -->
            <label class="macbook-option">
               <input type="radio" name="macbook_model" value="MacBook Pro 14 inch" required>
               <img src="../../images/MacBook-pro-14inch.jpg" alt="MacBook Pro 14 inch">
               <span>MacBook Pro 14 inch</span>
            </label>
    
            <!-- MacBook Pro 16 inch -->
            <label class="macbook-option">
               <input type="radio" name="macbook_model" value="MacBook Pro 16 inch" required>
               <img src="../../images/MacBook-pro-16inch.png" alt="MacBook Pro 16 inch">
               <span>MacBook Pro 16 inch</span>
            </label>

            <!-- Add to Cart Button -->
            <button type="submit" class="add-to-cart-button">Add to Cart</button>
         </form>
      </div>
   </main>
   <footer>
      <div>
         <ul>
            <li><a href="../../../../about/">About us</a></li>
            <li><a href="../../../../privacy_policy/">Privacy Policy</a></li>
            <li><a href="../../../../support/">Support Page</a></li>
         </ul>
      </div>
      <div>
         <p>Copyright &copy; 2024 - Apple Dealer Belgium</p>
      </div>
   </footer>
</body>

</html>
