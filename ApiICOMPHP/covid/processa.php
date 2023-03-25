<?php
// Vai pegar a api e transforma em json e pegar os dados dela
function LigarApi($pais){
    // compartilhamento de recursos de origens diferentes
    header('Access-Control-Allow-Origin: *');
    // url da api covid-19 paises
    $url = "https://dev.kidopilabs.com.br/exercicio/covid.php?pais=$pais";
    // inicializa a sessão
    $curl = curl_init($url);
    // Define uma opção para uma transferência 
    // True para retornar a transferência como uma string do valor de retorno de curl_exec() em vez de emiti-la diretamente
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // false para impedir que o cURL verifique o certificado do par.
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    // Decodifica uma string JSON
    $resultado = json_decode(curl_exec($curl));

    echo "<hr>";
    // Variavel com valor 0
    $mortos = 0;
    $confirmados = 0;
    // foreach para pegar os valores e passar para 'a'
    foreach ($resultado as $a) {
        // condição para pegar o pais 
        if ($a->Pais == $pais) :
            // a soma dos dados para ter o retorno
            $mortos += $a->Mortos;
            $confirmados += $a->Confirmados;
        endif;
    }
    // retorno da função
    return "<div class='return'><p>O $pais tem  casos confirmados ". number_format($confirmados, 0, ".", ".") . " e " . number_format($mortos, 0, ".", ".") . " obitos causado pela COVID-19</p></div>";
}

// Função para inserir no banco de dados
function getData($data, $pais, $pdo){
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