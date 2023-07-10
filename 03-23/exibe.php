<?php
    require_once "autoload.php";

    $cad = new Cadastro();

    try{
        $cad->exibe();
    } catch (PDOException $p){
        echo $p->getMessage();
    }

?>