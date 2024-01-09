<?php
class Product {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllProducts() {
        $stmt = $this->pdo->query('SELECT * FROM products');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProduct($name, $price) {
        $stmt = $this->pdo->prepare('INSERT INTO products (name, price) VALUES (:name, :price)');
        $stmt->execute([':name' => $name, ':price' => $price]);
        return $this->pdo->lastInsertId();
    }

    public function getProductById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE product_id = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProduct($id, $name, $price) {
        $stmt = $this->pdo->prepare('UPDATE products SET name = :name, price = :price WHERE product_id = :id');
        $stmt->execute([':name' => $name, ':price' => $price, ':id' => $id]);
    }

    public function deleteProduct($id) {
        $stmt = $this->pdo->prepare('DELETE FROM products WHERE product_id = :id');
        $stmt->execute([':id' => $id]);
    }
}
