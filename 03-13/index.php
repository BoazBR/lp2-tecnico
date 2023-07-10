<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Informe dados de login</title>
    </head>
    <body>
        <form action="login.php" method="post">
            <input type="text" name="user">
            <input type="password" name="password">
            <button type="submit">Login</button>
        </form>

        <?php
            if(isset($_SESSION['erro']) && $_SESSION['erro']!=null){
                echo $_SESSION['erro'];
            }
        ?>

    </body>
</html>