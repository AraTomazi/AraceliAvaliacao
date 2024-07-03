<?php

require_once 'Produto.php';

class Prateleira {
    private $produtos;

    public function __construct() {
        $this->produtos = array();
    }

    public function adiciona(Produto $produto) {
        $nomeProduto = $produto->getNome();

        if (isset($this->produtos[$nomeProduto])) {
            $this->produtos[$nomeProduto]['quantidade']++;
        } else {
            $this->produtos[$nomeProduto] = array(
                'produto' => $produto,
                'quantidade' => 1
            );
        }
    }

    public function listarProdutos() {
        return array_values($this->produtos); 
    }

    public function getQuantidade($nomeProduto) {
        if (isset($this->produtos[$nomeProduto])) {
            return $this->produtos[$nomeProduto]['quantidade'];
        } else {
            return 0;
        }
    }

    public function getProduto($indice) {
        $produtos = array_values($this->produtos); 
        return isset($produtos[$indice]) ? $produtos[$indice]['produto'] : null;
    }
}

?>
