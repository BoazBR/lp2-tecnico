<?php
    include_once "./../autoload.php";

    class Adm extends Usuario{
        public function valida(){
            $email = $_REQUEST['email'];
            $senha = $_REQUEST['senha'];

            try{
                $con=Conexao::conectar();
            }catch(PDOException $p){
                throw new PDOException($p -> getMessage());
            }

            $sql = "select * from Usuarios where email = ? and senha = ? and adm = 1";
            $pst = $con -> prepare($SQL);
            $pst -> bindParam(1, $email);
            $pst -> bindParam(2, $senha);
            $pst -> execute();
            $resultado = $pst -> fetch(PDO::FETCH_OBJ);

            if($pst -> rowCount() > 0){
                $_SESSION['logado'] = true;
                $_SESSION['senha'] = $senha;
                $_SESSION['email'] = $email;
            }
        }
    }

?>