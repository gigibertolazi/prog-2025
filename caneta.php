<?php

//definindo a classe caneta

class Caneta{
    //definir atributos

    public $cor;

    public $marca;

    public $ponta;

    public $tamanho;

    public $carga;


    //definir métodos

    public function escrever($texto){
        echo "Escrevendo $texto na tela<br>";
    }
    public function rabiscar(){
        echo "Rabiscando...<br>";
    }
    public function sublinhar(){
        echo "Sublinhando...<br>";
    }
    public function pintar(){
        echo "Pintando...<br><br>";
    }
}

//Instanciamento a classe Caneta

$caneta1 = new Caneta();

$caneta1->cor = "azul";
$caneta1->marca = "bic";
$caneta1->ponta = 10;
$caneta1->tamanho = 10;
$caneta1->carga = 100;


//exibindo os atributos da caneta

echo "Cor: " . $caneta1->cor . "<br>";
echo "Marca: " . $caneta1->marca . "<br>";
echo "Ponta: " . $caneta1->ponta . "<br>";
echo "Tamanho: " . $caneta1->tamanho . "<br>";
echo "Carga: " . $caneta1->carga . "<br><br>";

//chamando métodos


$caneta1->escrever("olá");
$caneta1->rabiscar();
$caneta1->sublinhar();
$caneta1->pintar();

//novo objeto

$caneta2 = new Caneta();
$caneta2->escrever("quero férias");




?>