<?php

require_once 'Prateleira.php';
require_once 'Produto.php';

class TesteProduto {
    public static function testar() {
        
        $prateleira = new Prateleira();

       
        $prateleira->adiciona(new Produto("Arroz", 10.50));
        $prateleira->adiciona(new Produto("Feijão", 8.75));
        $prateleira->adiciona(new Produto("Macarrão", 4.25));
        $prateleira->adiciona(new Produto("Óleo de Soja", 6.90));
        $prateleira->adiciona(new Produto("Leite", 3.50));
        $prateleira->adiciona(new Produto("Café", 12.00));
        $prateleira->adiciona(new Produto("Açúcar", 5.20));
        $prateleira->adiciona(new Produto("Sal", 2.00));
        $prateleira->adiciona(new Produto("Farinha de Trigo", 3.80));
        $prateleira->adiciona(new Produto("Chocolate", 7.50));

        
        $produtos = $prateleira->listarProdutos();

        
        echo "Produtos disponíveis na prateleira:<br>";
        foreach ($produtos as $item) {
            $produto = $item['produto'];
            echo "Nome: " . $produto->getNome() . " - Preço: R$ " . number_format($produto->getPreco(), 2, ',', '.') . "<br>";
        }
    }
}


TesteProduto::testar();

?>
