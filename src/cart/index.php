<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not logged in, redirect to login.php with a message
    $_SESSION['login_message'] = "Please log in to access your cart.";
    header("Location: ../login/login.php");
    exit;
}

// Check if a product is selected
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['iphone_model'])) {
    // Assuming you have a database connection (update the connection details as needed)
    require '../databases/connection.php';

    $userEmail = $_SESSION['email'];
    $iphoneModel = $_POST['iphone_model']; // The selected iPhone model

    // Check if the item already exists in the cart
    $stmt = $conn->prepare("SELECT * FROM cart WHERE user_email = ? AND product_name = ?");
    $stmt->bind_param("ss", $userEmail, $iphoneModel);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If the product is already in the cart, update the quantity
        $row = $result->fetch_assoc();
        $newQuantity = $row['quantity'] + 1;

        $updateStmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE user_email = ? AND product_name = ?");
        $updateStmt->bind_param("iss", $newQuantity, $userEmail, $iphoneModel);
        $updateStmt->execute();
        $updateStmt->close();
    } else {
        // Otherwise, add the new product to the cart
        $insertStmt = $conn->prepare("INSERT INTO cart (user_email, product_name, quantity, price) VALUES (?, ?, ?, ?)");
        // Add a price for the selected model, this would normally come from the database as well
        $price = 999; // Example price, replace with actual price logic
        $insertStmt->bind_param("ssii", $userEmail, $iphoneModel, 1, $price);
        $insertStmt->execute();
        $insertStmt->close();
    }

    $stmt->close();
    $conn->close();
}
?>
