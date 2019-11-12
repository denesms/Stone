<?php

class questoes {

    // Variaveis do tipo privado
    private $idq;
    private $pergunta;
    private $ra;
    private $rb;
    private $rc;
    private $rd;
    private $va;
    private $vb;
    private $vc;
    private $vd;
    private $idcurso;
    
    // Construtor da classe
    function __construct($idq, $pergunta, $ra, $rb, $rc, $rd, $va, $vb, $vc, $vd, $idcurso) {
        $this->idq = $idq;
        $this->pergunta = $pergunta;
        $this->ra = $ra;
        $this->rb = $rb;
        $this->rc = $rc;
        $this->rd = $rd;
        $this->va = $va;
        $this->vb = $vb;
        $this->vc = $vc;
        $this->vd = $vd;
        $this->idcurso = $idcurso;
    }



//=============== Métodos Acessores GET & SET ===============     
    function getIdq() {
        return $this->idq;
    }

    function getPergunta() {
        return $this->pergunta;
    }

    function getRa() {
        return $this->ra;
    }

    function getRb() {
        return $this->rb;
    }

    function getRc() {
        return $this->rc;
    }

    function getRd() {
        return $this->rd;
    }

    function getVa() {
        return $this->va;
    }

    function getVb() {
        return $this->vb;
    }

    function getVc() {
        return $this->vc;
    }

    function getVd() {
        return $this->vd;
    }

    function getIdcurso() {
        return $this->idcurso;
    }

    function setIdq($idq) {
        $this->idq = $idq;
    }

    function setPergunta($pergunta) {
        $this->pergunta = $pergunta;
    }

    function setRa($ra) {
        $this->ra = $ra;
    }

    function setRb($rb) {
        $this->rb = $rb;
    }

    function setRc($rc) {
        $this->rc = $rc;
    }

    function setRd($rd) {
        $this->rd = $rd;
    }

    function setVa($va) {
        $this->va = $va;
    }

    function setVb($vb) {
        $this->vb = $vb;
    }

    function setVc($vc) {
        $this->vc = $vc;
    }

    function setVd($vd) {
        $this->vd = $vd;
    }

    function setIdcurso($idcurso) {
        $this->idcurso = $idcurso;
    }





}
