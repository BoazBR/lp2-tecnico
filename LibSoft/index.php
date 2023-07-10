<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LibSoft</title>
    </head>
    <body>
        <h2>Cadastro de CEP:</h2>
        <form action="cad.php" method="get">
            <p>
                CEP: <input type="text" name="cep" id="cep">
            </p>
            <p>
                Logradouro: <input type="text" name="logradouro" id="logradouro">
            </p>
            <p>
                Bairro: <input type="text" name="bairro" id="bairro">
            </p>
            <p>
                Cidade: <input type="text" name="cidade" id="cidade">
            </p>
            <p>
                Estado: <input type="text" name="estado" id="estado">
            </p>


            <button type="submit" name="Cadastrar">Cadastrar</button>
        </form>
    </body>
</html>