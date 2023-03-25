<?php
function PaisA($paisA)
{
    // compartilhamento de recursos de origens diferentes
    header('Access-Control-Allow-Origin: *');
    // url da api covid-19 paises
    $url = "https://dev.kidopilabs.com.br/exercicio/covid.php?pais=$paisA";
    // inicializa a sessão
    $curl = curl_init($url);
    // Define uma opção para uma transferência 
    // True para retornar a transferência como uma string do valor de retorno de curl_exec() em vez de emiti-la diretamente
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // false para impedir que o cURL verifique o certificado do par.
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    // Decodifica uma string JSON
    $resultado = json_decode(curl_exec($curl));

    // Variavel com valor 0
    $mortos = 0;
    $confirmados = 0;
    $taxaDead = 0;
    // foreach para pegar os valores e passar para 'a'
    foreach ($resultado as $a) {
        // condição para pegar o pais 
        if ($a->Pais == $paisA) :
            // a soma dos dados para ter o retorno
            $mortos += $a->Mortos;
            $confirmados += $a->Confirmados;
        endif;
    }
    $taxaDead = $mortos / $confirmados;
    // retorno da função
    return round($taxaDead, 3);
}

function PaisB($paisB)
{
    // compartilhamento de recursos de origens diferentes
    header('Access-Control-Allow-Origin: *');
    // url da api covid-19 paises
    $url1 = "https://dev.kidopilabs.com.br/exercicio/covid.php?pais=$paisB";
    // inicializa a sessão
    $curl1 = curl_init($url1);
    // Define uma opção para uma transferência 
    // True para retornar a transferência como uma string do valor de retorno de curl_exec() em vez de emiti-la diretamente
    curl_setopt($curl1, CURLOPT_RETURNTRANSFER, true);
    // false para impedir que o cURL verifique o certificado do par.
    curl_setopt($curl1, CURLOPT_SSL_VERIFYPEER, false);
    // Decodifica uma string JSON
    $result = json_decode(curl_exec($curl1));

    // Variavel com valor 0
    $mortos = 0;
    $confirmados = 0;
    $taxaDead = 0;
    // foreach para pegar os valores e passar para 'a'
    foreach ($result as $pB) {
        // condição para pegar o pais 
        if ($pB->Pais == $paisB) :
            $mortos += $pB->Mortos;
            $confirmados += $pB->Confirmados;
        endif;
    }
    $taxaDead = $mortos / $confirmados;
    // retorno da função
    return round($taxaDead, 3);
}
