<?php

    require_once "Conexao.class.php";

    class Cadastro{

        static function incluir($cep = "", $logradouro = "", $bairro = "", $cidade = "", $estado =""){
            try{
                $con = Conexao::conectar();
                $SQL="insert into exercicio_1 (cep, logradouro, bairro, cidade, estado) values (?, ?, ?)";
                $pst = $con -> prepare($SQL);

                $pst->bindParam(1, $cep);
                $pst->bindParam(2, $logradouro);
                $pst->bindParam(3, $bairro);
                $pst->bindParam(4, $cidade);
                $pst->bindParam(5, $estado);

                
            } catch {
                
            }
        }
    }

?>