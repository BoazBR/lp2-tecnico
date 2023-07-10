<?php

class Animal{
    public function novo($mat, $raca, $cor, $nome){

        try{
            $con = Conexao::conectar();
        }catch(PDOException $p){
            throw new PDOException($p -> getMessage());
        }

        $sql = "insert into Animais values (?, ?, ?, ?);";

        try{
            $pst = $con->prepare($sql);
            $pst -> bindParam(1, $mat);
            $pst -> bindParam(2, $raca);
            $pst -> bindParam(3, $cor);
            $pst -> bindParam(4, $nome);
            $pst -> execute();
        }catch(PDOException $p){
            throw new PDOException($p -> getMessage());
        }
    }

    public function excluir($mat){
        try{
            $con = Conexao::conectar();
        }catch(PDOException $p){
            throw new PDOException($p -> getMessage());
        }

        $sql = "delete from Animais where matricula = ?;";

        try{
            $pst = $con->prepare($sql);
            $pst -> bindParam(1, $mat);
            $pst -> execute();
        }catch(PDOExcpetion $p){
            throw new PDOException($p -> getMessage());
        }
    }

    public function atualizar($mat, $raca, $cor, $nome){
        try{
            $con = Conexao::conectar();
        }catch(PDOException $p){
            throw new PDOException($p -> getMessage());
        }

        $sql = "update Animais set raca = ?, cor = ?, nome = ? where matricula = ?;";

        try{
            $pst = $con->prepare($sql);
            $pst -> bindParam(1, $raca);
            $pst -> bindParam(2, $cor);
            $pst -> bindParam(3, $nome);
            $pst -> bindParam(4, $mat);
            $pst -> execute();
        }catch(PDOException $p){
            throw new PDOException($p->getMessage());
        }
    }

    public function getNome($mat){
        try{
            $con = Conexao::conectar();
        }catch(PDOException $p){
            throw new PDOException($p->getMessage());
        }

        $sql = "select nome from Animais where matricula = ?;";

        try{
            $pst = $con->prepare($sql);
            $pst -> bindParam(1, $matricula);
            $pst -> execute();

            $nome = $pst -> fetch(PDO::FETCH_ASSOC);
            
        }catch(PDOException $p){
            throw new PDOException($p -> getMessage());
        }

        return $nome["nome"];
    }
}

?>