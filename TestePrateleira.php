<?php

require_once 'Prateleira.php';
require_once 'Produto.php';

class TestePrateleira {
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

        
        $produtosEsperados = array(
            "Arroz", "Feijão", "Macarrão", "Óleo de Soja", "Leite",
            "Café", "Açúcar", "Sal", "Farinha de Trigo", "Chocolate"
        );

        
        $produtos = $prateleira->listarProdutos();

        
        $produtosDisponiveis = array();

        
        echo "Produtos disponíveis na prateleira:<br>";
        foreach ($produtos as $item) {
            $produto = $item['produto'];
            $nomeProduto = $produto->getNome();
            $quantidade = $prateleira->getQuantidade($nomeProduto);
            echo "Nome: $nomeProduto - Quantidade: $quantidade - Preço: R$ " . number_format($produto->getPreco(), 2, ',', '.') . "<br>";
            $produtosDisponiveis[] = $nomeProduto; 
        }

        
        echo "<br>Produtos em falta na prateleira:<br>";
        $produtosEmFalta = array_diff($produtosEsperados, $produtosDisponiveis);
        if (empty($produtosEmFalta)) {
            echo "Todos os produtos estão disponíveis na prateleira.<br>";
        } else {
            foreach ($produtosEmFalta as $produtoFaltando) {
                echo "$produtoFaltando<br>";
            }
        }
    }
}


TestePrateleira::testar();

?>

