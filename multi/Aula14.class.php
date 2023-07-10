<?php
	class Aula14{
		public static function Conectar(){
			try {
				return new PDO("mysql:host=localhost;dbname=aula14","root","12345678");
			}catch(PDOException $p){
				throw new PDOException($p->getMessage());
			}
		}
	}
?>