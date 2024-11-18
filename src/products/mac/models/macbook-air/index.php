<?php
// Start session to store cart data
session_start();

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a MacBook model has been selected
    if (isset($_POST['macbook_model'])) {
        // Store the selected MacBook model in the session cart
        $_SESSION['cart'][] = $_POST['macbook_model'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <!--Meta-->
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Apple advisor,advisor, advising">

   <!--Favicon Links-->
   <link rel="shortcut icon" href="../../../../images/logo.png" type="image/x-icon">

   <!--CSS Links-->
   <link rel="stylesheet" href="../../../../styles/nav.css">
   <link rel="stylesheet" href="../../../../styles/mac/productpages.css">
   <link rel="stylesheet" href="../../../../styles/footer.css">

   <!-- Title -->
   <title>Buy MacBook Air - Apple Dealer Belgium</title>
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
         <h1>Select Your MacBook Air</h1>
         <form action="" method="POST">
            <!-- MacBook Air 13 inch -->
            <label class="macbook-option">
               <input type="radio" name="macbook_model" value="MacBook Air 13 inch" required>
               <img src="../../images/MacBook-air-13inch.png" alt="MacBook Air 13 inch">
               <span>MacBook Air 13 inch</span>
            </label>
    
            <!-- MacBook Air 15 inch -->
            <label class="macbook-option">
               <input type="radio" name="macbook_model" value="MacBook Air 15 inch" required>
               <img src="../../images/MacBook-air-15inch.png" alt="MacBook Air 15 inch">
               <span>MacBook Air 15 inch</span>
            </label>

            <!-- Add to Cart Button -->
            <button type="submit" class="add-to-cart-button">Add to Cart</button>
         </form>

         <?php
         // Display the cart if there are items in it
         if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
             echo "<h2>Items in your cart:</h2><ul>";
             foreach ($_SESSION['cart'] as $item) {
                 echo "<li>" . htmlspecialchars($item) . "</li>";
             }
             echo "</ul>";
         }
         ?>
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
