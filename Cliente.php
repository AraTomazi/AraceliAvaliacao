<?php

class Cliente {
    private $nome;
    private $cpf;
    private $telefone;
    private $endereco;
    private $email;

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function comprar($produto) {
        echo $this->nome . " de CPF " . $this->cpf . " acabou de comprar o produto: " . $produto->getNome();
        echo "<br>";
    }
}

?>
