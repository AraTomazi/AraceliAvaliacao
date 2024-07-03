<?php

require_once 'Cliente.php';
require_once 'Prateleira.php';
require_once 'Produto.php';
require_once 'Compra.php';

class TesteCliente {
    public static function testar() {
        $dadosClientes = array(
            array("nome" => "João", "cpf" => "123.456.789-00", "telefone" => "(11) 98765-4321", "endereco" => "Rua das Flores, 123", "email" => "joao@example.com"),
            array("nome" => "Maria", "cpf" => "987.654.321-00", "telefone" => "(21) 98765-4321", "endereco" => "Avenida Central, 456", "email" => "maria@example.com"),
            array("nome" => "Pedro", "cpf" => "456.789.123-00", "telefone" => "(31) 98765-4321", "endereco" => "Rua dos Passarinhos, 789", "email" => "pedro@example.com"),
            array("nome" => "Ana", "cpf" => "654.321.987-00", "telefone" => "(41) 98765-4321", "endereco" => "Alameda das Árvores, 987", "email" => "ana@example.com"),
            array("nome" => "Carlos", "cpf" => "789.123.456-00", "telefone" => "(51) 98765-4321", "endereco" => "Praça do Sol, 246", "email" => "carlos@example.com"),
            array("nome" => "Sônia", "cpf" => "321.654.987-00", "telefone" => "(61) 98765-4321", "endereco" => "Travessa dos Sonhos, 135", "email" => "sonia@example.com"),
            array("nome" => "Rafael", "cpf" => "234.567.890-00", "telefone" => "(71) 98765-4321", "endereco" => "Rua do Mar, 753", "email" => "rafael@example.com"),
            array("nome" => "Mariana", "cpf" => "890.123.456-00", "telefone" => "(81) 98765-4321", "endereco" => "Avenida das Flores, 531", "email" => "mariana@example.com"),
            array("nome" => "Fernando", "cpf" => "345.678.901-00", "telefone" => "(91) 98765-4321", "endereco" => "Rua do Campo, 642", "email" => "fernando@example.com"),
            array("nome" => "Camila", "cpf" => "901.234.567-00", "telefone" => "(01) 98765-4321", "endereco" => "Travessa dos Ventos, 879", "email" => "camila@example.com"),
        );

        
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

        foreach ($dadosClientes as $dados) {
            $cliente = new Cliente();
            $cliente->setNome($dados['nome']);
            $cliente->setCpf($dados['cpf']);
            $cliente->setTelefone($dados['telefone']);
            $cliente->setEndereco($dados['endereco']);
            $cliente->setEmail($dados['email']);

            $quantidadeCompras = rand(1, 2); 
            $produtosComprados = array(); 

            for ($i = 0; $i < $quantidadeCompras; $i++) {
                $indiceProduto = rand(0, count($prateleira->listarProdutos()) - 1);
                $produto = $prateleira->getProduto($indiceProduto);

                
                while (in_array($produto, $produtosComprados)) {
                    $indiceProduto = rand(0, count($prateleira->listarProdutos()) - 1);
                    $produto = $prateleira->getProduto($indiceProduto);
                }

                
                if ($produto) {
                    Compra::comprarProduto($cliente, $prateleira, $indiceProduto);
                    $produtosComprados[] = $produto;
                } else {
                    echo "Produto não encontrado na prateleira." . PHP_EOL;
                }
            }

            
            echo "Informações do Cliente após a compra:<br>";
            echo "Nome: " . $cliente->getNome() . "<br>";
            echo "CPF: " . $cliente->getCpf() . "<br>";
            echo "Telefone: " . $cliente->getTelefone() . "<br>";
            echo "Endereço: " . $cliente->getEndereco() . "<br>";
            echo "Email: " . $cliente->getEmail() . "<br>";
            echo "<hr>";
        }
    }
}


TesteCliente::testar();

?>

