<?php

    require_once "autoload.php";
    
    class Cadastro{

        static function incluir($cep = "", $logradouro = "", $bairro = "", $cidade = "", $estado =""){
            try{
                $con = Conexao::conectar();
                $SQL="insert into enderecos (cep, logradouro, bairro, cidade, estado) values (?, ?, ?, ?, ?)";
                $pst = $con -> prepare($SQL);

                $pst->bindParam(1, $cep);
                $pst->bindParam(2, $logradouro);
                $pst->bindParam(3, $bairro);
                $pst->bindParam(4, $cidade);
                $pst->bindParam(5, $estado);

                $pst->execute();

                
            } catch (PDOException $p){
                throw new Exception($p->getMessage() . " Ocorreu um erro ao incluir cadastro. ");
            }
        }

        static function exibe(){
            try{
                $con = Conexao::conectar();
                $SQL = "select * from enderecos";
                $pst = $con -> prepare($SQL);
                $pst -> execute();

                $dados = $pst -> fetchALL(PDO::FETCH_ASSOC);
                $enderecos = array(); //PAREI AQUI

            } catch (PDOException $p){
                throw new Exception($p->getMessage() . " Ocorreu um erro ao exibir o cadastro. ");
            }
            
        }
    }

?>
