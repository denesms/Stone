<?php

class Matricula {

    // Variaveis do tipo privado
    private $idmatricula;
    private $notas;
    private $ultimoslide;
    private $ultimocapitulo;
    private $ultimasecao;
    private $idturma;
    private $idaluno;
    private $nomeAluno;
    private $nomecurso;
    

    
    // Construtor da classe
    function __construct($idmatricula, $notas, $ultimoslide, $ultimocapitulo, $ultimasecao, $idturma, $idaluno, $nomeAluno, $nomecurso) {
        $this->idmatricula = $idmatricula;
        $this->notas = $notas;
        $this->ultimoslide = $ultimoslide;
        $this->ultimocapitulo = $ultimocapitulo;
        $this->ultimasecao = $ultimasecao;
        $this->idturma = $idturma;
        $this->idaluno = $idaluno;
        $this->nomeAluno = $nomeAluno;
        $this->nomecurso = $nomecurso;
    }

   
    
//=============== Métodos Acessores GET & SET ===============      
    function getIdmatricula() {
        return $this->idmatricula;
    }

    function getNotas() {
        return $this->notas;
    }

    function getUltimoslide() {
        return $this->ultimoslide;
    }

    function getUltimocapitulo() {
        return $this->ultimocapitulo;
    }

    function getUltimasecao() {
        return $this->ultimasecao;
    }

    function getIdturma() {
        return $this->idturma;
    }

    function getIdaluno() {
        return $this->idaluno;
    }

    function getNomeAluno() {
        return $this->nomeAluno;
    }

    function getNomecurso() {
        return $this->nomecurso;
    }

    function setIdmatricula($idmatricula) {
        $this->idmatricula = $idmatricula;
    }

    function setNotas($notas) {
        $this->notas = $notas;
    }

    function setUltimoslide($ultimoslide) {
        $this->ultimoslide = $ultimoslide;
    }

    function setUltimocapitulo($ultimocapitulo) {
        $this->ultimocapitulo = $ultimocapitulo;
    }

    function setUltimasecao($ultimasecao) {
        $this->ultimasecao = $ultimasecao;
    }

    function setIdturma($idturma) {
        $this->idturma = $idturma;
    }

    function setIdaluno($idaluno) {
        $this->idaluno = $idaluno;
    }

    function setNomeAluno($nomeAluno) {
        $this->nomeAluno = $nomeAluno;
    }

    function setNomecurso($nomecurso) {
        $this->nomecurso = $nomecurso;
    }






}
