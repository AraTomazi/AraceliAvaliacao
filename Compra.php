<?php

require_once 'Cliente.php';
require_once 'Prateleira.php';

class Compra {
    public static function comprarProduto(Cliente $cliente, Prateleira $prateleira, $indiceProduto) {
        $produto = $prateleira->getProduto($indiceProduto);

        if ($produto) {
            $cliente->comprar($produto);
        } else {
            echo "Produto não encontrado na prateleira." . PHP_EOL;
        }
    }
}

?>
