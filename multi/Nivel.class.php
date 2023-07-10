<?php
class Nivel{
	public static function getBySetor($setor){
		try{
			$con = Aula14::conectar();
			$pst = $con->prepare("select * from nivel where codigo_setor=? order by nivel");
			$pst->bindParam(1,$setor);
			$pst->execute();
			return $pst->fetchAll(PDO::FETCH_OBJ);
		}catch(PDOException $p){
			throw new PDOException($p->getMessage());
		}
	}
}
?>