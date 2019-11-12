<?php

class Curso {

    // Variaveis do tipo privado
    private $id;
    private $nome;
    private $descricao;
    private $cargaHoraria;
    private $turma;

    // Construtor da classe
    public function Curso($id, $nome, $descricao, $cargaHoraria) {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->cargaHoraria = $cargaHoraria;
    }

    public function Curso2($id, $nome, $descricao, $cargaHoraria, $turma) {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->cargaHoraria = $cargaHoraria;
        $this->cargaHoraria = $turma;
    }

//=============== Métodos Acessores GET & SET ===============     

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getCargaHoraria() {
        return $this->cargaHoraria;
    }

    function getTurma() {
        return $this->turma;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setCargaHoraria($cargaHoraria) {
        $this->cargaHoraria = $cargaHoraria;
    }

    function setTurma($turma) {
        $this->turma = $turma;
    }




  

}

?>