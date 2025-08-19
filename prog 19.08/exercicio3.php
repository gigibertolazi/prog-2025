<?php
class Ingresso {
    protected float $valor;

    public function __construct(float $valor) {
        $this->valor = $valor;
    }

    public function imprimeValor() {
        echo "Valor do ingresso: R$ " . number_format($this->valor, 2, ',', '.') . "\n";
    }
}


class Normal extends Ingresso {
    public function tipoIngresso() {
        echo "Ingresso normal\n";
    }
}


class VIP extends Ingresso {
    protected float $valorAdicional;

    public function __construct(float $valor, float $valorAdicional) {
        parent::__construct($valor);
        $this->valorAdicional = $valorAdicional;
    }

    public function getValorVIP(): float {
        return $this->valor + $this->valorAdicional;
    }

    public function imprimeValor() {
        echo "Valor do VIP: R$ " . number_format($this->getValorVIP(), 2, ',', '.') . "\n";
    }
}


class CamaroteInferior extends VIP {
    private string $localizacao;

    public function __construct(float $valor, float $valorAdicional, string $localizacao) {
        parent::__construct($valor, $valorAdicional);
        $this->localizacao = $localizacao;
    }

    public function getLocalizacao(): string {
        return $this->localizacao;
    }

    public function imprimeLocalizacao() {
        echo "Localização do camarote inferior: {$this->localizacao}\n";
    }
}


class CamaroteSuperior extends VIP {
    private float $valorAdicionalExtra;

    public function __construct(float $valor, float $valorAdicional, float $valorAdicionalExtra) {
        parent::__construct($valor, $valorAdicional);
        $this->valorAdicionalExtra = $valorAdicionalExtra;
    }

    public function getValorCamaroteSuperior(): float {
        return $this->getValorVIP() + $this->valorAdicionalExtra;
    }

    public function imprimeValor() {
        echo "Valor do ingresso Camarote Superior: R$ " . number_format($this->getValorCamaroteSuperior(), 2, ',', '.') . "\n";
    }
}



echo " TESTE INGRESSO NORMAL \n";
$normal = new Normal(30.00);
$normal->tipoIngresso();
$normal->imprimeValor();

echo "\n TESTE INGRESSO VIP \n";
$vip = new VIP(45.00, 30.00);
$vip->imprimeValor();

echo "\n TESTE CAMAROTE INFERIOR \n";
$camaroteInferior = new CamaroteInferior(95.00, 80.00, "Setor A - Fila 4");
$camaroteInferior->imprimeValor();
$camaroteInferior->imprimeLocalizacao();

echo "\n TESTE CAMAROTE SUPERIOR \n";
$camaroteSuperior = new CamaroteSuperior(115.00, 125.00, 145.00);
$camaroteSuperior->imprimeValor();
?>