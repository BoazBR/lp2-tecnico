<?php
    class Usuario{
        private $nome;
        private $email;
        private $senha;
        private $nivel;

        public function __construct($nome = "", $email = "", $senha = "", $nivel = ""){
            $this->setNome($nome);
            $this->setEmail($email);
            $this->setSenha($senha);
            $this->setNivel($nivel);
        }

        public static function pegaUser($email){
            try{
                $con = Conexao::conectar();
            } catch (PDOException $p){
                throw new PDOException($p->getMessage());
            }

            $SQL = "select * from usuarios where email=?";

            try{
                $pst = $con->prepare($SQL);
                $pst -> bindParam(1, $email);
                $pst -> execute();
                $dado = $pst -> fetch(PDO::FETCH_OBJ);
                if($pst -> rowCount()>0){
                    $usuario = new Usuario($dado->nome, $dado->email, "", $dado->nivel);
                    return $usuario;
                } else {
                    return false;
                }
            } catch (PDOException $p){
                throw new PDOException("Ocorreu um erro ao tentar acessar a base de dados. <br>Verifique: <i>" . $p->getMessage()."</i>");
            }
        }

        public static function atualizar($nome = "", $email = "", $nivel = "", $senha = ""){
            try{
                $con = Conexao::conectar();
            } catch(PDOException $p) {
                throw new PDOException($p->getMessage());
            }

            try{
                if($senha==""){
                    $SQL = "update usuarios set nome=:nome, nivel=:nivel where email=:email";
                } else {
                    $SQL = "update usuarios set nome=:nome, nivel=:nivel, senha=md5(:senha) where email=:email";
                }

                $st = $con->prepare($SQL);
                $st -> bindParam(':nome', $nome);
                $st -> bindParam(':nivel', $nivel);
                $st -> bindParam(':email', $email);

                if($senha != ""){
                    $st->bindParam(':senha', $senha);
                }
                $st -> execute();
            } catch(PDOException $p){
                throw new PDOException("Ocorreu um erro ao tentar atualizar os dados. <br>Verifique:<i>" .$p->getMessage()."</i>");
            }
        }

        public function salvar(){
            if ($this->liberado()){   
                try{
                    $con = Conexao::conectar();
                } catch(PDOException $p){
                    throw new PDOException($p->getMessage());
                }
                
                $SQL = "insert into usuarios (nome,email,senha) values (?,?,md5(?))";

                try{
                    $pst = $con->prepare($SQL);
                    $pst->bindValue(1,$this->getNome());
                    $pst->bindValue(2,$this->getEmail());
                    $pst->bindValue(3,$this->getSenha());
                    $pst->execute();
                }catch(PDOException $p){
                    throw new PDOException("Ocorreu um erro ao tentar salvar os dados. <br>Verifique: <i>" .$p->getMessage()."</i>");
                }
            } else {
                throw new Exception("O email informado já foi cadastrado.");
            }
        }

        public function liberado(){
            try{
                $con = Conexao::conectar();
            } catch(PDOException $p){
                throw new PDOException($p->getMessage());
            }

            $SQL = "select count(*) from usuarios where email=?";
            try{
                $pst = $con->prepare($SQL);
                $pst->bindValue(1,$this->getEmail());
                $pst->execute();
                $dado = $pst->fetch(PDO::FETCH_NUM);
                if ($dado[0] == 0)
                    return true;
                else
                    return false;
            }catch(PDOException $p){
                throw new PDOException("Ocorreu um erro ao tentar acessar a base de dados. <br>Verifique: <i>" .$p->getMessage()."</i>");
            }
        }

        public static function confere($email, $senha){
            try{
                $con = Conexao::conectar();
            } catch(PDOException $p){
                throw new PDOException($p->getMessage());
            }

            $SQL = "select * from usuarios where email=? and senha=md5(?)";
            try{
                $pst = $con->prepare($SQL);
                $pst->bindParam(1,$email);
                $pst->bindParam(2,$senha);
                $pst->execute();
                $dado = $pst->fetch(PDO::FETCH_OBJ);
                if ($pst->rowCount()>0){
                    $usuario = new Usuario($dado->nome,$dado->email,$senha,$dado->nivel);
                    return $usuario;
                }else
                    return false;

            }catch(PDOException $p){
                throw new PDOException("Ocorreu um erro ao tentar acessar a base de dados. <br>Verifique: <i>" .$p->getMessage()."</i>");
            }
        }
        public static function getAll(){
            try{
                $con = Conexao::conectar();
            } catch(PDOException $p){
                throw new PDOException($p->getMessage());
            }
            try{
                $SQL = "select * from usuarios order by nome";
                $pst = $con->prepare($SQL);
                $pst->execute();
                $dados = $pst->fetchAll(PDO::FETCH_OBJ);
                $r = array();
                foreach ($dados as $dado)
                    array_push($r,new Usuario($dado->nome,$dado->email,$dado->senha,$dado->nivel));
                return $r;
            }catch(PDOException $p){
                throw new PDOException("Ocorreu um erro ao tentar acessar a base de dados. <br>Verifique: <i>" .$p->getMessage()."</i>");
            }
        }
        public static function delUser($email){
            try{
                $con = Conexao::conectar();
            } catch(PDOException $p){
                throw new PDOException($p->getMessage());
            }

            $SQL = "delete from usuarios where email=?";

            try{
                $pst = $con->prepare($SQL);
                $pst->bindParam(1,$email);
                $pst->execute();
            }catch(PDOException $p){
                throw new PDOException("Ocorreu um erro ao tentar excluir um usuário. <br>Verifique: <i>" .$p->getMessage()."</i>");
            }
        }

        public function getNome(){ 
            return $this->nome;
        }
        public function getEmail(){ 
            return $this->email;
        }
        public function getSenha(){ 
            return $this->senha;
        }
        public function getNivel(){ 
            return $this->nivel;
        }
        public function setSenha($senha){
            $this->senha = $senha;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function setNivel($nivel){
            $this->nivel = $nivel;
        }
    }