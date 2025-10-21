<?php
  abstract class Pessoa {
    protected $nome;
    protected $idade;
    protected $sexo;

    public function __construct($nome, $idade, $sexo) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->sexo = $sexo;
    }

    final public function fazerAniversario() {
        $this->idade++;
        echo "<p>Parabéns, {$this->nome}! Agora você tem {$this->idade} anos.</p>";
    }

    abstract public function apresentar();
}

  class Visitante extends Pessoa {
    public function apresentar() {
        echo "<p>Sou um visitante chamado {$this->nome}, tenho {$this->idade} anos e sou do sexo {$this->sexo}.</p>";
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
        echo "<p>Sou o aluno {$this->nome}, do curso de {$this->curso}.</p>";
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

//class Cordernador extends Professor (ERRO)



$v1 = new Visitante("Marta", 66, "F");
$aluno1 = new Aluno("Giovana", 17, "F", "2023302712", "Informática");
$bolsista1 = new Bolsista("Laís", 19, "F", "2023303415", "Informática", 10);
$prof1 = new Professor("Cíntia", 37, "F", "História", 5000);

$obj = [$v1, $aluno1, $bolsista1, $prof1];

foreach ($obj as $objetos) {
    echo "<hr>";
    echo "<p>Classe: " . get_class($objetos) . "</p>";
    echo "<p>É Pessoa? " . ($objetos instanceof Pessoa ? "Sim" : "Não") . "</p>";
    echo "<p>É Aluno? " . ($objetos instanceof Aluno ? "Sim" : "Não") . "</p>";
    echo "<p>É Bolsista? " . ($objetos instanceof Bolsista ? "Sim" : "Não") . "</p>";
    echo "<p>É Professor? " . ($objetos instanceof Professor ? "Sim" : "Não") . "</p>";
    $objetos->apresentar();
}
?>