<?php

    class Animal {
        public $nome;
        public $especie;
        public $expectativa_vida;

        public function retornaVetor(){
            $con = Conexao :: Conectar();
            $SQL = "select * from tb_animal";
            $pst = $con -> prepare($SQL);
            $pst -> execute();
            $objetos = [];
            $dados = $pst -> fetchAll(PDO::FETCH_ASSOC);

            foreach($dados as $linha){
                $an = new Animal();
                $an -> nome = $linha["nome"];
                $an -> especie = $linha["especie"];
                $an -> expectativa_vida = $linha["expectativa_vida"];

                $objetos[] = $an;
            }

            return $objetos;
            
            
            //return $pst -> fetchAll(PDO::FETCH_OBJ);
        }
    }

?>