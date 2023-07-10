<?php
    if(isset($_REQUEST['email']) && isset($_REQUEST['senha'])){
        
    }
?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login ADM</title>
    </head>
    <body>
        <h2>ADM</h2>
        <form method="get" action="./loginAdm.php">
            <p>Email:<input type="text" id="email" name="email"></p>
            <p>Senha:<input type="password" id="senha" name="senha"></p>
            <button type="submit">Login</button>
        </form>
    </body>
</html>