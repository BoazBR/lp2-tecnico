<?php
    require_once "autoload.php";
    $usuario = new Usuario($_GET['nome_cad'], $_GET['email_cad'], $_GET['senha_cad']);
    try{
        $usuario->salvar();
        echo "<script>window.alert('Cadastro efetuado com sucesso.');
        window.location.href='index.php#paralogin';</script>";
    } catch(PDOExcpetion $p){
        echo "<div class='erro'>" . $p -> getMessage(). "</div>";
    } catch(Exception $e){
        echo "<script>window.alert('".$e -> getMessage()."');
        window.location.href='index.php';</script>";
    }

?>