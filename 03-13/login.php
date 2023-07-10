<?php
    session_start();

    $dsn = 'mysql:host=localhost;';
    $username = $_POST['user'];
    $password = $_POST['password'];
    
    try{
        $con = new PDO($dsn, $username, $password);
        $_SESSION['user'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['erro'] = null;
        header('Location: principal.php');
    }catch(PDOException $p){
        $_SESSION['erro'] = "Erro: " . $p->getMessage();
        header('Location: index.php');
    }
?>