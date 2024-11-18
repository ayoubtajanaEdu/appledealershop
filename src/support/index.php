<?php

// Show all errors (for educational purposes)
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

// Constanten (connectie-instellingen databank)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'labo05');

date_default_timezone_set('Europe/Brussels');

// Verbinding maken met de databank
try {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Verbindingsfout: ' . $e->getMessage();
    exit;
}

$mail = isset($_POST['mail']) ? (string) $_POST['mail'] : '';
$message = isset($_POST['message']) ? (string) $_POST['message'] : '';
$msgName = '';
$msgMessage = '';

// form is sent: perform formchecking!
if (isset($_POST['btnSubmit'])) {

    $allOk = true;

    // name not empty
    if (trim($mail) === '') {
        $msgName = 'Gelieve een naam in te voeren';
        $allOk = false;
    }

    if (trim($message) === '') {
        $msgMessage = 'Gelieve een boodschap in te voeren';
        $allOk = false;
    }

    // end of form check. If $allOk still is true, then the form was sent in correctly
    if ($allOk) {
        // build & execute prepared statement
        $stmt = $db->prepare('INSERT INTO messages (sender, message, added_on) VALUES (?, ?, ?)');
        $stmt->execute(array($mail, $message, (new DateTime())->format('Y-m-d H:i:s')));

        // the query succeeded, redirect to this very same page
        if ($db->lastInsertId() !== 0) {
            header('Location: formchecking_thanks.php?mail=' . urlencode($mail));
            exit();
        } // the query failed
        else {
            echo 'Databankfout.';
            exit;
        }

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
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">

    <!--CSS Links-->
    <link rel="stylesheet" href="../styles/nav.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&family=Hubot+Sans:ital,wght@0,200..900;1,200..900&family=Sofia+Sans+Condensed:ital,wght@0,1..1000;1,1..1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../styles/support/support.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <!--JS Links-->
    <script src="./scripts/navbar.js"></script>
    <!-- Title -->
    <title>Template - Apple Dealer Belgium</title>
</head>

<body>
    <header>
        <nav>
            <a href="../">
                <img src="../images/logo.png" alt="Apple Dealer Belgium Logo" />
            </a>
            <ul>
                <li>
                    <a href="../products/iphone/"> iPhone </a>
                </li>
                <li>
                    <a href="../products/ipad/"> iPad </a>
                </li>
                <li>
                    <a href="../products/mac/"> Mac </a>
                </li>
            </ul>

            <ul>
                <li>
                    <a href="../login/login.php"> Log in </a>
                </li>
                <li>
                    <a href="../login/signup.php"> Register </a>
                </li>
                <li>
                    <a href="../cart/index.php">
                        <img src="../images/cart.png" alt="cart" />
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="login-box">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h1>Send a message</h1>
                <p class="message">All fields needs to be filled.</p>

                <div>
                    <label for="mail" class="maillabel">E-mail</label>
                    <input type="email" id="mail" name="mail" value="<?php echo $mail; ?>" class="input-text" />
                    <span class="message error"><?php echo $msgName; ?></span>
                </div>

                <div>
                    <label for="msg">Message</label>
                    <textarea name="message" id="message" rows="5" cols="40"
                        class="msg"><?php echo $message; ?></textarea>
                    <span class="message error"><?php echo $msgMessage; ?></span>
                </div>

                <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" />
            </form>
        </div>
    </main>
    <footer>
        <section>
            <ul>
                <li>
                    <a href="../about/">About us</a>
                </li>
                <li>
                    <a href="../privacy_policy/">Privacy Policy</a>
                </li>
                <li>
                    <a href="./">Support Page</a>
                </li>
            </ul>
        </section>
        <section>
            <p>Copyright &copy; 2024 - Apple Dealer Belgium</p>
        </section>
    </footer>
</body>

</html>