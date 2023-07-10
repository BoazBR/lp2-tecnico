<?php
    require_once "autoload.php";
?>
<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <link rel="stylesheet" type="text/css" href="estilo.css" media="screen" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Apostar-vos-eis</title>
    </head>
    <body>
        <h1><a href="index.php">Apostar-vos-eis</a></h1>
        <menu nome="cabecalho" id="cabecalho">
            <a href="./adm/loginAdm.php">Área do administrador</a>
            <a href="./anteriores.php">Jogos anteriores</a>
            <a href="./ranking.php">Ver Ranking</a>
            <a href="./login.php">Faça login</a>
        </menu>

        
        <div name="jogos" id="jogos">
            <?php
                $qtdJogos = Jogo::pegaQuantidade();         //pega do BD a quantidade de jogos marcados p/ acontecer a partir da data do servidor
                $horas = 10;                                //precisa pegar do BD as horas dos jogos marcados
                $foto = "./images/time_generico.jpg";       //precisa pegar do BD os escudos de cada time
                $time1 = "Time 1 (place holder)";           //precisa pegar do BD os nomes de cada time que vão jogar
                $time2 = "Time 2 (place holder)";
                //echo (date('y-m-d h:i:sa'));
                for($i = 1; $i <= $qtdJogos; $i++){
            ?>
                <div class='jogo'>
                    <div class='aposta'>
                        <h3>Faltam <?php echo($horas); ?> horas para o jogo</h3>
                        <div class="placar">    
                            <div class="time1">
                                <h4><?=$time1?></h4>
                                <img src="<?php echo($foto); ?>" alt="time place holder" width="125" height="150">
                            </div>
                            <h1>X</h1>
                            <div class="time2">
                                <h4><?=$time2?></h4> 
                                <img src="<?php echo($foto); ?>" alt="time place holder" width="125" height="150">
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>        
    </body>
</html>