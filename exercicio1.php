<?php

class Funcionario {
    public $nome;
    public $salario;
    
    public function __construct($nome, $salario) {
        $this->nome = $nome;
        $this->salario = $salario;
    }
    
    public function addAumento($valor) {
        $this->salario += $valor;
    }
    
    public function ganhoAnual() {
        return $this->salario * 12;
    }
    
    public function exibeDados() {
        echo "Nome: " . $this->nome . "\n";
        echo "Salário: R$" . number_format($this->salario, 2, ',', '.') . "\n";
    }
}


class Assistente extends Funcionario {
    private $matricula;
    
    public function __construct($nome, $salario, $matricula) {
        parent::__construct($nome, $salario);
        $this->matricula = $matricula;
    }
    
    public function getMatricula() {
        return $this->matricula;
    }
    
    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }
    
    public function exibeDados() {
        parent::exibeDados();
        echo "Matrícula: " . $this->matricula . "\n";
    }
}


class Tecnico extends Assistente {
    private $bonus;
    
    public function __construct($nome, $salario, $matricula, $bonus) {
        parent::__construct($nome, $salario, $matricula);
        $this->bonus = $bonus;
    }
    
    public function ganhoAnual() {
        return parent::ganhoAnual() + $this->bonus;
    }
}


class Administrativo extends Assistente {
    private $turno; 
    private $adicional;
    
    public function __construct($nome, $salario, $matricula, $turno, $adicional) {
        parent::__construct($nome, $salario, $matricula);
        $this->turno = $turno;
        $this->adicional = $adicional;
    }
    
    public function ganhoAnual() {
        return parent::ganhoAnual() + ($this->adicional * 12);
    }
}


$funcionario = new Funcionario("Adriadine Trindade", 2000);
$funcionario->exibeDados();

$assistente = new Assistente("Laís Caetano", 1800, 123);
$assistente->exibeDados();

$tecnico = new Tecnico("Roberta Matte", 2200, 456, 1000);
$tecnico->exibeDados();
echo "Ganho anual técnico: R$" . number_format($tecnico->ganhoAnual(), 2, ',', '.') . "\n";

$administrativo = new Administrativo("Giovana Bertolazi", 1900, 789, "noite", 300);
$administrativo->exibeDados();
echo "Ganho anual administrativo: R$" . number_format($administrativo->ganhoAnual(), 2, ',', '.') . "\n";
?>









?>