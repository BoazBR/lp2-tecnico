<?php
    include_once("autoload.php");
?>
<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página de Exibição</title>
    </head>
    <body>
        <table>
            <?php foreach($dados as $dado){ ?>
                <tr><td>
                    <b><?=$dado->nome;?></b><br>
                    <figure>
                        <img src="./images/<?=$dado->foto;?>" width = 400 alt="Foto de <?=$dado->nome;?>" />
                </figure>
            <?php } ?>
        </table>
    </body>
</html>