<?php
include "conexao.php";

echo $pais = $_GET['country'];
echo $data = $_GET['data'];
// Chamar a função para inserir no banco de dados
getData($data, $pais, $pdo);

// Função para inserir no banco de dados
function getData($data, $pais, $pdo)
{
    // O sql 
    $sql = "INSERT INTO getdata (getdata, pais) VALUE (:getdata, :pais)";
    // Preparar para pegar os dados
    $stm = $pdo->prepare($sql);
    // Selecionar o apelido e o valor que vai ser inserido
    $stm->bindParam(":getdata", $data);
    $stm->bindParam(":pais", $pais);
    // executa o sql
    $stm->execute();
}
