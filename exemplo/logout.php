<?php
session_start();
unset($_COOKIE['aula9_controle']);
setcookie("aula9_controle",null, time()-1,'/');
$_SESSION = array();
session_destroy();
header('Location: index.php');
?>