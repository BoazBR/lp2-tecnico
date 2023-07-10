<?php
    require_once "Aluno.class.php";

    $al = new Aluno();

    try{
        $al->salvar($_POST['nome'], $_POST['sexo'], $_POST['email']);
        echo "Aluno cadastrado com sucesso.";
    } catch (PDOException $p){
        echo $p->getMessage();
    }
?>