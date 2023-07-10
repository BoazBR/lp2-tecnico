<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form enctype="multipart/form-data" action="up.php" method="post">
            Nome: <input type="text" name="nome" /><br>

            <input type="hidden" name="MAX_FILE_SIZE" value="50000" />
            Foto: <input name="foto" type="file" /> <br>

            <button type="submit">Cadastrar</button>
        </form>


        <form action="exibe.php">
            <button type="submit">Exibir</button>
        </form>





    </body>
</html>