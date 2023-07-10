<?php
    class Usuario{
        private $nome;
        private $email;
        private $senha;

        public function __construct($nome = "", $email = "", $senha = ""){
            $this -> setNome($nome);
            $this -> setEmail($email);
            $this -> setSenha($senha);
        }

        public function salvar (){
            if ($this -> liberado()){
                try{
                    $con = Conexao::conectar();
                } catch(PDOException $p) {
                    throw new PDOException($p -> getMessage());
                }

                $SQL = "insert into usuarios values (?, ?, md5(?))";

                try{
                    $pst = $con -> prepare($SQL);               //pst = prepare statement
                    $pst -> bindValue(1, $this->getNome());
                    $pst -> bindValue(2, $this->getEmail());
                    $pst -> bindValue(3, $this->getSenha());
                    $pst -> execute();
                } catch (PDOException $p) {
                    throw new PDOException ("Ocorreu um erro ao tentar salvar os dados.");
                }
            } else {
                throw new Exception ("O email informado já foi cadastrado.");
            }
        }

        public function liberado (){
            try {
                $con = Conexao::conectar();
            } catch(PDOException $p){
                throw new PDOException ($p -> getMessage());
            }

            $SQL = "select count(*) from usuarios where email=?";

            try{
                $pst = $con -> prepare($SQL);
                $pst -> bindValue(1, $this->getEmail());
                $pst -> execute();
                $dado = $pst -> fetch(PDO::FETCH_NUM);
                if ($dado[0] == 0){
                    return true;
                } else {
                    return false;
                }
            } catch(PDOException $p){
                throw new PDOException ("Ocorreu um erro ao tentar acessar a base de dados.");
            }
        }

        public static function confere($email, $senha){
            try{
                $con = Conexao::conectar();
            } catch (PDOException $p){
                throw new PDOException($p -> getMessage());
            }

            $SQL = "select * from usuarios where email = ? and senha = md5(?)";
            

            try{
                $pst = $con -> prepare($SQL);
                $pst -> bindParam(1, $email);
                $pst -> bindParam(2, $senha);
                $pst -> execute();
                $dado = $pst -> fetch(PDO::FETCH_OBJ);

                if($pst -> rowCount() > 0){
                    $usuario = new Usuario ($dado -> nome, $dado->email, $senha);
                    return $usuario;
                } else {
                    return false;
                }

            } catch (PDOException $p){
                throw new PDOException("Ocorreu um erro ao tentar acessar a base de dados.");
            }


        }

        public function getNome(){
            return $this -> nome;
        }
        public function setNome($nome){
            $this -> nome = $nome;
        }

        public function getEmail(){
            return $this -> email;
        }
        public function setEmail($email){
            $this -> email = $email;
        }

        public function getSenha(){
            return $this -> senha;
        }
        public function setSenha($senha){
            $this -> senha = $senha;
        }
    }
?>