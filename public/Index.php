<?php
require_once '../config/Database.php';
require_once '../src/Product.php';

$productObj = new Product($pdo);
$products = $productObj->getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory Sales Manager</title>
</head>
<body>
<h1>Product List</h1>

<?php foreach ($products as $product): ?>
    <div>
        <?= htmlspecialchars($product['name']) ?> - <?= htmlspecialchars($product['price']) ?>
        <a href="edit_product.php?id=<?= $product['product_id'] ?>">Edit</a>
        <a href="delete_product.php?id=<?= $product['product_id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
    </div>
<?php endforeach; ?>

<form action="add_product.php" method="post">
    <input type="text" name="name" placeholder="Product Name" required>
    <input type="number" step="0.01" name="price" placeholder="Product Price" required>
    <button type="submit">Add Product</button>
</form>

</body>
</html>
