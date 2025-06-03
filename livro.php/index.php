<?php

class Livro {
    public $titulo;
    public $autor;
    private $preco;
    protected $estoque;

    public function __construct($titulo, $autor, $preco, $estoque) {
        $this-> titulo = $titulo;
        $this-> autor = $autor;
        $this-> setPreco($preco);
        $this-> estoque = $estoque;
    }

    public function getPreco() {
        return $this-> preco;
    }

    public function setPreco($valor) {
        if ($valor >= 0) {
            $this-> preco = $valor;
        } else {
            throw new Exception("O preço não pode ser negativo.");
        }
    }

    protected function adicionarEstoque($quantidade) {
        if ($quantidade > 0) {
            $this-> estoque += $quantidade;
        } else {
            throw new Exception("A quantidade a ser adicionada deve ser positiva.");
        }
    }
}

class LivroFisico extends Livro {
    public function aumentarEstoque($quantidade) {
        $this-> adicionarEstoque($quantidade);
    }
}


try {
    $livro = new LivroFisico("De Lukov, com amor", "Mariana Zapata", 39.90, 10);
    echo "Título: " . $livro-> titulo . "<br>";
    echo "Autor: " . $livro-> autor . "<br>";
    echo "Preço: R$ " . $livro-> getPreco() . "<br>";
    
   
    $livro-> aumentarEstoque(5);
    
} catch (Exception $e) {
    echo "Erro: " . $e-> getMessage();
}
?>

