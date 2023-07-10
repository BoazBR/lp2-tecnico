<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Principal</title>
    </head>
    <body>
        <form action="executar.php" method="get">
            <p>SQL</p>
            <textarea name="comandos"></textarea>
            <button type="submit">executar</button>
        </form>

        <?php
            echo $_SESSION['erro'];
        ?>
    </body>
</html>