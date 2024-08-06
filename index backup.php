<?php
session_start();
require 'config.php';

$stmt = $pdo->query('SELECT id, name, price FROM products');
$products = $stmt->fetchAll (PDO::FETCH_ASSOC);

if (isset($_SESSION['user'])) {
    echo "<p>Welcome, {$_SESSION['user']}! <a
    href='logout.php'>Logout</a></p";
 
    
} else {
    echo "<p><a href='login.php'>Login</a> ! <a
    href='register.php'>Register</a></p";

}
echo "<h1>Product List</h1>";
foreach ($products as $product) {
echo "<div>";
echo "<h2>{$product ['name'] }</h2>";
echo "<p>Price: \${$product['price']}</p>";
echo "<a href='add_to_cart.php?id={$product['id']}'>Add to Cart</a>";
echo "</div>";
}
echo "<br><a href='cart.php'>View Cart</a>";
?>