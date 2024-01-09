<?php
require_once '../config/database.php';
require_once '../src/Product.php';

if (isset($_GET['id'])) {
    $product = new Product($pdo);
    $product->deleteProduct($_GET['id']);

    header('Location: index.php');
    exit;
}
