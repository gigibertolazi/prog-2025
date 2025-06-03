<?php

class contaBanco{
    public $titular;
    protected $saldo;
    private $senha;

    public function __construct($titular, $senha, $saldo_inicial = 0) {
        $this-> titular = $titular;
        $this-> senha = $senha;
        $this-> saldo = $saldo_inicial;
    }

    public function depositar($valor) {
        if ($valor > 0) {
            $this-> saldo += $valor;
            echo "Depósito de R$ " . number_format($valor, 2, ',', '.') . " realizado com sucesso.<br>";
        } else {
            echo "Valor de depósito inválido.<br>";
        }
    }

    public function sacar($valor, $senha) {
        if ($senha !== $this-> senha) {
            echo "Senha incorreta. Saque não autorizado.<br>";
            return;
        }
        if ($valor <= 0) {
            echo "Valor de saque inválido.<br>";
            return;
        }
        if ($valor > $this-> saldo) {
            echo "Saldo insuficiente para saque de R$ " . number_format($valor, 2, ',', '.') . ".<br>";
            return;
        }
        $this-> saldo -= $valor;
        echo "Saque de R$ " . number_format($valor, 2, ',', '.') . " realizado com sucesso.<br>";
    }

    public function verSaldo($senha) {
        if ($senha === $this-> senha) {
            echo "Saldo atual: R$ " . number_format($this-> saldo, 2, ',', '.') . "<br>";
        } else {
            echo "Senha incorreta. Acesso negado.<br>";
        }
    }
}

//simulação
$conta = new contaBanco("João Silva", "1234", 1000);


$conta-> depositar(500);


$conta-> sacar(300, "1234");

//saque com senha incorreta
$conta-> sacar(100, "0000");

?>

