<?php
include "conexao.php";
$country = $_GET['country'];
$stmt = $pdo->query("SELECT `getdata`, `pais` FROM `getdata` where pais = $country");

// Obtém os resultados da consulta
$results = $stm->fetchAll(PDO::FETCH_ASSOC);

if (count($results) > 0) {
    // Se houver resultados, criar uma tabela para exibir na tela
    $output = "<table><thead><tr><th>Coluna 1</th><th>Coluna 2</th></tr></thead><tbody>";
    foreach ($results as $row) {
        $output .= "<tr><td>" . $row['coluna1'] . "</td><td>" . $row['coluna2'] . "</td></tr>";
    }
    $output .= "</tbody></table>";
} else {
    $output = "Nenhum resultado encontrado";
}

echo $output;
