<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classe básica</title>
    <style>
        *{
            text-align:center;
        }
    </style>
</head>
<body>
    <h1>Produtos</h1>
    
    <?php
    class Produto{
        public $nome;
        public $preco;
        public $qtd;

        public function exibeInfo(){
            echo "Nome: " . $this -> nome . ", ". "Preço: " . $this -> preco . ", " . "Quantidade: " . $this -> qtd;
        }
        
    }

    function mostrarMediaPrecos($produto1, $produto2) {
        $media = ($produto1->preco + $produto2->preco) / 2;
        echo "<br><br> A média dos preços dos produtos é: " . $media;
    }

    $produto1 = new Produto();

    $produto1->nome = "Lápis: ";
    $produto1->preco = 1.50; //armazenado sem formatação de preço para facilitar na operação de média
    $produto1->qtd = "1 unidade <br>";

    //Novo produto

    $produto2 = new Produto();

    $produto2->nome = "Jaqueta jeans: ";
    $produto2->preco = 129.20;
    $produto2->qtd = "2 unidades";
    

    $produto1->exibeInfo();
    $produto2->exibeInfo();

    mostrarMediaPrecos($produto1, $produto2);

    
    
    
    ?>
    
</body>
</html>