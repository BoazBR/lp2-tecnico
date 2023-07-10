<?php

    session_start();
    require_once "autoload.php";
    if((!isset($_SESSION['logado'])) || ($_SESSION['logado'] != true)){
        header('Location: index.php');
    }

?>