<?php 
class Imovel {

    protected float $preco;
    protected string $endereco;
    
    public function __construct(string $endereco, float $preco) {
        $this->endereco = $endereco;
        $this->preco = $preco;
    }

    public function getEndereco(): string {
        return $this->endereco;
    }

    public function getPreco(): float {
        return $this->preco;
    }

    public function imprimeDados() {
        echo "Endereço: {$this->endereco}\n";
        echo "Preço normal: R$ " . number_format($this->preco, 2, ',', '.') . "\n";
    }
}


class Novo extends Imovel {
    private float $adicional;

    public function __construct(string $endereco, float $preco, float $adicional) {
        parent::__construct($endereco, $preco);
        $this->adicional = $adicional;
    }

    public function getAdicional(): float {
        return $this->adicional;
    }

    public function imprimeAdicional() {
        echo "Adicional por ser novo: R$ " . number_format($this->adicional, 2, ',', '.') . "\n";
    }

    public function getPrecoFinal(): float {
        return $this->preco + $this->adicional;
    }

    public function imprimeDados() {
        parent::imprimeDados();
        $this->imprimeAdicional();
        echo "Preço final: R$ " . number_format($this->getPrecoFinal(), 2, ',', '.') . "\n";
    }
}


class Velho extends Imovel {
    private float $desconto;

    public function __construct(string $endereco, float $preco, float $desconto) {
        parent::__construct($endereco, $preco);
        $this->desconto = $desconto;
    }

    public function getDesconto(): float {
        return $this->desconto;
    }

    public function imprimeDesconto() {
        echo "Desconto por ser velho: R$ " . number_format($this->desconto, 2, ',', '.') . "\n";
    }

    public function getPrecoFinal(): float {
        return $this->preco - $this->desconto;
    }

    public function imprimeDados() {
        parent::imprimeDados();
        $this->imprimeDesconto();
        echo "Preço final: R$ " . number_format($this->getPrecoFinal(), 2, ',', '.') . "\n";
    }
}



echo " IMÓVEL NOVO \n";
$novo = new Novo("Rua Frei Caneca, 1086", 320000.00, 34000.00);
$novo->imprimeDados();

echo "\n IMÓVEL VELHO \n";
$velho = new Velho("Av. Leonel Brizola, 636", 300000.00, 30000.00);
$velho->imprimeDados();
?>