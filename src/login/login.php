<?php
session_start();

// Placeholder authentication logic
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Simple validation logic (replace this with your database authentication)
    if ($email === 'user@example.com' && $password === 'password') {
        $_SESSION['loggedin'] = true;
        header("Location: ../cart/cart.php"); // Redirect to cart page after successful login
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
    <!-- Inline CSS for simplicity -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Sofia Sans Condensed', sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }
        .form-container {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        h2 {
            text-align: center;
            margin-bottom: 1rem;
            color: #007aff;
        }
        label {
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        input {
            padding: 0.8rem;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-bottom: 1rem;
        }
        button {
            background-color: #007aff;
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #005bb5;
        }
        .error {
            color: red;
            text-align: center;
            margin-top: 1rem;
        }
        p {
            text-align: center;
        }
        a {
            color: #007aff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Login Form -->
    <div class="form-container">
        <h2>Log In</h2>
        <form method="POST" action="login.php">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <button type="submit">Log In</button>
            
            <!-- Display error if login fails -->
            <?php if ($error): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>

            <p>Don't have an account? <a href="register.php">Register here</a>.</p>
        </form>
    </div>
</body>
</html>
