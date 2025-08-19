<?php 
class Funcionario {
    protected string $nome;
    protected float $salario;

    public function __construct(string $nome, float $salario) {
        $this->nome = $nome;
        $this->salario = $salario;
    }

    public function getNome(): string {
        return $this->nome;
    }
}

class Assistente extends Funcionario {
    protected string $matricula;

    public function __construct(string $nome, float $salario, string $matricula) {
        parent::__construct($nome, $salario);
        $this->matricula = $matricula;
    }

    public function getMatricula(): string {
        return $this->matricula;
    }
}

class Tecnico extends Assistente {}

class Administrativo extends Assistente {}

class Animal {
    protected string $nome;
    protected string $raca;

    public function __construct(string $nome, string $raca) {
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

class Pessoa {
    protected string $nome;
    protected int $idade;

    public function __construct(string $nome, int $idade) {
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

class Ingresso {
    protected float $valor;
    public function __construct(float $valor) {
        $this->valor = $valor;
    }

    public function imprimeValor() {
        echo "Valor: R$ " . number_format($this->valor, 2, ',', '.') . "\n";
    }
}

class Normal extends Ingresso {
    public function tipoIngresso() {
        echo "Ingresso normal\n";
    }
}

class VIP extends Ingresso {
    protected float $adicional;
    public function __construct(float $valor, float $adicional) {
        parent::__construct($valor);
        $this->adicional = $adicional;
    }

    public function getValorVIP() {
        return $this->valor + $this->adicional;
    }

    public function imprimeValor() {
        echo "Valor VIP: R$ " . number_format($this->getValorVIP(), 2, ',', '.') . "\n";
    }
}

class CamaroteInferior extends VIP {
    private string $localizacao;

    public function __construct(float $valor, float $adicional, string $localizacao) {
        parent::__construct($valor, $adicional);
        $this->localizacao = $localizacao;
    }

    public function imprimeLocalizacao() {
        echo "Local: {$this->localizacao}\n";
    }
}

class CamaroteSuperior extends VIP {
    private float $extra;

    public function __construct(float $valor, float $adicional, float $extra) {
        parent::__construct($valor, $adicional);
        $this->extra = $extra;
    }

    public function getValorTotal() {
        return $this->getValorVIP() + $this->extra;
    }

    public function imprimeValor() {
        echo "Valor camarote superior: R$ " . number_format($this->getValorTotal(), 2, ',', '.') . "\n";
    }
}

class Imovel {
    protected string $endereco;
    protected float $preco;

    public function __construct(string $endereco, float $preco) {
        $this->endereco = $endereco;
        $this->preco = $preco;
    }
}

class Novo extends Imovel {
    private float $adicional;
    public function __construct(string $endereco, float $preco, float $adicional) {
        parent::__construct($endereco, $preco);
        $this->adicional = $adicional;
    }

    public function precoFinal(): float {
        return $this->preco + $this->adicional;
    }
}

class Velho extends Imovel {
    private float $desconto;
    public function __construct(string $endereco, float $preco, float $desconto) {
        parent::__construct($endereco, $preco);
        $this->desconto = $desconto;
    }

    public function precoFinal(): float {
        return $this->preco - $this->desconto;
    }
}



echo " a) Assistente Administrativo e Técnico \n";
$admin = new Administrativo("Giovana Bertolazi", 3000, "A456");
$tecnico = new Tecnico("Laís Caetano", 3200, "T538");
echo "Administrativo - Nome: {$admin->getNome()}, Matrícula: {$admin->getMatricula()}\n";
echo "Técnico - Nome: {$tecnico->getNome()}, Matrícula: {$tecnico->getMatricula()}\n";

echo "\n b) Cachorro e Gato \n";
$dog = new Cachorro("Luna", "Golden Retriver");
$cat = new Gato("Sam", "Frajola");
echo $dog->late() . "\n";
echo $dog->caminha() . "\n";
echo $cat->mia() . "\n";
echo $cat->caminha() . "\n";

echo "\n c) Rica, Pobre e Miserável \n";
$rica = new Rica("Ana Júlia", 27, 100000);
$pobre = new Pobre("Bernardo", 23);
$miseravel = new Miseravel("João", 43);
echo $rica->fazCompras() . "\n";
echo $pobre->trabalha() . "\n";
echo $miseravel->mendiga() . "\n";

echo "\n d) Ingresso \n";
$tipoIngresso = readline("Digite 1 para Normal ou 2 para VIP: ");

if ($tipoIngresso == 1) {
    $ingresso = new Normal(50);
    $ingresso->tipoIngresso();
    $ingresso->imprimeValor();
} elseif ($tipoIngresso == 2) {
    $tipoVip = readline("Digite 1 para Camarote Superior ou 2 para Camarote Inferior: ");
    if ($tipoVip == 1) {
        $vip = new CamaroteSuperior(50, 30, 20);
        echo "Ingresso VIP - Camarote Superior\n";
        $vip->imprimeValor();
    } elseif ($tipoVip == 2) {
        $vip = new CamaroteInferior(50, 30, "Setor A");
        echo "Ingresso VIP - Camarote Inferior\n";
        $vip->imprimeValor();
        $vip->imprimeLocalizacao();
    } else {
        echo "Opção inválida para VIP.\n";
    }
} else {
    echo "Opção inválida.\n";
}

echo "\n e) Imóvel \n";
$tipoImovel = readline("Digite 1 para Imóvel Novo ou 2 para Imóvel Velho: ");
if ($tipoImovel == 1) {
    $novo = new Novo("Rua Frei Caneca, 1086", 300000, 25000);
    echo "Imóvel Novo - Preço final: R$ " . number_format($novo->precoFinal(), 2, ',', '.') . "\n";
} elseif ($tipoImovel == 2) {
    $velho = new Velho("Av. Leonel Brizola, 636", 300000, 15000);
    echo "Imóvel Velho - Preço final: R$ " . number_format($velho->precoFinal(), 2, ',', '.') . "\n";
} 

?>
