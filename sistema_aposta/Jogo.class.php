<?php
    require_once "autoload.php";

    class Jogo{
        static public function pegaQuantidade(){
            $data = date('y-m-d h:i:sa');

            try{
                $con = Conexao::conectar();
            } catch(PDOException $p){
                throw new PDOException("Erro ao tentar conectar ao banco de dados" . $p->getMessage());
            }

            $SQL = "select * from Jogos where data > ?";

            try{
                $pst = $con -> prepare($SQL);
                $pst -> bindParam(1, $data);
                $pst -> execute();
                $pst -> fetchAll(PDO::FETCH_OBJ);

                return $pst -> rowCount();
                
            } catch (PDOException $p){ 
                throw("Erro ao consultar banco de dados! " . $p->getMessage());
            }

        }    
    }


?>