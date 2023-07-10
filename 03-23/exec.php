<?php
    require_once "autoload.php";

    $cad = new Cadastro();

    try{
        $cad->incluir($_GET['cep'], $_GET['logradouro'], $_GET['bairro'], $_GET['cidade'], $_GET['estado']);
        echo "Endereco cadastrado com sucesso.";
      
    } catch (PDOException $p){
        echo $p->getMessage();
    }
?>


<form action="index.php">
    <button type="submit">voltar</button>
</form>

