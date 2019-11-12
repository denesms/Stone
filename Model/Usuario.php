<?php

class Usuario {
    
// Variaveis do Tipo Privado
    private $idusuario;
    private $nome;
    private $cpf;
    private $rg;
    private $login;
    private $senha;
    private $email;
    private $telefone;
    private $cidade;
    private $estado;
    private $permissao;
    private $fotoperfil;

    // Construtor da Classe
    public function Usuario($idusuario, $nome, $cpf, $rg, $login, $senha, $email, $telefone, $cidade, $estado, $permissao,$fotoperfil) {
        $this->idusuario = $idusuario;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->login = $login;
        $this->senha = $senha;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->permissao = $permissao;
        $this->fotoperfil = $fotoperfil;
    }

//=============== Métodos Acessores GET & SET ===============      
    function getIdusuario() {
        return $this->idusuario;
    }

    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getRg() {
        return $this->rg;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

    function getPermissao() {
        return $this->permissao;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setPermissao($permissao) {
        $this->permissao = $permissao;
    }

    function getFotoperfil() {
        return $this->fotoperfil;
    }

    function setFotoperfil($fotoperfil) {
        $this->fotoperfil = $fotoperfil;
    }



}
