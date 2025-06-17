<?php

// Criando a classe ControleVideoGame
class ControleVideoGame {
    // Atributos privados (não podem ser acessados de fora)
    private $ligado = false;
    private $energia = 100;

    // Método público para ligar o controle
    public function ligar() {
        $this->ligado = true;
        echo "Controle ligado.\n";
    }

    // Método público para apertar um botão
    public function apertarBotaoA() {
        if ($this->ligado && $this->energia > 0) {
            echo "Botão A foi pressionado!\n";
            $this->energia = $this->energia - 10;
        } else {
            echo "Não é possível usar. Controle desligado ou sem energia.\n";
        }
    }

    //Método público para apertar botão B
    public function apertarBotaoB() {
        if ($this->ligado && $this->energia > 0) {
            echo "Botão B foi pressionado!\n";
            $this->energia = $this->energia - 5;
        } else {
            echo "Não é possível usar. Controle desligado ou sem energia.\n";
        }
    }

    // Método público para ver a energia restante
    public function mostrarEnergia() {
        echo "Energia atual: $this->energia%\n";
    }
}

// Criando o objeto controle
$controle = new ControleVideoGame();

// Tentando usar o botão antes de ligar
$controle->apertarBotaoA();         // Erro esperado

// Ligando o controle
$controle->ligar();

// Usando o botão A
$controle->apertarBotaoA();         // Funciona

// Mostrando energia
$controle->mostrarEnergia();        // Mostra 90

//Apertar botão B
$controle->apertarBotaoB();    //Funciona

//Mostrando energia
$controle->mostrarEnergia();      //Mostra 85

?>
