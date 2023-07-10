<?php

    require_once "Conexao.class.php";
    
    class Aluno{
        public function salvar($nome = "", $sexo = "", $email = ""){
            try{
                $con = Conexao::conectar();
                $SQL="insert into alunos (nome, sexo, email) values (?,?,?)";
                $pst = $con -> prepare($SQL);

                $pst->bindParam(1, $nome);
                $pst->bindParam(2, $sexo);
                $pst->bindParam(3, $email);

                $pst->execute();

            } catch(PDOException $p) {
                throw new PDOException($p->getMessage() . " Ocorreu um erro ao incluir aluno.");
            }
        }
    }
?>