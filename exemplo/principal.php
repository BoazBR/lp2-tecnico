<?php
require_once "session.php";
$usuario = unserialize($_SESSION['usuario']);
$nome = $usuario->getNome();

$class_home = "";
$class_verTodos= "";

if (!isset($_GET['pg'])){
  $class_home= " active ";
} else if(($_GET['pg'] == base64_encode("verTodos")) || ($_REQUEST['pg'] ==base64_encode("altUser"))){
  $class_verTodos = " active ";
}
?>
<!doctype html>
<html lang="pt-br">
  <head>
      <meta charset="utf-8">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
      rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
      crossorigin="anonymous">
      <title>Menu principal</title>
  </head>
  <body>
    <div class="container">
      <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
          <span class="fs-4"><?=$nome;?></span>
        </a>
        <ul class="nav nav-pills">
          <li class="nav-item"><a href="principal.php" class="nav-link <?=$class_home;?>" aria-current="page">Home</a></li>
          <?php
            if ($usuario->getNivel()==1) {
              echo "<li class=\"nav-item\"><a class=\"nav-link $class_verTodos\"  href=\"principal.php?pg=".base64_encode("verTodos")."\" title=\"Ver usuários cadastrados\">Usuários</a></li>";
            }
          ?>
          <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
        </ul>
      </header>
      
      <?php
        if (isset($_GET['pg'])){
          include base64_decode($_GET['pg']).".inc.php";
        }
        if (isset($_REQUEST['c'])){
          if(base64_decode($_REQUEST['c'])=="delUser"){
            try{
              Usuario::delUser(base64_decode($_REQUEST['x']));
              echo "<div class=\"alert alert-success\" role=\"alert\">O usuário ". base64_decode($_GET['x']) ." foi excluído com sucesso. </div>";
            }catch(PDOException $p){
              echo "<div class=\"alert alert-danger\" role=\"alert\">Atenção: " .$p->getMessage()."</div>";
            }
          }
          if(base64_decode($_REQUEST['c']) == "updateUser"){
            try{
              Usuario::atualizar($_REQUEST['nome'], $_REQUEST['email'], $_REQUEST['nivel'], $_REQUEST['senha']);
              echo "<div class=\"alert alert-sucess\" role=\"alert\">O usuário ". $_REQUEST["nome"] . " foi atualizado com sucesso.</div>";
            } catch(PDOException $p){
              echo "<div class=\"alert alert-danger\" role=\"alert\">Atenção: " . $p->getMessage()."</div>";
            }
          }
        }
      ?>
    </div>
  </body>
</html>
