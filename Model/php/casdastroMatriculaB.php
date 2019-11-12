<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        include_once '../MatriculaDAO.php';  // inclue a pagina MatriculaDAO
        $DAO = new matriculaDAO(); // instanciando um novo objeto do tipo CursoDAO
// ======== O POST Pega as variaveis da outra pagina,ou seja pega do cadastroMatriculaF ========

        if (isset($_POST['turma'])) {
            $idmatricula;
            $nota1 = $_POST['nota1'];
            $nota2 = $_POST['nota2'];
            $notafinal;    // Calcula a media 
            $ultimoslide = $_POST['ultimoslide'];
            $ultimocapitulo = $_POST['ultimocapitulo'];
            $ultimasecao = $_POST['ultimasecao'];
            $turma = $_POST['turma'];
            $aluno = $_POST['aluno'];
            $nomeAluno;
            $nomecurso;
        }
        if (isset($_GET['turma'])) {
            $idmatricula;
            $nota1;
            $nota2;
            $notafinal;    // Calcula a media 
            $ultimoslide;
            $ultimocapitulo;
            $ultimasecao;
            $turma = $_GET['turma'];
            $aluno = $_GET['idusuario'];
            $nomeAluno;
            $nomecurso;
            
            echo  $DAO->MatriVerific($aluno,$turma);
            
           
            if($DAO->MatriVerific($aluno,$turma) == 1){
              header('location:../../View/html/CursosF.php?erro=1');
                 die;
            }else{
            //     header('../../View/html/CursosF.php?erro=1');
            }
            
        }


        //=================== CADASTRO ====================

        @$matricula = new Matricula($idmatricula, $nota1, $nota2, $notafinal, $ultimoslide, $ultimocapitulo, $ultimasecao, $turma, $aluno, $nomeAluno, $nomecurso);
        //Matricula($idmatricula, $nota1, $nota2, $notafinal, $ultimoslide, $ultimocapitulo, $ultimasecao, $turma, $aluno, $nomealuno,$nomecurso);

        if (isset($nota1) && isset($nota2) && isset($notafinal)) {

            $DAO->Create($matricula);
        } else {

            $DAO->Create2($matricula);
             header('../../View/html/CursosF.php'); 
        }
        if (isset($_GET['turma'])) {
            header('location:../../View/html/MeusCursos.php');   // Redireciona a Página   
        } else {
            header('location:../../View/html/casdastroMatriculaF.php?cad=1');   // Redireciona a Página      
        }
        ?>
        <a href="../../View/html/CursosF.php"></a>
    </body>
</html>
