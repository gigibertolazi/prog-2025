<?php

// exercício 1
class livro {
    private $titulo;
    private $autor;
    private $anoPublicacao;
    private $disponivel;

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function getAnoPublicacao() {
        return $this->anoPublicacao;
    }

    public function setAnoPublicacao($anoPublicacao) {
        $this->anoPublicacao = $anoPublicacao;
    }

    public function getDisponivel() {
        return $this->disponivel;
    }

    public function setDisponivel($disponivel) {
        $this->disponivel = $disponivel;
    }

    public function __construct($titulo, $autor, $anoPublicacao) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->anoPublicacao = $anoPublicacao;
        $this->disponivel = true; 
    }

    public function exibirInformacoes() {
        echo "Título: " . $this->titulo . "<br>";
        echo "Autor: " . $this->autor . "<br>";
        echo "Ano de Publicação: " . $this->anoPublicacao . "<br>";
        echo "Disponível: " . ($this->disponivel ? "Sim" : "Não") . "<br>";
    }

    // exercício 2
    public function emprestar($nomeLeitor) {
        if ($this->disponivel) {
            $this->disponivel = false;
            $this->leitorAtual = $nomeLeitor; // exercício 4
            echo "Livro '" . $this->titulo . "' emprestado para " . $nomeLeitor . ".<br>";
        } else {
            echo "Livro '" . $this->titulo . "' não está disponível para empréstimo.<br>";
        }
    }

    public function devolver() {
        $this->disponivel = true;
        $this->leitorAtual = null; 
        echo "Livro '" . $this->titulo . "' devolvido.<br>";
    }

    public function estaDisponivel() {
        return $this->disponivel ? "O livro '" . $this->titulo . "' está disponível para empréstimo." : "O livro '" . $this->titulo . "' não está disponível para empréstimo.";
    }


    protected $leitorAtual; 

    public function quemPegou() {
        return $this->leitorAtual;
    }
}

// exercício 3 
class leitor {
    private $nome;
    private $email;
    private $telefone;

    public function __construct($nome, $email, $telefone) {
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function exibirLeitor() {
        echo "Nome: " . $this->nome . "<br>";
        echo "Email: " . $this->email . "<br>";
        echo "Telefone: " . $this->telefone . "<br>";
    }
}

// exercício 5 
class biblioteca {
    public $nomeBiblioteca;
    private $livros = [];
    private $leitores = [];

    public function __construct($nomeBiblioteca) {
        $this->nomeBiblioteca = $nomeBiblioteca;
    }

    public function adicionarLivro(Livro $livro) {
        $this->livros[] = $livro;
    }

    public function adicionarLeitor(Leitor $leitor) {
        $this->leitores[] = $leitor;
    }

    public function listarLivros() {
        echo "Livros na biblioteca '" . $this->nomeBiblioteca . "':<br>";
        foreach ($this->livros as $livro) {
            $livro->exibirInformacoes();
            echo "<br>";
        }
    }

    public function listarLeitores() {
        echo "Leitores da biblioteca '" . $this->nomeBiblioteca . "':<br>";
        foreach ($this->leitores as $leitor) {
            $leitor->exibirLeitor();
            echo "<br>";
        }
    }
}

// cenários


$livro1 = new livro("Noites Brancas", "Fiódor Dostoiévski", 1848);
$livro2 = new livro("O Cortiço", "Aluísio Azevedo", 1890);

echo $livro1->estaDisponivel() . "<br>";
$livro1->emprestar("João");
echo $livro1->estaDisponivel() . "<br>";
$livro1->devolver();
echo $livro1->estaDisponivel() . "<br>";


$leitor1 = new leitor("Maria", "maria@example.com", "1234-5678");
echo "<br>Dados do Leitor:<br>";
$leitor1->exibirLeitor();


echo "<br>Empréstimo e Devolução:<br>";
$livro2->emprestar("Ana");
echo "Quem pegou '" . $livro2->getTitulo() . "': " . $livro2->quemPegou() . "<br>";
$livro2->devolver();
echo "Quem pegou '" . $livro2->getTitulo() . "': " . $livro2->quemPegou() . "<br>";


$biblioteca = new biblioteca("Biblioteca Gibs");

$biblioteca->adicionarLivro($livro1);
$biblioteca->adicionarLivro($livro2);
$biblioteca->adicionarLivro(new livro("A Metamorfose", "Franz Kafka", 1915));

$biblioteca->adicionarLeitor($leitor1);
$biblioteca->adicionarLeitor(new leitor("Júlia", "julia@example.com", "9475-2432"));

echo "<br>";
$biblioteca->listarLivros();
echo "<br>";
$biblioteca->listarLeitores();

?>
