<?php
    class Livro{
        public static function getAll($page = 1, $regPag = 10){
            try{
                $con = Conexao::conectar();
                $inicio = ($page-1) * $regPag;
                $sql = "select * from livros order by autor limit $inicio, $regPag;";
                $pst = $con -> prepare($sql);
                $pst -> execute();
            } catch (PDOException $p){
                throw new PDOException($p -> getMessage());
            }
        }
        public static function getTotalLivros(){
            try{
                $con = Conexao::conectar();
                $sql = "select count(*) from livros";
                $pst = $con -> prepare($sql);
                $pst -> execute();
                $ln = $pst -> fetch(PDO::FETCH_NUM);
                return $ln[0];
            } catch(PDOException $p){
                throw new PDOException($p -> getMessage());
            }
        }
    }
?>