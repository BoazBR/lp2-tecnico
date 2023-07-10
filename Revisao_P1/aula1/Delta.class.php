<?php

    class Delta{
        public int $a;
        public int $b;
        public int $c;

        public function calcularDelta(){
            return $this -> b * $this -> b - (4 * $this -> a * $this -> c);
        }

        public function calcularX1(){
            $delta = $this -> calcularDelta();
            return (-$this -> b + sqrt($delta)) / 2 * $this -> a;

        }

        public function calcularX2(){
            $delta = $this -> calcularDelta();
            return (-$this -> b - sqrt($delta)) / 2 * $this -> a;
        }
    }

    $objeto1 = new Delta();
    $objeto1 -> a = rand(-10, 10);
    $objeto1 -> b = rand(-10, 10);
    $objeto1 -> c = rand(-10, 10);

    var_dump($objeto1);

    echo "<br>", $objeto1 -> calcularDelta(), "<br>";
    echo $objeto1 -> calcularX1(), "<br>";
    echo $objeto1 -> calcularX2();

    
?>