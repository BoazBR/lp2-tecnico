<?php

    session_start();
    require_once "autoload.php";


    if(isset($_REQUEST['email']) && isset($_REQUEST['senha'])){
        $existe = Usuario::valida($_REQUEST['email'], $_REQUEST['senha']);

        try{

        } catch (PDOException $p){
            throw("Erro ao conectar com o banco de dados!" . $p->getMessage());
        }
    }
    


?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body>
        <h1><a href="index.php">Apostar-vos-eis</a></h1>
        <menu nome="cabecalho" id="cabecalho">
            <a href="./anteriores.php">Jogos anteriores</a>
            <a href="./ranking.php">Ver Ranking</a>
            <a href="./login.php">Faça login</a>
        </menu>

        <?php   
            if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){
                echo ("<h2>Seja bem vindo, " . $_SESSION['nome'] . ".</h2>");
            } else {
        ?>

            <h1>Faça Login</h1>
            <form action="login.php" method="get">
                <p>Email: <input type="text" name="email" id="email"></p>
                <p>Senha: <input type="password" name="senha" id="senha"></p>
                <button type="submit">Fazer Login</button>
            </form> 

        <?php
            }
        ?>
    </body>
</html>