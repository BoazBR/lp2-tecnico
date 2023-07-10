<?php
	require_once "autoload.inc.php";
?>
<!doctype html>
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

			<form action="save.funcionario.php" method="post">
			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" name="nome" id="nome" value="<?=isset($_REQUEST['nome']) ? $_REQUEST['nome'] : ""; ?>" placeholder="Nome completo">
			</div>
	<div class="form-group">
		<label for="setor">Setor</label>
		<select name="setor" id="setor" onchange="setSetor(this)" class="form-control">
			<option value="-1">Selecione</option>
			<?php
			$setores = Setor::getAll();
			foreach($setores as $setor){
				$check = "";
				if (isset($_REQUEST['setor'])){
					$check = ($setor->codigo == $_REQUEST['setor'] ? " selected " : ""); 	
				}
				
				echo "<option value='".$setor->codigo."' $check >".$setor->setor."</option>";
			}
			
			?>
		</select>
	</div>

	<div class="form-group">
		<label for="nivel">Nivel</label>
		
		<select name="nivel" id="nivel" class="form-control">
			<option value="-1">Selecione</option>
			<?php
			if (isset($_REQUEST['setor'])){
				$niveis = Nivel::getBySetor($_REQUEST['setor']);
				print_r($niveis);
				foreach($niveis as $nivel)
					echo "<option value='".$nivel->codigo."'>".$nivel->nivel."</option>";
			}
			?>
			
		</select>
	</div>

	
	<button type="submit" class="btn btn-primary">Salvar</button>

	</div>
	</form>
	</div>
	</body>
	<script>
		function setSetor(elemento){
			var setor = elemento.options[elemento.options.selectedIndex].value;
			if (setor!=-1){
				var nome = document.getElementById("nome").value;
				window.location.href='formFuncionario.php?setor=' + setor + '&nome=' + nome;
			}
		}
	</script>
</html>