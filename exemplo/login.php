<?php
    session_start();
    require_once "autoload.php";
    try {
        $email="";
        $senha="";
        if(isset($_REQUEST['email_login'])){
            $email = $_REQUEST['email_login'];
            $senha = $_REQUEST['senha_login'];
        } elseif(isset($_COOKIE['aula9_controle'])){
            $us = unserialize(base64_decode($_COOKIE['aula9_controle']));
            $email = $us->getEmail();
            $senha= $us->getSenha();
        }
        $usuario = Usuario::confere($email,$senha);
        
        if ($usuario){
            if(isset($_COOKIE['aula9_controle'])){
                $usuario->setNome($usuario->getNome() . " [Automático]");
            }
            if(isset($_REQUEST['email_login'])){
                if (isset($_REQUEST['manterlogado'])){
                    setcookie("aula9_controle",base64_encode(serialize($usuario)), time()+60*60*24*10,"/");
                } else {
                    unset($_COOKIE['aula9_controle']);
                    setcookie("aula9_controle",null, time()-1,'/');
                }
            }
            $_SESSION['logado'] = true;
            $_SESSION['usuario'] = serialize($usuario);
            header('Location: principal.php');
        } else {
            $_SESSION['logado'] = false;
            unset($_COOKIE['aula9_controle']);
            setcookie("aula9_controle",null, time()-1,'/');
            echo "<script>window.alert('Usuário ou senha incorretos.');window.location.href='index.php#paralogin';</script>";
        }
    }catch(PDOException $p){
        echo("Ocorreu um erro ao tentar acessar a base de dados. <br>Verifique: <i>" .$p->getMessage()."</i>");
    }
?>
