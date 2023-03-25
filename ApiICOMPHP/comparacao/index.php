<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alkatra&display=swap" rel="stylesheet">
    <title>Home</title>
</head>

<body>
    <div class="container">
        <?php
        include "processa.php";
        // compartilhamento de recursos de origens diferentes
        header('Access-Control-Allow-Origin: *');
        // url da api covid-19 paises
        $url = "https://dev.kidopilabs.com.br/exercicio/covid.php?listar_paises=1";
        // inicializa a sessão
        $curl = curl_init($url);
        // Define uma opção para uma transferência 
        // True para retornar a transferência como uma string do valor de retorno de curl_exec() em vez de emiti-la diretamente
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // false para impedir que o cURL verifique o certificado do par.
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // Decodifica uma string JSON
        $resultado = json_decode(curl_exec($curl));
        if (isset($_GET['paisA']) && isset($_GET['paisB'])) :
            // Instanciando a função
            $paisA = PaisA($_GET['paisA']);
            $paisB = PaisB($_GET['paisB']);
            $diferença = $paisA - $paisB;

        else :
            echo "Nenhum país definido";
        endif;
        ?>
        <h1>COVID-19</h1>
        <p>Em meio ao caos do covid-19, houve vários problemas em determinados países, com essa problematica, este
            sistema permite verificar os obitos e casos confirmados e a diferença da taxa de morte entre esses países selecionados.</p>
        <form method="get">
            <div class="input">
                <div class="brasildiv">
                    <label for="paisA">Primeiro país</label>
                    <select name="paisA" id="paisA">
                        <?php
                        // foreach para pegar os valores e passar para 'a'
                        foreach ($resultado as $a) :
                            // echo $a . " ";

                        ?>
                            <option value="<?= $a ?>"><?= $a ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>
                <div class="canadadiv">
                    <label for="paisB">Segundo país</label>
                    <select name="paisB" id="paisB">
                        <?php
                        // foreach para pegar os valores e passar para 'a'
                        foreach ($resultado as $a) :
                        ?>
                            <option value="<?= $a ?>"><?= $a ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <div class="btn">
                <input type='submit' value="Verificar" id="btn">
            </div>
        </form>
        <div class="php">
            <?php
            if (isset($_GET['paisA'])) : ?>
                <p> O país A, <?= $_GET['paisA'] ?> , tem a taxa de morte de <?= $paisA ?>, e o país B, <?= $_GET['paisB'] ?>, tem a taxa de morte de <?= $paisB ?>, a diferença da taxa de morte é aproximadamente <?= round($diferença, 3) ?></p>
            <?php
            endif;
            ?>
        </div>
    </div>
</body>

</html>