<?php

class Conteudo {

    // Variaveis do tipo privado
    private $idconteudo;
    private $ordem;
    private $texto;
    private $imagem;
    private $video;
    private $idcurso;
    private $capitulo;
    private $secao;
    private $nomecurso;
    private $titulo;

    // Construtor da classe
    public function Conteudo($idconteudo, $ordem, $texto, $imagem, $video, $idcurso, $capitulo, $secao, $nomecurso, $titulo) {

        $this->idconteudo = $idconteudo;
        $this->ordem = $ordem;
        $this->texto = $texto;
        $this->imagem = $imagem;
        $this->video = $video;
        $this->idcurso = $idcurso;
        $this->capitulo = $capitulo;
        $this->secao = $secao;
        $this->nomecurso = $nomecurso;
        $this->titulo = $titulo;
    }

//=============== Métodos Acessores GET & SET ===============     

    function getIdconteudo() {
        return $this->idconteudo;
    }

    function getOrdem() {
        return $this->ordem;
    }

    function getTexto() {
        return $this->texto;
    }

    function getImagem() {
        return $this->imagem;
    }

    function getVideo() {
        return $this->video;
    }

    function getIdcurso() {
        return $this->idcurso;
    }

    function getCapitulo() {
        return $this->capitulo;
    }

    function getSecao() {
        return $this->secao;
    }

    function getNomecurso() {
        return $this->nomecurso;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setIdconteudo($idconteudo) {
        $this->idconteudo = $idconteudo;
    }

    function setOrdem($ordem) {
        $this->ordem = $ordem;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function setVideo($video) {
        $this->video = $video;
    }

    function setIdcurso($idcurso) {
        $this->idcurso = $idcurso;
    }

    function setCapitulo($capitulo) {
        $this->capitulo = $capitulo;
    }

    function setSecao($secao) {
        $this->secao = $secao;
    }

    function set($nomecurso) {
        $this->nomecurso = $nomecurso;
    }

}
