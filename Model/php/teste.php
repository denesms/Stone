<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include "cursoDAO.php";
        include "conexao.php";
        $cursodao = new CursoDAO();
        $cursodao->setConexao($conexao);
        $curso1 = $cursodao->getCursoByID(2);
        echo $curso1->getNome();
        
        //-----------------------------------
        $cursos = $cursodao->getCursos();
        foreach ($cursos as $c) {
            echo $c->getNome()."<br>";
        }
       
        
        ?>
    </body>
</html>
