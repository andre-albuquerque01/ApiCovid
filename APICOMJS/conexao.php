<?php
$root = "root";
$pas = "";
try {
    $pdo = new PDO('mysql:host=localhost;dbname=data', $root, $pas);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Falha na conexão com o banco" . $e;
}
