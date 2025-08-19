<?php
class Animal {
    protected string $nome;
    protected string $raca;

    public function __construct(string $nome = "", string $raca = "") {
        $this->nome = $nome;
        $this->raca = $raca;
    }

    public function caminha(): string {
        return "{$this->nome} está caminhando.";
    }
}

class Cachorro extends Animal {
    public function late(): string {
        return "{$this->nome} está latindo: au au!";
    }
}

class Gato extends Animal {
    public function mia(): string {
        return "{$this->nome} está miando: miau!";
    }
}


echo " TESTE ANIMAL \n";
$dog = new Cachorro("Luna", "Golden Retriver");
echo $dog->caminha() . "\n";
echo $dog->late() . "\n";

$cat = new Gato("Sam", "Frajola");
echo $cat->caminha() . "\n";
echo $cat->mia() . "\n";


class Pessoa {
    protected string $nome;
    protected int $idade;

    public function __construct(string $nome = "", int $idade = 0) {
        $this->nome = $nome;
        $this->idade = $idade;
    }
}

class Rica extends Pessoa {
    private float $dinheiro;

    public function __construct(string $nome, int $idade, float $dinheiro) {
        parent::__construct($nome, $idade);
        $this->dinheiro = $dinheiro;
    }

    public function fazCompras(): string {
        return "{$this->nome} está fazendo compras com R$ {$this->dinheiro}.";
    }
}

class Pobre extends Pessoa {
    public function trabalha(): string {
        return "{$this->nome} está trabalhando.";
    }
}

class Miseravel extends Pessoa {
    public function mendiga(): string {
        return "{$this->nome} está mendigando.";
    }
}


echo "\n TESTE PESSOAS \n";
$rica = new Rica("Laís", 23, 1460);
echo $rica->fazCompras() . "\n";

$pobre = new Pobre("Giovana", 22);
echo $pobre->trabalha() . "\n";

$miseravel = new Miseravel("Adriadine", 19);
echo $miseravel->mendiga() . "\n";
?>