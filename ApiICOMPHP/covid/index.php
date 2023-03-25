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
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('Y-m-d H:i:s');
        include "conexao.php";
        include "processa.php";
        if (isset($_GET['pais']) && isset($_GET['data'])) :
            $api =  LigarApi($_GET['pais']);
            getData($_GET['data'], $_GET['pais'], $pdo);
        endif;
        ?>
        <h1>COVID-19</h1>
        <p>Em meio ao caos do covid-19, houve vários problemas em determinados países, com essa problematica, este
            sistema permite verificar os obitos e casos confirmados no Australia, Brasil e Canada.</p>
        <form method="get">
            <div class="input">
                <input type="hidden" name="data" value="<?= $data ?>">
                <div class="brasildiv">
                    <input type="radio" name="pais" id="brasil" value="Brazil"><label for="brasil">Brazil</label>
                </div>
                <div class="canadadiv">
                    <input type="radio" name="pais" id="canada" value="Canada"><label for="canada">Canada</label>
                </div>
                <div class="Australiadiv">
                    <input type="radio" name="pais" id="Australia" value="Australia"><label for="Australia">Australia</label>
                </div>
            </div>
            <div class="btn">
                <input type='submit' value="Verificar" id="btn">
            </div>
        </form>
        <?php
        if (isset($_GET['pais']) && isset($_GET['data'])) :
            echo $api;
            date_default_timezone_set('America/Sao_Paulo');
            $data = date('d-m-Y H:i:s');
            $sel = $pdo->query("SELECT `getdata`, `pais` FROM `getdata`");
            while($get = $sel->fetch()){
                $gtdata = $get['getdata'];
                $gtpais = $get['pais'];
            }
        ?>
            <footer>
                <div class="conateiner">
                    <p>A data e a hora do acesso é <?= $gtdata; ?> e o país é <?= $gtpais ?></p>
                </div>
            </footer>
        <?php
        endif;
        ?>
    </div>
</body>

</html>