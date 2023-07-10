<?php
    require_once "autoload.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            tr:nth-child(odd){background: #CCC}
            tr:nth-child(even){background: #FFF}
        </style>
        <title>Cadastro dos Alunos</title>
    </head>
    <body>
        <form action="exec.php" method="post">
            <label>Nome</label> <input type="text" name="nome"><br>
            
            <label>Sexo</label>
                <input type="radio" name="sexo" value="F" checked>Feminino
                <input type="radio" name="sexo" value="M">Masculino<br>

            <label>Email</label> <input type="email" name="email"><br>
            <button type="submit">Cadastrar</button>
        </form>

        <table>
            <tr> <th>Código</th> <th>Nome</th> <th>Sexo</th> <th>Email</th> </tr>
            <?php
                $turma = Aluno::getAll();

                foreach($turma as $aluno){
                    echo "<tr><td>" . $aluno->getCodigo() . "</td>";
                    echo "<td>" . $aluno->getNome() . "</td>";
                    echo "<td>" . $aluno->getSexo() . "</td>";
                    echo "<td>" . $aluno->getEmail() . "</td></tr>";
                }
            ?>
        </table>
    </body>
</html>