<?php
    require_once "autoload.php";

    $al = new Aluno();

    try{
        $al->salvar($_POST['nome'], $_POST['sexo'], $_POST['email']);
        echo "Aluno cadastrado com sucesso.";
?>
        <form action="index.php">
            <button type="submit">voltar</button>
        </form>

<?php        
    } catch (PDOException $p){
        echo $p->getMessage();
    }
?>