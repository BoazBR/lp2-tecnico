<?php
    require_once "autoload.php";
    $usuario = new Usuario($_REQUEST['nome_cad'],$_REQUEST['email_cad'],$_REQUEST['senha_cad']);
    try{
        $usuario->salvar();
        echo "<script>window.alert('Cadastro efetuado com sucesso.');window.location.href='index.php#paralogin';</script>";
    } catch(PDOException $p){
        echo "<div class='erro'>" . $p->getMessage() ."</div>";
    } catch(Exception $e){
        echo "<script>window.alert('".$e->getMessage()."');window.location.href='index.php';</script>";
    }
?>