<?php
require_once '../config/database.php';
require_once '../src/Product.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? 0;

    $product = new Product($pdo);
    $product->addProduct($name, $price);

    header('Location: index.php');
    exit;
}
