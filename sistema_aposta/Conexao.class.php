<?php
    class Conexao{
        static $con;
        public static function conectar(){
            try{
                self::$con = new PDO("mysql:host=localhost;dbname=Apostar-vos-eis", "root", "12345678");
                return self::$con;
            } catch(PDOException $p){
                throw new PDOException("Não foi possível estabelecer a conexão com o servidor de banco de dados.");
            }
        }
    }
?>