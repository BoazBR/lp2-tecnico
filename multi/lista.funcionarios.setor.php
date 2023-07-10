<?php
require_once "autoload.inc.php";
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
  <?php
  try {
    $setores = Setor::getAll();
    foreach($setores as $setor){
    ?>
    <tr>
      <th scope="row" colspan=5><?=$setor->setor;?></th>
    </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Nível</th>
      <th scope="col" style="text-align: right;">Salário</th>
    </tr>
  <?php
    $funcionarios = Funcionario::getBySetor($setor->codigo);
    foreach($funcionarios as $func){
  ?>
    <tr>
      <th scope="row"><?=$func->codigo;?></th>
      <td><?=$func->nome;?></td>
      <td><?=$func->nivel;?></td>
      <td style="text-align: right;">R$ <?=number_format($func->salario, 2, ',', '.');?></td>
    </tr>
  <?php
    }
  }
}catch(PDOException $p){
  echo $p->getMessage();
}
  ?>
</table>
	</div>
</body>
</html>		