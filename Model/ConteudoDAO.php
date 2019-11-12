<?php

require_once 'connection.php';
require_once 'Conteudo.php';

class ConteudoDAO {

    var $conn;

    function ConteudoDAO() {
        $database = new Connection();
        $this->conn = $database->openConnection();
    }

    /* public function Create($ordem, $texto, $imagem, $video, $curso, $secao, $capitulo) {


      $sql = "INSERT INTO conteudo (ordem,texto,imagem,video,idcurso,secao,capitulo)
      VALUES ($ordem, '$texto', '$imagem','$video',$curso,$secao,$capitulo)";

      $this->conn->exec($sql);
      } */

    //=========== Cadastro =============================
    public function Create($conteudo) {

        $sql = "INSERT INTO conteudo (ordem,texto,imagem,video,idcurso,secao,capitulo,titulo)
                VALUES ('" . $conteudo->getOrdem() . "', '" . $conteudo->getTexto() . "', '" . $conteudo->getImagem() . "','" . $conteudo->getVideo() . "','" . $conteudo->getIdcurso() . "','" . $conteudo->getSecao() . "','" . $conteudo->getCapitulo() . "','" . $conteudo->getTitulo() . "')";
        $this->conn->exec($sql);
    }

    
    
    public function CreateAntesDepois($conteudo) {

        $this->conn->beginTransaction();


        $sql = 'UPDATE conteudo SET ordem= ordem+1 WHERE idcurso ='.$conteudo->getIdcurso().'and ordem>='.$conteudo->getOrdem();
        $this->conn->exec($sql);
        
        
        $sql = "INSERT INTO conteudo (ordem,texto,imagem,video,idcurso,secao,capitulo,titulo)
                VALUES ('" . $conteudo->getOrdem() . "', '" . $conteudo->getTexto() . "', '" . $conteudo->getImagem() . "','" . $conteudo->getVideo() . "','" . $conteudo->getIdcurso() . "','" . $conteudo->getSecao() . "','" . $conteudo->getCapitulo() . "','" . $conteudo->getTitulo() . "')";
        
        $this->conn->exec($sql);


$this->conn->commit();
        
    }
    
    //=========== Pesquisa todos os Campos =============================
    public function Read() {

        $sql = "SELECT *,curso.nomecurso,curso.idcurso FROM conteudo,curso WHERE curso.idcurso = conteudo.idcurso";
        try {
            $result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $conteudo = array();
        foreach ($result as $row) {
            $c = new Conteudo($row['idconteudo'], $row['ordem'], $row['texto'], $row['imagem'], $row['video'], $row['idcurso'], $row['capitulo'], $row['secao'], $row['nomecurso'], $row['titulo']);
            array_push($conteudo, $c);
        }
        return $conteudo;
    }

    //=========== Pesquisa por ID =============================

    public function ReadByID($id) {

        $sql = "select * from conteudo WHERE idconteudo = $id ";
        try {
            $result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $conteudo = array();
        foreach ($result as $row) {
            $c = new Conteudo($row['idconteudo'], $row['ordem'], $row['texto'], $row['imagem'], $row['video'], $row['idcurso'], $row['capitulo'], $row['secao'], $row['nomecurso'], $row['titulo']);
            array_push($conteudo, $c);
        }
        return $conteudo;
    }
    
    public function ReadByIDCurso($id) {

        $sql = "SELECT *,curso.nomecurso,curso.idcurso FROM conteudo,curso WHERE curso.idcurso = $id and curso.idcurso = conteudo.idcurso ORDER BY capitulo,secao,ordem ";
        try {
            $result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $conteudo = array();
        foreach ($result as $row) {
            $c = new Conteudo($row['idconteudo'], $row['ordem'], $row['texto'], $row['imagem'], $row['video'], $row['idcurso'], $row['capitulo'], $row['secao'], $row['nomecurso'], $row['titulo']);
            array_push($conteudo, $c);
        }
        return $conteudo;
    }
    

    //================ UPDATE ===================

    public function Update($id, $ordem, $texto, $imagem, $video, $curso, $secao, $capitulo, $titulo) {
        $stmt = $this->conn->prepare('UPDATE conteudo SET ordem = :ordem,texto = :texto,imagem = :imagem,video = :video,idcurso =:curso,secao =:secao,capitulo =:capitulo,titulo =:titulo WHERE idconteudo = :id');
        $stmt->execute(array(":id" => $id, ":ordem" => $ordem, ":texto" => $texto, ":imagem" => $imagem, ":video" => $video, ":curso" => $curso, ":secao" => $secao, ":capitulo" => $capitulo, ":titulo" => $titulo,));
    }

    //=============== DELETE ===============

    public function Delete($id) {
        $this->conn->query("DELETE FROM conteudo WHERE idconteudo = '$id'");
    }

    //======================= Paginação ===========================
    public function itemPorPagina($pagina1, $qItens) {
        $pagina = intval($pagina1);
        $itens_por_pagina = $qItens;

        return $pagina;
    }

    public function Total($id) {
        $stmt1 = $this->conn->prepare("SELECT * FROM conteudo where idcurso = $id");
        $stmt1->execute();
        $numTotal = $stmt1->rowCount();

        return $numTotal;
    }

    public function numTotal($itens_por_pagina, $id) {
        $stmt1 = $this->conn->prepare("SELECT * FROM conteudo where idcurso = $id");
        $stmt1->execute();

        $numTotal = $stmt1->rowCount();
        $numPagina = ceil($numTotal / $itens_por_pagina);
        return $numPagina;
    }

    public function paginacao($pagina, $numPagina, $itens_por_pagina) {

        if ($pagina >= $numPagina) {
            $pagina = 0;
        } else if ($pagina < 0) {
            $pagina = 0;
        }
        $paginaOffset = $pagina * $itens_por_pagina;

        $result = $this->conn->query("SELECT *,curso.nomecurso,curso.idcurso FROM conteudo,curso WHERE curso.idcurso = conteudo.idcurso ORDER BY capitulo,secao,ordem,conteudo.idcurso OFFSET $paginaOffset  LIMIT $itens_por_pagina");
        try {
            //$result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $conteudo = array();
        foreach ($result as $row) {
            $c = new Conteudo($row['idconteudo'], $row['ordem'], $row['texto'], $row['imagem'], $row['video'], $row['idcurso'], $row['capitulo'], $row['secao'], $row['nomecurso'], $row['titulo']);
            array_push($conteudo, $c);
        }
        return $conteudo;
    }

    public function paginacaoByCurso($pagina, $numPagina, $itens_por_pagina, $idCurso) {

        if ($pagina >= $numPagina) {
            $pagina = 0;
        } else if ($pagina < 0) {
            $pagina = 0;
        }
        $paginaOffset = $pagina * $itens_por_pagina;

        $result = $this->conn->query("SELECT *,curso.nomecurso,curso.idcurso FROM conteudo,curso WHERE curso.idcurso = $idCurso and curso.idcurso = conteudo.idcurso ORDER BY capitulo,secao,ordem OFFSET $paginaOffset  LIMIT $itens_por_pagina");
        try {
            //$result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $conteudo = array();
        foreach ($result as $row) {
            $c = new Conteudo($row['idconteudo'], $row['ordem'], $row['texto'], $row['imagem'], $row['video'], $row['idcurso'], $row['capitulo'], $row['secao'], $row['nomecurso'], $row['titulo']);
            array_push($conteudo, $c);
        }
        return $conteudo;
    }

}

?>