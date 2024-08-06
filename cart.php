<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user'])) {
    header('Location:login.php');
    exit();

}

echo"<h1>Shopping Cart</h1";
if (isset($_SESSION['cart']) && !empty ($_SESSION['cart'])) {
    $total = 0;
    foreach ($_SESSION['cart'] as $id => $quantity) {
        $stmt = $pdo->prepare ('SELECT name, price FROM products WHERE id =
        ?');
        $stmt->execute([$id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($product) {
        $subtotal = $product['price'] * $quantity;
        $total += $subtotal;
        echo "<div>";
        echo "<h2>{$product['name']}</h2>";
        echo "<p>Price: \${$product['price']}</p>";
        echo "<p>Quantity: $quantity</p>";
        echo "<p>Subtotal: \${$subtotal}</p>";
        echo "</div>";
        }
        }
        echo "<h2>Total: \${$total}</h2>";
       } else {
        echo "<p>Your cart is empty.</p>";
       }
       echo "<br><a href='index.php'>Back to Products</a>";
       ?>
    

      
