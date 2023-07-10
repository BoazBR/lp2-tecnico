<?php

    require_once "autoload.php";

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form method="get" action="exec.php">
            Cep:
            <input type="text" name="cep"><br><br>

            Logradouro:
            <input type="text" name="logradouro"><br><br>

            Bairro:
            <input type="text" name="bairro"><br><br>

            Cidade:
            <input type="text" name="cidade"><br><br>

            Estado:
            <input type="text" name="estado"><br><br>

            <button type="submit" name="botao">Cadastrar</button>
        </form>
        <br>
        <form action="exibe.php">
            <button type="submit">Exibir endereços</button>
        </form>
    </body>
</html>