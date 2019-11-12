<?php

require_once 'connection.php';
require_once 'Matricula.php';

class MatriculaDAO {

    var $conn;

    function MatriculaDAO() {
        $database = new Connection();
        $this->conn = $database->openConnection();
    }

    public function Create($matricula) {


        $sql = "INSERT INTO matricula (nota1, nota2, notafinal,ultimoslide,ultimocapitulo,ultimasecao, idturma, idaluno)
                    VALUES ('".$matricula->getNota1()."', '".$matricula->getNota2()."', '".$matricula->getNotafinal()."', '".$matricula->getUltimoslide()."', '".$matricula->getUltimocapitulo()."', '".$matricula->getUltimasecao()."', '".$matricula->getIdturma()."', '".$matricula->getIdaluno()."')";

        
        $this->conn->exec($sql);
    }

    
    public function Create2($matricula) {


        $sql = "INSERT INTO matricula (idturma, idaluno)
                    VALUES ('".$matricula->getIdturma()."', '".$matricula->getIdaluno()."')";

        
        $this->conn->exec($sql);
    }
    
    
    //=========== Pesquisa todos os Campos =============================
    public function Read() {

        $sql = "select * from matricula";
        try {
            $result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $matricula = array();
        foreach ($result as $row) {
            $m = new matricula($row['idmatricula'], $row['nota1'], $row['nota2'], $row['notafinal'], $row['ultimoslide'], $row['ultimocapitulo'], $row['ultimasecao'], $row['idturma'], $row['idaluno']);
            array_push($matricula, $m);
        }
        return $matricula;
    }

    //=========== Pesquisa por ID =============================

    public function ReadByID($id) {

        $sql = "select * from matricula WHERE idmatricula = $id ";
        try {
            $result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $matricula = array();
        foreach ($result as $row) {
            $m = new matricula($row['idmatricula'], $row['nota1'], $row['nota2'], $row['notafinal'], $row['ultimoslide'], $row['ultimocapitulo'], $row['ultimasecao'], $row['idturma'], $row['idaluno']);
            array_push($matricula, $m);
        }
        return $matricula;
    }
    
    public function MatriVerific($aluno,$turma) {

        $stmt1 = $this->conn->prepare("select idmatricula FROM  matricula where  idaluno = $aluno and idturma = $turma");
        $stmt1->execute();

        $numTotal = $stmt1->rowCount();
        if($numTotal != 0){
            return TRUE;
            
        }else{
            return FALSE;
        }
    }
    
    
     public function MatriculaId($idcurso,$idusuario) {

        $sql = "select * FROM  curso, matricula,turma where matricula.idturma = turma.idturma and turma.idcurso = curso.idcurso and matricula.idaluno = $idusuario and curso.idcurso = $idcurso ";
        try {
            $result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $matricula = array();
        foreach ($result as $row) {
            $m = new matricula($row['idmatricula'], $row['idnotas'], ['ultimoslide'], $row['ultimocapitulo'], $row['ultimasecao'], $row['idturma'], $row['idaluno'], '','');
            array_push($matricula, $m);
        }
        return $matricula;
    }
    
     //=========== Pesquisa das notas =============================

    public function ReadNota($idusuario) {
      

        $result = $this->conn->query("select idmatricula,idaluno, curso.nomecurso,turma.idturma, matricula.nota1, matricula.nota2, matricula.notafinal FROM  curso, matricula, turma where matricula.idturma = turma.idturma and turma.idcurso = curso.idcurso and matricula.idaluno = $idusuario order by curso.nomecurso");
        try {
            //$result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $matricula = array();
        foreach ($result as $row) {
             //$m = new Matricula($row['nota1'], $row['nota2'], $row['notafinal'], $row['idturma'],$row['nomecurso']);
             $m = new matricula($row['idmatricula'], $row['nota1'], $row['nota2'], $row['notafinal'],'','', '', $row['idturma'], $row['idaluno'],'',$row['nomecurso']); // As aspas simples passam o campo que nao foi utilzado no construtor
            // $idmatricula, $nota1, $nota2, $notafinal, $idturma, $idaluno, $nomeAluno, $nomecurso
             array_push($matricula, $m);
        }
        return $matricula;
    }


    //================ UPDATE ===================

    public function Update($id, $nota1, $nota2, $notafinal,$ultimoslide,$ultimocapitulo,$ultimasecao, $turma, $aluno) {
        $stmt = $this->conn->prepare('UPDATE matricula SET nota1 = :nota1,nota2 = :nota2,notafinal = :notafinal,ultimoslide = :ultimoslide,ultimocapitulo = :ultimocapitulo,ultimasecao = :ultimasecao,idturma = :turma,idaluno = :idaluno WHERE idmatricula = :id');
        $stmt->execute(array(":id" => $id, ":nota1" => $nota1, ":nota2" => $nota2, ":notafinal" => $notafinal, ":ultimoslide" => $ultimoslide,":ultimocapitulo" => $ultimocapitulo,":ultimasecao" => $ultimasecao, ":turma" => $turma, ":idaluno" => $aluno));
    }

    //=============== DELETE ===============

    public function Delete($id) {
        $this->conn->query("DELETE FROM matricula WHERE idmatricula = '$id'");
    }

    //======================= Paginação ===========================
    public function itemPorPagina($pagina1, $qItens) {
        $pagina = intval($pagina1);
        $itens_por_pagina = $qItens;

        return $pagina;
    }

    public function numTotal($itens_por_pagina) {
        $stmt1 = $this->conn->prepare("SELECT * FROM matricula");
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

        $result = $this->conn->query("SELECT *,usuario.nome,usuario.idusuario,curso.nomecurso FROM matricula,usuario,curso,turma WHERE matricula.idaluno = usuario.idusuario and turma.idturma = matricula.idturma and turma.idcurso = curso.idcurso order by nomecurso OFFSET $paginaOffset  LIMIT $itens_por_pagina");
        try {
            //$result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $matricula = array();
        foreach ($result as $row) {
            $m = new matricula($row['idmatricula'], $row['idnotas'], $row['ultimoslide'], $row['ultimocapitulo'], $row['ultimasecao'], $row['idturma'], $row['idaluno'],$row['nome'],$row['nomecurso']); // As aspas simples é o campo que nao foi utilizado no construtor
            array_push($matricula, $m);
        }
        return $matricula;
    }

}
?>