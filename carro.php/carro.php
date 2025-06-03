<?php

class carro{
    private $modelo;
    private $cor;
    private $ano;

    public function setModelo($modelo){
        $this-> modelo = $modelo;
    }

    public function setAno($ano){
        $this-> ano = $ano;
    }
    
    public function setCor($cor){
        $this-> cor = $cor;
    }

    public function getModelo($modelo){
      return $this-> modelo;
    }

    public function getAno($ano){
       return $this-> ano;
    }

    public function getCor($cor){
       return $this-> cor;
    }

    public function __construct($modelo, $ano, $cor){
        $this -> modelo = $modelo;
        $this -> ano = $ano;
        $this -> cor = $cor;
    }

    public function mostrarCarro(){
        echo "Modelo: " . $this -> modelo . "<br>";
        echo "Ano: " . $this -> ano . "<br>";
        echo "Cor: " . $this -> cor . "<br>";
    }

    
}

$carro1 = new carro ("Celta" , "2008", "Preto");
$carro1 -> mostrarCarro();





?>