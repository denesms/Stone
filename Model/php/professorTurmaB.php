<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href=""></a>
        <?php
        include_once '../TurmaDAO.php'; // inclue a pagina TurmaDAO
        include_once '../Turma.php';

// ======== O POST Pega as variaveis da outra pagina,ou seja pega do cadastroTurmaF ========

        $datainicio = $_POST['datainicio'];
        $datafinal = $_POST['datafinal'];
        $idcurso = $_POST['idcurso'];
        $idprofessor1 = $_POST['idprofessor1'];
        $idprofessor2 = $_POST['idprofessor2'];
        $idturma;
        $nomecurso;
        $nomeprofessor1;
        $nomeprofessor2;
//==================== Cadastro de Turma ====================
        $DAO = new turmaDAO(); // instanciando um novo objeto do tipo TurmaDAO
        $turma = new Turma($idturma, $datainicio, $datafinal, $idcurso, $nomecurso, $idprofessor1, $nomeprofessor1, $idprofessor2, $nomeprofessor2);


        if ($idprofessor2 == 0) {
            
            $DAO->Create2($turma); // Operação de Create no banco de dados
        } else {
            $DAO->Create($turma); // Operação de Create no banco de dados
            
        }

        header('location:../../View/html/professorTurma.php?cad=1');  // Redireciona a Página
        ?>
        
    </body>
    
</html>
