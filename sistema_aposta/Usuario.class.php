<?php
    require_once "autoload.php";

    class Usuario{
        private $email;
        private $nome;
        private $senha;
        private $adm;
        private $pontos;

        public function __construct(){

        }

        static public function valida(){
            $email = $_REQUEST["email"];
            $senha = $_REQUEST["senha"];

            try{
                $con = Conexao::conectar();
            } catch(PDOException $p) {
                throw new PDOException($p->getMessage());
            }

            $SQL = "select * from Usuarios where email = ? and senha = ?";
            $pst = $con -> prepare($SQL);
            $pst -> bindParam(1, $email);
            $pst -> bindParam(2, $senha);
            $pst -> execute();
            $resultado = $pst -> fetch(PDO::FETCH_OBJ);

            if($pst -> rowCount() > 0){
                $_SESSION['logado'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                $_SESSION['nome'] = $resultado -> nome;
            }       
        }
    }
?>