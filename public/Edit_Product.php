<?php
require_once '../config/database.php';
require_once '../src/Product.php';

$product = new Product($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    $product->updateProduct($id, $name, $price);
    header('Location: index.php');
    exit;
}

if (isset($_GET['id'])) {
    $currentProduct = $product->getProductById($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
</head>
<body>
<?php if (isset($currentProduct)): ?>
    <form action="edit_product.php" method="post">
        <input type="hidden" name="id" value="<?= $currentProduct['product_id'] ?>">
        <input type="text" name="name" value="<?= $currentProduct['name'] ?>">
        <input type="number" step="0.01" name="price" value="<?= $currentProduct['price'] ?>">
        <button type="submit">Update Product</button>
    </form>
<?php endif; ?>
</body>
</html>
