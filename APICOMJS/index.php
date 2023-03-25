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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js" defer></script>
    <title>Home</title>
</head>

<body>
    <?php
    include "conexao.php";
    error_reporting(0);
    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d H:i:s');
    if (isset($_GET['pais']) && isset($_GET['data'])) :
    endif;
    ?>
    <div class="container">
        <h1>COVID-19</h1>
        <p>Em meio ao caos do covid-19, houve vários problemas em determinados países, com essa problematica, este
            sistema permite verificar os obitos e casos confirmados no Australia, Brasil e Canada.</p>
        <form id="select-country" method="GET">
            <div class="input">
                <input type="hidden" name="data" id="data" value="<?= $data ?>">
                <div class="brasildiv">
                    <input type="radio" class="country-radio" value="Australia" name="country" id="australia"><label for="australia">Australia</label>
                </div>
                <div class="canadadiv">
                    <input type="radio" class="country-radio" value="Brazil" name="country" id="brazil"><label for="brazil">Brasil</label>
                </div>
                <div class="Australiadiv">
                    <input type="radio" class="country-radio" value="Canada" name="country" id="canada"><label for="canada">Canada</label>
                </div>
            </div>
            <div class="btn">
                <input type='button' value="Verificar" id="button_covid">
            </div>
        </form>
        <span id="resultDeads"></span>
        <?php
        if (isset($_GET['pais']) && isset($_GET['data'])) :
            echo $api;
            date_default_timezone_set('America/Sao_Paulo');
            $data = date('d-m-Y H:i:s');
            $sel = $pdo->query("SELECT `getdata`, `pais` FROM `getdata`");
            while ($get = $sel->fetch()) {
                $gtdata = $get['getdata'];
                $gtpais = $get['pais'];
            }
        ?>
            <footer>
                <div class="conateiner">
                   <span id="result"></span>
            </footer>
        <?php
        endif;
        ?>
    </div>
</body>
<script src="script.js"></script>

</html>