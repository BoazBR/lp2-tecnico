<?php
require_once "autoload.inc.php";
try{
  $funcionarios = Funcionario::getAll();
}catch(PDOException $p){
  die($p->getMessage());
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
		<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Setor</th>
      <th scope="col">Nível</th>
      <th scope="col" style="text-align: right;">Salário</th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach($funcionarios as $func){
  ?>
    <tr>
      <th scope="row"><?=$func->codigo;?></th>
      <td><?=$func->nome;?></td>
      <td><?=$func->setor;?></td>
      <td><?=$func->nivel;?></td>
      <td style="text-align: right;">R$ <?=number_format($func->salario, 2, ',', '.');?></td>
    </tr>
  <?php
  }
  ?>
  </tbody>
</table>
	</div>
</body>
</html>		