<?php
    class Conexao{
        const DSN = "mysql:host=localhost;dbname=exercicio_1";          //endereço e nome do banco
        const DB_USER = "root";             //user
        const DB_PASS = "12345678";         //senha
        static $con;

        public static function conectar(){
            try{
                self::$con = new PDO(self::DSN, self::DB_USER, self::DB_PASS);
                self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            //tratmento de erro (desnecessário)
                return self::$con;          //retorna a conexão com o banco de dados
            } catch(PDOEXCEPTION $p){
                throw new PDOException("Não foi possível estabelecer uma conexão com o banco de dados!");
            }
        }
    }
?>