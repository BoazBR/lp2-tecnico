<?php
    class Conexao{
        static $con;
        public static function conectar(){
            try{
                self::$con = new PDO("mysql:host=localhost; dbname=Animais", "root", "12345678");
            } catch (PDOException $p){
                throw new PDOException($p -> getMessage());
            }
        }
    }
?>