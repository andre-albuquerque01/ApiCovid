<?php
$root = "root";
$pas = "";
try {
    $pdo = new PDO('mysql:host=localhost;dbname=data', $root, $pas);
} catch (PDOException $e) {
    echo "Falha na conexão com o banco" . $e;
}
