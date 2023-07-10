<?php
	class Setor{
		public static function getAll(){
			try{
				$con = Aula14::conectar();
				$pst = $con->prepare("select * from setor order by setor");
				$pst->execute();
				return $pst->fetchAll(PDO::FETCH_OBJ);
			}catch(PDOException $p){
				throw new PDOException($p->getMessage());
			}
		}
	}
?>