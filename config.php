<?php
$host = 'localhost';
$dbname = 'ecommerce';
$username = 'root'; // Replace with your MySQL username
$password = ''; // Replace with your MySQL password
// Create a new PDO instance
try {
 $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
 die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>