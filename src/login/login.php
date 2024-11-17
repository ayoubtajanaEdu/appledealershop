<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // If already logged in, redirect to the cart page
    header("Location: ../cart/cart.php");
    exit;
}

// Placeholder authentication logic
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Replace this with your actual database validation
    if ($email === 'user@example.com' && $password === 'password') {
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email; // Store user email in the session
        header("Location: ../cart/index.php");
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Apple Dealer Belgium</title>
    <link rel="stylesheet" href="../styles/nav.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <style>
        body {
            font-family: 'Fredoka', sans-serif;
            background-color: #1a1a1a;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #333;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 300px;
        }
        .form-container h2 {
            text-align: center;
        }
        .form-container label {
            display: block;
            margin-bottom: 0.5rem;
        }
        .form-container input {
            width: 100%;
            padding: 0.7rem;
            margin-bottom: 1rem;
            border-radius: 5px;
            border: none;
        }
        .form-container button {
            width: 100%;
            padding: 0.7rem;
            background-color: aquamarine;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-container button:hover {
            background-color: #48c9b0;
        }
        .form-container .error {
            color: #ff4d4d;
            text-align: center;
            margin-top: 1rem;
        }
        .form-container p {
            text-align: center;
        }
    </style>
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
        <h2>Log In</h2>
        <form method="POST" action="login.php">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <button type="submit">Log In</button>
            <?php if ($error): ?>
                <p class="error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a>.</p>
    </div>
</body>
</html>
