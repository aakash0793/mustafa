<?php 
session_start();
require 'config.php';

if (!isset($_SESSION['user']))  {
    header('Location: login.php');
    exit();
}

$product_id = $_GET['id'] ?? null;

if ($product_id) {
    $stmt = $pdo->prepare('SELECT id FROM products WHERE id = ?');
    stmt->execute([$product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($product) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];

        }

         if (!isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] = 0;
            }
            $_SESSION['cart'][$product_id]++;

            echo "Product added to cart! <a href='index.php'>Back to 
Products</a>";
 } else {
 echo "Invalid product ID. <a href='index.php'>Back to Products</a>";

    }

} else  {
    echo "product ID not specified. <a href='index.php'>Back to Products</a>";
    
}
?>