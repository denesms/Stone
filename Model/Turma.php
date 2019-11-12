<?php

class Turma {
    
  // Variaveis do Tipo Privado  
  private $idturma;
  private $datainicio;
  private $datafinal;
  private $idcurso;
  private $idprofessor1;
  private $idprofessor2;
  private $nomecurso;
  private $nomeprofessor1;
  private $nomeprofessor2;
  private $Tdescricao;
  
  
  // Construtor da Classe
  public function Turma($idturma, $datainicio, $datafinal, $idcurso,$nomecurso, $idprofessor1,$nomeprofessor1, $idprofessor2, $nomeprofessor2, $descricao) {
      
      $this->idturma = $idturma;
      $this->datainicio = $datainicio;
      $this->datafinal = $datafinal;
      $this->idcurso = $idcurso;
      $this->idprofessor1 = $idprofessor1;
      $this->idprofessor2 = $idprofessor2;
      $this->nomecurso = $nomecurso;
      $this->nomeprofessor1 = $nomeprofessor1;
      $this->nomeprofessor2 = $nomeprofessor2;
      $this->Tdescricao = $descricao;
         
  }
  
  
  
  
//=============== Métodos Acessores GET & SET ===============  
  
  
    function getTdescricao() {
        return $this->Tdescricao;
    }

    function setTdescricao($Tdescricao) {
        $this->Tdescricao = $Tdescricao;
    }

      
  function getIdturma() {
      return $this->idturma;
  }

  function getDatainicio() {
      return $this->datainicio;
  }

  function getDatafinal() {
      return $this->datafinal;
  }

  function getIdcurso() {
      return $this->idcurso;
  }

  function getIdprofessor1() {
      return $this->idprofessor1;
  }

  function getIdprofessor2() {
      return $this->idprofessor2;
  }

  function getNomecurso() {
      return $this->nomecurso;
  }

  function getNomeprofessor1() {
      return $this->nomeprofessor1;
  }

  function getNomeprofessor2() {
      return $this->nomeprofessor2;
  }

  function setIdturma($idturma) {
      $this->idturma = $idturma;
  }

  function setDatainicio($datainicio) {
      $this->datainicio = $datainicio;
  }

  function setDatafinal($datafinal) {
      $this->datafinal = $datafinal;
  }

  function setIdcurso($idcurso) {
      $this->idcurso = $idcurso;
  }

  function setIdprofessor1($idprofessor1) {
      $this->idprofessor1 = $idprofessor1;
  }

  function setIdprofessor2($idprofessor2) {
      $this->idprofessor2 = $idprofessor2;
  }

  function setNomecurso($nomecurso) {
      $this->nomecurso = $nomecurso;
  }

  function setNomeprofessor1($nomeprofessor1) {
      $this->nomeprofessor1 = $nomeprofessor1;
  }

  function setNomeprofessor2($nomeprofessor2) {
      $this->nomeprofessor2 = $nomeprofessor2;
  }

}
