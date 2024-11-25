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
    <link rel="stylesheet" href="../../../../styles/ipad/productpages.css">
    <link rel="stylesheet" href="../../../../styles/footer.css">

    <!-- Title -->
    <title>Template - Apple Dealer Belgium</title>
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
            <h1>Select Your iPad</h1>
            <form action="../../../../cart/index.php" method="POST">
                <!-- iPad Air 13 inch-->
                <label class="iphone-option">
                    <input type="radio" name="iphone_model" value="iPhone 15" required>
                    <img src="../../images/iPad-air-13inch.png" alt="iPad Air 13 inch">
                    <span>iPad Air 11inch</span>
                </label>
    
                <!-- iPad Air 11 inch -->
                <label class="iphone-option">
                    <input type="radio" name="iphone_model" value="iPhone 15 Pro">
                    <img src="../../images/iPad-air-11inch.png" alt="iPad Air 11 inch">
                    <span>iPad Air 13inch</span>
                </label>
    
    
                <!-- Add to Cart Button -->
                <button type="submit" class="add-to-cart-button">Add to Cart</button>
            </form>
    </main>
    <footer>
        <div>
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
        </div>
        <div>
            <p>Copyright &copy; 2024 - Apple Dealer Belgium</p>
        </div>
    </footer>
</body>
</html>