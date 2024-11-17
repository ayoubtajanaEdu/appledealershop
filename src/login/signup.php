<?php
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/nav.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&family=Hubot+Sans:ital,wght@0,200..900;1,200..900&family=Sofia+Sans+Condensed:ital,wght@0,1..1000;1,1..1000&display=swap"
      rel="stylesheet"
    />
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f0f0f0;
        }

        main {
            margin-top: 8rem;
        }

        .form-container {
            background-color: white;
            padding: 2.5rem;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #007aff;
        }

        input {
            width: 100%;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        button {
            background-color: #007aff;
            color: white;
            padding: 1rem;
            border: none;
            width: 100%;
        }

        .error {
            color: red;
        }

        a {
            color: #007aff;
            text-decoration: none;
        }
    </style>
    <link rel="stylesheet" href="../styles/footer.css">
    <title>Register - Apple Dealer Belgium</title>
</head>

<body>
    <main>
        <div class="form-container">
            <h2>Register</h2>
            <form method="POST" action="register.php">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                <button type="submit">Register</button>
                <?php if ($error): ?>
                    <p class="error"><?php echo $error; ?></p>
                <?php endif; ?>
                <p>Already have an account? <a href="login.php">Log in</a>.</p>
            </form>
        </div>
    </main>
</body>

</html>