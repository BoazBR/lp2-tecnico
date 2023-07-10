<?php
	require_once "autoload.inc.php";
	$nome = $_REQUEST['nome'];
	$setor = $_REQUEST['setor'];
	$nivel = $_REQUEST['nivel'];
	try{
		Funcionario::novo($nome,$setor,$nivel);
		$mensagem = "Funcionário cadastrado com sucesso";
	}catch(PDOException $p){
		$mensagem = "Ocorreu um erro inesperado. Tente novamente.";
	}
?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Cadastro de funcionários</title>
  </head>
  <body>
  	<div class="container">
  		<h1>Cadastro de funcionários</h1>
		<div class="alert alert-dark" role="alert">
			<?=$mensagem;?>
		</div>
	</div>
</body>
</html>		