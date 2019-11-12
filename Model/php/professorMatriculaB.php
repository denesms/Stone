<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="../MatriculaDAO.php"></a>
        <?php
       
        include_once '../MatriculaDAO.php';  // inclue a pagina MatriculaDAO

        
// ======== O POST Pega as variaveis da outra pagina,ou seja pega do cadastroMatriculaF ========
        $idmatricula = '';
        $nota1 = $_POST['nota1'];
        $nota2 = $_POST['nota2'];
        $notafinal = ($nota1 + $nota2) / 2;    // Calcula a media 
        $turma = $_POST['turma'];
        $aluno = $_POST['aluno'];
        $nomealuno;


        //=================== CADASTRO ====================
        
        $matricula = new Matricula($idmatricula,$nota1, $nota2, $notafinal, $turma, $aluno, $nomealuno,'');
        $DAO = new matriculaDAO(); // instanciando um novo objeto do tipo CursoDAO
        $DAO->Create($matricula);
        
        header('location:../../View/html/professorMatricula.php?cad=1');   // Redireciona a Página
        ?>
        
    </body>
</html>
