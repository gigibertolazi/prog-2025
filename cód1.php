<?php

abstract class Pessoa {
    public $nome;
    public $idade;
    public $sexo;

    public function __construct($nome, $idade, $sexo) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->sexo = $sexo;
    }

    // Método comum (não abstrato)
    final public function fazerAniversario() {
        $this->idade++;
        echo "<p>Parabéns, {$this->nome}! Agora você tem {$this->idade} anos.</p>";
    }

    // Método abstrato
    abstract public function apresentar();
}

class Visitante extends Pessoa {
    public function apresentar() {
        echo "<p>Sou um visitante chamado {$this->nome}.</p>";
    }
}

class Aluno extends Pessoa {
    protected $matricula;
    protected $curso;

    public function __construct($nome, $idade, $sexo, $matricula, $curso) {
        parent::__construct($nome, $idade, $sexo);
        $this->matricula = $matricula;
        $this->curso = $curso;
    }

    public function apresentar() {
        echo "<p>Sou o(a) aluno(a) {$this->nome}, do curso de {$this->curso}.</p>";
    }

    public function pagarMensalidade() {
        echo "<p>Mensalidade de {$this->nome} paga com sucesso!</p>";
    }
}

class Bolsista extends Aluno {
    private $bolsa;

    public function __construct($nome, $idade, $sexo, $matricula, $curso, $bolsa) {
        parent::__construct($nome, $idade, $sexo, $matricula, $curso);
        $this->bolsa = $bolsa;
    }

    public function renovarBolsa() {
        echo "<p>Bolsa renovada para {$this->nome}!</p>";
    }

    public function pagarMensalidade() {
        echo "<p>{$this->nome} é bolsista! Pagamento com desconto de {$this->bolsa}%.</p>";
    }
}

final class Professor extends Pessoa {
    private $especialidade;
    private $salario;

    public function __construct($nome, $idade, $sexo, $esp, $salario) {
        parent::__construct($nome, $idade, $sexo);
        $this->especialidade = $esp;
        $this->salario = $salario;
    }

    public function apresentar() {
        echo "<p>Sou o professor {$this->nome}, especialista em {$this->especialidade}.</p>";
    }

    public function receberAumento($valor) {
        $this->salario += $valor;
        echo "<p>O salário de {$this->nome} foi reajustado para R$ {$this->salario}.</p>";
    }
}





$v1 = new Visitante("Marta", 66, "F", );
$v1->fazerAniversario();
$v1->apresentar();

"<br>";


$aluno1= new Aluno("Roberta", 17, "F", "2023305509", "Informática");
$aluno1 -> fazerAniversario();
$aluno1 -> apresentar();
$aluno1 -> pagarMensalidade();

"<br>";

$bolsista1= new Bolsista("Laís", 18, "F", "2023303415", "Informática", 10 );
$bolsista1 -> fazerAniversario();
$bolsista1 -> apresentar();
$bolsista1 -> renovarBolsa();
$bolsista1 -> pagarMensalidade();

"<br>";

$prof1 = new Professor("Telmo", 63, "M", "História", 3200 );
$prof1->fazerAniversario();
$prof1->apresentar();
$prof1->receberAumento();
















?>