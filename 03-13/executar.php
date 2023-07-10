<?php
    session_start();

    $dsn = "mysql:host=localhost;";
    $username = $_SESSION["user"];
    $password = $_SESSION["password"];
    
    try {
        $con = new PDO($dsn, $username, $password);
        print_r($_GET);
        $con->exec($_GET['comandos']);
        $_SESSION['erro'] = "Query OK.";
    } catch(PDOException $p){
        $_SESSION['erro'] = $p->getMessage();
    }

    header("Location: principal.php");
?>