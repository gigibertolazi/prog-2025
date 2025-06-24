<?php

//Conceitos:
//classe é o molde de um objeto, que define atributos e métodos de um objeto;
//obejto é um elemento criado com base na classe, seguindo os métodos e atributos que recebeu.


//EXEMPLO
class Carro {
    public $cor;
    public $modelo;
    public $ano;
}
//objeto 
$meuCarro = new Carro();
$meuCarro->cor = "vermelho";
$meuCarro->modelo = "Fusca";
$meuCarro->ano = 1975;
echo "Exemplo: <br>";
echo "Cor: " . $meuCarro->cor . "<br>";
echo "Modelo: " . $meuCarro->modelo . "<br>";
echo "Ano: " . $meuCarro->ano . "<br> <br>";







//Atividade

class Aluno {
    
    private $nome;
    private $matricula;

    public function getNome() {
        return $this->nome;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function __construct($nome, $matricula) {
        $this->nome = $nome;
        $this->matricula = $matricula;
    }

    public function pegarLivro(Livro $livro) {
        
        if ($livro->isDisponivel()) {
            $livro->setDisponivel(false); // não disponível
            echo $this->nome . " pegou o livro " . $livro->getTitulo() . ".\n";
        } else {
            echo "O livro " . $livro->getTitulo() . " não está disponível.\n";
        }
    }
}

class Livro {
    
    private $titulo;
    private $autor;
    private $disponivel;
    
    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function isDisponivel() {
        return $this->disponivel;
    }

    public function setDisponivel($disponivel) {
        $this->disponivel = $disponivel;
    }
    
    public function __construct($titulo, $autor, $disponivel = true) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->disponivel = $disponivel;
    }

    //empréstimo
    public function emprestar() {
        $this->disponivel = false;
    }

    public function devolver() {
        $this->disponivel = true;
    }
}

class ContaBancaria {
    private $titular;
    private $saldo;

    public function __construct($titular, $saldo = 0) {
        $this->titular = $titular;
        $this->saldo = $saldo;
    }
    public function depositar($valor) {
        if ($valor > 0) {
            $this->saldo += $valor;
        }
    }
    public function sacar($valor) {
        if ($valor > 0 && $valor <= $this->saldo) {
            $this->saldo -= $valor;
        }
    }
    public function getTitular() {
        return $this->titular;
    }
    public function getSaldo() {
        return $this->saldo;
    }
}


$livro = new Livro("A Hora da Estrela", "Clarice Lispector <br>");
$aluno = new Aluno("Joana", "2023300828");
$conta = new ContaBancaria("Joana", 1000);
$aluno->pegarLivro($livro);
$conta->depositar(500);
echo "Saldo atual: " . $conta->getSaldo() . "<br>";

$livro = new Livro("Torto Arado", "Itamar Vieira Junior <br>");
$aluno = new Aluno("Miguel", "2023307013");
$conta = new ContaBancaria("Miguel", 450);
$aluno->pegarLivro($livro);
$conta->depositar(210);
echo "Saldo atual: " . $conta->getSaldo() . "<br>";

$livro = new Livro("O Vilarejo", "Raphael Montes <br>");
$aluno = new Aluno("Pedro ", "2023301872");
$conta = new ContaBancaria("Pedro", 700);
$aluno->pegarLivro($livro);
$conta->depositar(45);
echo "Saldo atual: " . $conta->getSaldo() . "<br>";


?>



