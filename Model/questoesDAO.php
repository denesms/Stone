<?php

require_once 'connection.php';
require_once 'questoes.php';

class QuestoesDAO {

    var $conn;

    function questoesDao() {
        $database = new Connection();
        $this->conn = $database->openConnection();
    }

    /* public function Create($ordem, $texto, $imagem, $video, $curso, $secao, $capitulo) {


      $sql = "INSERT INTO conteudo (ordem,texto,imagem,video,idcurso,secao,capitulo)
      VALUES ($ordem, '$texto', '$imagem','$video',$curso,$secao,$capitulo)";

      $this->conn->exec($sql);
      } */

    //=========== Cadastro =============================
    public function Create($questoes) {

        $sql = "INSERT INTO perguntas (pergunta,respostaa,respostab,respostac,respostad,valora,valorb,valorc,valord,idcurso)
                VALUES ('" . $questoes->getPergunta() . "', '" . $questoes->getRa() . "', '" . $questoes->getRb() . "','" . $questoes->getRc() . "','" . $questoes->getRD() . "','" . $questoes->getVa() . "','" . $questoes->getVb() . "','" . $questoes->getVc() . "' ,'" . $questoes->getVd() . "' ,'" . $questoes->getIdcurso() . "' )";
        $this->conn->exec($sql);
    }

    public function CreateAntesDepois($conteudo) {

        $this->conn->beginTransaction();


        $sql = 'UPDATE conteudo SET ordem= ordem+1 WHERE idcurso =' . $conteudo->getIdcurso() . 'and ordem>=' . $conteudo->getOrdem();
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

        $sql = "select * from perguntas WHERE idpergunta = $id ";
        try {
            $result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $questao = array();
        foreach ($result as $row) {
            $c = new questoes($row['idpergunta'], $row['pergunta'], $row['respostaa'], $row['respostab'], $row['respostac'], $row['respostad'], $row['valora'], $row['valorb'], $row['valorc'], $row['valord'], $row['idcurso']);

            array_push($questao, $c);
        }
        return $questao;
    }

    //================ UPDATE ===================
//    public function Update($id, $ordem, $texto, $imagem, $video, $curso, $secao, $capitulo, $titulo) {
//        
//        
//        $stmt = $this->conn->prepare('UPDATE conteudo SET ordem = :ordem,texto = :texto,imagem = :imagem,video = :video,idcurso =:curso,secao =:secao,capitulo =:capitulo,titulo =:titulo WHERE idconteudo = :id');
//        $stmt->execute(array(":id" => $id, ":ordem" => $ordem, ":texto" => $texto, ":imagem" => $imagem, ":video" => $video, ":curso" => $curso, ":secao" => $secao, ":capitulo" => $capitulo, ":titulo" => $titulo,));
//    
//        
//    }

    public function Update($questao) {



        $sql = "UPDATE perguntas SET pergunta = '" .$questao->getPergunta(). "' , respostaa = '" . $questao->getRa() . "' , respostab = '" . $questao->getRb() . "', respostac = '" . $questao->getRc() . "', respostad = '" . $questao->getRd() . "', valora = " . $questao->getVa() . ', valorb = ' . $questao->getVb() . ', valorc = ' . $questao->getVc() . ', valord = ' . $questao->getVd() . ', idcurso = ' . $questao->getIdcurso() . '  WHERE idpergunta = ' . $questao->getIdq();
        $this->conn->exec($sql);
        
        
    }

    //=============== DELETE ===============

    public function Delete($id) {
        $this->conn->query("DELETE FROM perguntas WHERE idpergunta = '$id'");
    }

    //======================= Paginação ===========================
    public function itemPorPagina($pagina1, $qItens) {
        $pagina = intval($pagina1);
        $itens_por_pagina = $qItens;

        return $pagina;
    }

    public function Total($id) {
        $stmt1 = $this->conn->prepare("SELECT * FROM perguntas where idcurso = $id");
        $stmt1->execute();
        $numTotal = $stmt1->rowCount();

        return $numTotal;
    }

    public function numTotal($itens_por_pagina, $id) {
        $stmt1 = $this->conn->prepare("SELECT * FROM perguntas where idcurso = $id");
        $stmt1->execute();

        $numTotal = $stmt1->rowCount();
        $numPagina = ceil($numTotal / $itens_por_pagina);
        return $numPagina;
    }

    public function paginacao($pagina, $numPagina, $itens_por_pagina, $id) {

        if ($pagina >= $numPagina) {
            $pagina = 0;
        } else if ($pagina < 0) {
            $pagina = 0;
        }
        $paginaOffset = $pagina * $itens_por_pagina;

        $result = $this->conn->query("SELECT * FROM perguntas WHERE idcurso = $id   order by idpergunta OFFSET $paginaOffset  LIMIT $itens_por_pagina  ");
        try {
            //$result = $this->conn->query($sql);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        $questoes = array();
        foreach ($result as $row) {
            $c = new questoes($row['idpergunta'], $row['pergunta'], $row['respostaa'], $row['respostab'], $row['respostac'], $row['respostad'], $row['valora'], $row['valorb'], $row['valorc'], $row['valord'], $row['idcurso']);
            array_push($questoes, $c);
        }
        return $questoes;
    }

}

?>