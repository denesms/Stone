<?php

include_once 'connection.php';
include_once 'Turma.php';

class turmaDAO {

    var $conn;

    function turmaDAO() {
        $database = new Connection();
        $this->conn = $database->openConnection();
    }

    
    //=========== Cadastro =============================
     public function Create($turma) {


        $sql = "INSERT INTO turma (datainicio, datafinal, idcurso, idprofessor1, idprofessor2,descricao)
                VALUES ('".$turma->getDatainicio()."', '".$turma->getDatafinal()."', '".$turma->getIdcurso()."', '".$turma->getIdprofessor1()."' , '".$turma->getIdprofessor2()."', '".$turma->getTDescricao()."')";

        $this->conn->exec($sql);

        
    }

    public function Create2($turma) {


        $sql = "INSERT INTO turma (datainicio, datafinal, idcurso, idprofessor1,descricao)
                VALUES ('".$turma->getDatainicio()."', '".$turma->getDatafinal()."', '".$turma->getIdcurso()."', '".$turma->getIdprofessor1()."', '".$turma->getTDescricao()."')";

        $this->conn->exec($sql);
       
    }

    //=========== Pesquisa todos os Campos =============================
    public function Read() {

        $sql = "SELECT turma.idcurso,turma.idprofessor1, turma.idprofessor2, turma.idturma, turma.datainicio, turma.datafinal, curso.nomecurso, usuario1.nome as professor1, usuario2.nome as professor2
    FROM turma,usuario as usuario1, usuario as usuario2,curso 
    where turma.idcurso = curso.idcurso and usuario1.idusuario = turma.idprofessor1 and usuario2.idusuario = turma.idprofessor2  order by nomecurso";
        try {
            $result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $turmas = array();
        foreach ($result as $row) {
            $t = new Turma($row['idturma'], $row['datainicio'], $row['datafinal'], $row['idcurso'], $row['nomecurso'], $row['idprofessor1'], $row['professor1'], $row['idprofessor2'], $row['professor2'], $row['descricao']);
            array_push($turmas, $t);
        }
        
        return $turmas;
    }

    
    public function ReadData() {

        $sql = "SELECT *  FROM turma where datafinal >= CURRENT_DATE";
        try {
            $result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $turmas = array();
        foreach ($result as $row) {
            $t = new Turma($row['idturma'], $row['datainicio'], $row['datafinal'], $row['idcurso'], $row['nomecurso'], $row['idprofessor1'], $row['professor1'], $row['idprofessor2'], $row['professor2'], $row['descricao']);
            array_push($turmas, $t);
        }
        
        return $turmas;
    }
    
    
    //=========== Pesquisa por ID =============================

    public function ReadByID($id) {

        $sql = "select * from turma WHERE idturma = $id ";
        try {
            $result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $turmas = array();
        foreach ($result as $row) {
            $t = new Turma($row['idturma'], $row['datainicio'], $row['datafinal'], $row['idcurso'], $row['nomecurso'], $row['idprofessor1'], $row['professor1'], $row['idprofessor2'], $row['professor2'], $row['descricao']);
            array_push($turmas, $t);
        }
      
        return $turmas;
    }

     public function ReadByIDCurso($id) {

        $sql = "select idturma from turma WHERE idcurso = $id ";
        try {
            $result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
       foreach ($result as $row) {
         echo $row['idturma'];
        }
        
        
    }
    
    
    
    //================ UPDATE ===================

    public function Update($id, $datainicio, $datafinal, $idcurso, $idprofessor1, $idprofessor2) {
        $stmt = $this->conn->prepare('UPDATE turma SET datainicio = :datainicio,datafinal = :datafinal,idcurso = :idcurso,idprofessor1 = :idprofessor1,idprofessor2 =:idprofessor2, descricao=:descricao  WHERE idturma = :id');
        $stmt->execute(array(":id" => $id, ":datainicio" => $datainicio, ":datafinal" => $datafinal, ":idcurso" => $idcurso, ":idprofessor1" => $idprofessor1, ":idprofessor2" => $idprofessor2,":descricao" => $descricao));
       
    }

    //=============== DELETE ===============

    public function Delete($id) {
        $this->conn->query("DELETE FROM turma WHERE idturma = '$id'");

    
    }

    //======================= Paginação ===========================
    public function itemPorPagina($pagina1, $qItens) {
        $pagina = intval($pagina1);
        $itens_por_pagina = $qItens;

        
        return $pagina;
    }

    public function numTotal($itens_por_pagina) {
        $stmt1 = $this->conn->prepare("SELECT * FROM turma");
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

        $result = $this->conn->query("SELECT turma.idcurso,turma.idprofessor1, turma.idprofessor2, turma.idturma, turma.datainicio, turma.datafinal,turma.descricao, curso.nomecurso, usuario1.nome as professor1, usuario2.nome as professor2
    FROM turma,usuario as usuario1, usuario as usuario2,curso 
    where turma.idcurso = curso.idcurso and usuario1.idusuario = turma.idprofessor1 and usuario2.idusuario = turma.idprofessor2 order by nomecurso OFFSET $paginaOffset  LIMIT $itens_por_pagina");
        try {
            //$result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $turmas = array();
        foreach ($result as $row) {
            $t = new Turma($row['idturma'], $row['datainicio'], $row['datafinal'], $row['idcurso'], $row['nomecurso'], $row['idprofessor1'], $row['professor1'], $row['idprofessor2'], $row['professor2'], $row['descricao']);
            array_push($turmas, $t);
        }
      
        return $turmas;

        
    }

}

?>