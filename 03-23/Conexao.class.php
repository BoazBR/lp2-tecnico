<?php

    require_once "autoload.php";

    class Conexao{
        const DSN = 'mysql:host=localhost;dbname=exercicio_1';
        const DB_USER = 'root';
        const DB_PASS = '12345678';
        static $con;

        public static function conectar(){
            try{
                self::$con = new PDO(self::DSN, self::DB_USER, self::DB_PASS);
                self::$con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return self::$con;
            } catch(PDOException $p) {
                throw new PDOException ($p->getMessage() . " Ocorreu um erro ao conectar o SGBD");
            }
        }
    }

?>