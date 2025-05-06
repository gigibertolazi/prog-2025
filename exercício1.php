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
            echo $this -> nome . ", " . $this -> preco . ", " . $this -> qtd . ".";
        }
        
    }

    $produto1 = new Produto();

    $produto1->nome = "Nome: Lápis";
    $produto1->preco = "Preço: R$1,50";
    $produto1->qtd = "Quantidade: 1 unidade";
    

    $produto1->exibeInfo();
    
    
    ?>
    
</body>
</html>