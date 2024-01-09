<?php
require_once '../config/Database.php';

try {
    $statement = $pdo->query("SELECT 'connection success' AS message");
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    echo $row['message'];
} catch (\PDOException $e) {
    echo "Er is een fout opgetreden: " . $e->getMessage();
}
