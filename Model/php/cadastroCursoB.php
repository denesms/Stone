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
        include_once '../CursoDAO.php'; // inclue da pagina CursoDAO
        include_once '../Curso.php'; //inclue da pagina Curso
// ======== O POST Pega as variaveis da outra pagina,ou seja pega do cadastroCursoF ========


        $nomecurso = $_POST['nomecurso'];
        $descricao = $_POST['descricao'];
        $cargahoraria = $_POST['cargahoraria'];
        $id;

        $curso = new Curso($id, $nomecurso, $descricao, $cargahoraria);
        $DAO = new cursoDAO(); // instanciando um novo objeto do tipo CursoDAO
        $DAO->Create($curso);
        header('location:../../View/html/cadastroCursoF.php?cad=1'); // Redireciona a Página
        ?>

    </body>
</html>
