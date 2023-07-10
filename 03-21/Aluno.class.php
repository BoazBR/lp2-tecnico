<?php

    require_once "autoload.php";
    
    class Aluno{
        private $codigo;
        private $nome;
        private $email;
        private $sexo;

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
                throw new PDOException($p . "<br>Ocorreu um erro ao incluir aluno.");
            }
        }

        public static function getALL(){
            try{
                $con = Conexao::conectar();
                $SQL = "select * from alunos";
                $pst = $con->prepare($SQL);
                $pst->execute();

                $dados = $pst->fetchALL(PDO::FETCH_ASSOC);
                $turma = array();
                foreach($dados as $linhas){
                    $al = new Aluno();
                    $al->setCodigo($linha['codigo']);
                    $al->setNome($linha['nome']);
                    $al->setSexo($linha['sexo']);
                    $al->setEmail($linha['email']);
                    array_push($turma,$al);
                }
                return $turma;
            } catch(PDOException $p){
                throw new Exception("Ocorreu um erro ao recuperar as informações sobre alunos.");
            }
        }

        public function setCodigo($v){
            $this->codigo = $v;
        }
        public function getCodigo(){
            return $this->codigo;
        }

        public function setNome($v){
            $this->nome = $v;
        }
        public function getNome(){
            return $this->nome;
        }

        public function setEmail($v){
            $this->email = $v;
        }
        public function getEmail(){
            return $this->email;
        }

        public function setSexo($v){
            $this->sexo = $v;
        }
        public function getSexo($v){
            return $this->sexo;
        }


    }
?>