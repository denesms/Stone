<?php

require_once 'connection.php';
require_once 'Curso.php';

class cursoDAO {

    var $conn;

    function cursoDAO() {
        $database = new Connection();
        $this->conn = $database->openConnection();
    }

    public function Create($curso) {
        $sql = "INSERT INTO curso (nomecurso, descricao, cargahoraria) VALUES ('" . $curso->getNome() . "', '" . $curso->getDescricao() . "', '" . $curso->getCargaHoraria() . "')";

        $this->conn->exec($sql);
    }

    /*  public function Create($nomecurso, $descricao, $cargahoraria) {


      $sql = "INSERT INTO curso (nomecurso, descricao, cargahoraria)
      VALUES ('$nomecurso', '$descricao', '$cargahoraria')";

      $this->conn->exec($sql);
      } */

    //=========== Pesquisa todos os Campos =============================
    public function Read() {

        $sql = "select * from curso";
        try {
            $result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $cursos = array();
        foreach ($result as $row) {
            $c = new Curso($row['idcurso'], $row['nomecurso'], $row['descricao'], $row['cargahoraria']);
            array_push($cursos, $c);
        }
        return $cursos;
    }

    
    
      public function ReadCursoByIDUsuario($idusuario) {

        $sql = "select curso.idcurso, curso.nomecurso, curso.descricao, curso.cargahoraria FROM  curso, matricula,turma where matricula.idturma = turma.idturma and turma.idcurso = curso.idcurso and matricula.idaluno = $idusuario";
        try {
            $result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $cursos = array();
        foreach ($result as $row) {
            $c = new Curso($row['idcurso'], $row['nomecurso'], $row['descricao'], $row['cargahoraria']);
            array_push($cursos, $c);
        }
        return $cursos;
    }
    
    
    public function ReadCursoCadastro($idusuario) {

        $sql = "select DISTINCT curso.idcurso, curso.nomecurso, curso.descricao, curso.cargahoraria FROM  curso, matricula,turma where matricula.idturma = turma.idturma and turma.idcurso = curso.idcurso and matricula.idaluno != $idusuario order by nomecurso";
        try {
            $result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $cursos = array();
        foreach ($result as $row) {
            $c = new Curso($row['idcurso'], $row['nomecurso'], $row['descricao'], $row['cargahoraria']);
            array_push($cursos, $c);
        }
        return $cursos;
    }

    //=========== Pesquisa por ID do Professor =============================
    public function ReadProf($id) {

        $sql = "SELECT curso.idcurso,nomecurso,cargahoraria FROM curso,turma WHERE turma.idcurso = curso.idcurso and turma.idprofessor1 = $id";
        try {
            $result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $cursos = array();
        foreach ($result as $row) {
            $c = new Curso($row['idcurso'], $row['nomecurso'], $row['descricao'], $row['cargahoraria']);
            array_push($cursos, $c);
        }
        return $cursos;
    }

    //=========== Pesquisa por ID =============================

    public function ReadByID($id) {

        $sql = "select * from curso WHERE idcurso = $id ";
        try {
            $result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $cursos = array();
        foreach ($result as $row) {
            $c = new Curso($row['idcurso'], $row['nomecurso'], $row['descricao'], $row['cargahoraria']);
            array_push($cursos, $c);
        }
        return $cursos;
    }

    //================ UPDATE ===================

    public function Update($id, $nomecurso, $descricao, $cargahoraria) {
        $stmt = $this->conn->prepare('UPDATE curso SET nomecurso = :nomecurso,descricao = :descricao,cargahoraria = :cargahoraria WHERE idcurso = :id');
        $stmt->execute(array(":id" => $id, ":nomecurso" => $nomecurso, ":descricao" => $descricao, ":cargahoraria" => $cargahoraria,));
    }

    //=============== DELETE ===============

    public function Delete($id) {
        $this->conn->query("DELETE FROM curso WHERE idcurso = '$id'");
    }

    //======================= Paginação ===========================
    public function itemPorPagina($pagina1, $qItens) {
        $pagina = intval($pagina1);
        $itens_por_pagina = $qItens;

        return $pagina;
    }

    public function numTotal($itens_por_pagina) {
        $stmt1 = $this->conn->prepare("SELECT * FROM curso");
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
        //$sql = query("SELECT * FROM curso  OFFSET $paginaOffset  LIMIT $itens_por_pagina");
        $result = $this->conn->query("select DISTINCT curso.idcurso, curso.nomecurso, curso.descricao, curso.cargahoraria FROM  curso, matricula,turma where  turma.idcurso = curso.idcurso order by nomecurso  OFFSET $paginaOffset  LIMIT $itens_por_pagina");
        try {
            //$result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $cursos = array();
        foreach ($result as $row) {
            $c = new Curso($row['idcurso'], $row['nomecurso'], $row['descricao'], $row['cargahoraria']);
            array_push($cursos, $c);
        }
        return $cursos;
    }
    
    
    
    
    public function paginacao3($pagina, $numPagina, $itens_por_pagina) {

        if ($pagina >= $numPagina) {
            $pagina = 0;
        } else if ($pagina < 0) {
            $pagina = 0;
        }
        $paginaOffset = $pagina * $itens_por_pagina;
        //$sql = query("SELECT * FROM curso  OFFSET $paginaOffset  LIMIT $itens_por_pagina");
        $result = $this->conn->query("select *  FROM  curso order by nomecurso  OFFSET $paginaOffset  LIMIT $itens_por_pagina");
        try {
            //$result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $cursos = array();
        foreach ($result as $row) {
            $c = new Curso($row['idcurso'], $row['nomecurso'], $row['descricao'], $row['cargahoraria']);
            array_push($cursos, $c);
        }
        return $cursos;
    }
    
    
    
    
    //======================= Paginação2 ===========================
     

    public function numTotal2($itens_por_pagina,$idusuario) {
        $stmt1 = $this->conn->prepare("select DISTINCT curso.idcurso, curso.nomecurso, curso.descricao, curso.cargahoraria FROM  curso, matricula,turma where matricula.idturma = turma.idturma and turma.idcurso = curso.idcurso and matricula.idaluno != $idusuario");
        $stmt1->execute();

        $numTotal = $stmt1->rowCount();
        $numPagina = ceil($numTotal / $itens_por_pagina);
        return $numPagina;
    }
    public function paginacaoCadasCurso($pagina, $numPagina, $itens_por_pagina,$idusuario) {

        if ($pagina >= $numPagina) {
            $pagina = 0;
        } else if ($pagina < 0) {
            $pagina = 0;
        }
        $paginaOffset = $pagina * $itens_por_pagina;
        //$sql = query("SELECT * FROM curso  OFFSET $paginaOffset  LIMIT $itens_por_pagina");
        $result = $this->conn->query("select DISTINCT curso.idcurso, curso.nomecurso, curso.descricao, curso.cargahoraria FROM  curso, matricula,turma where matricula.idturma = turma.idturma and turma.idcurso = curso.idcurso and matricula.idaluno != $idusuario order by nomecurso OFFSET $paginaOffset  LIMIT $itens_por_pagina");
        try {
            //$result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $cursos = array();
        foreach ($result as $row) {
            $c = new Curso($row['idcurso'], $row['nomecurso'], $row['descricao'], $row['cargahoraria']);
            array_push($cursos, $c);
        }
        return $cursos;
    }

}

?>