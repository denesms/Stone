<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastra Questoẽs</title>
    </head>
    <body>

        <?php
        include_once "../questoes.php";
        include_once "../questoesDAO.php";
        $DAO = new QuestoesDAO; // instanciando um novo objeto do tipo questoesDAO
// ======== O POST Pega as variaveis da outra pagina,ou seja pega do cadastroTurmaF ========

        if (isset($_GET['idDel'])) {

            $idDel = $_GET['idDel'];
            $idcurso = $_GET['idcurso'];



            //==================== Excluir de questoes ====================



            try {

                $DAO->Delete($idDel); // Operação de Exclui no banco de dados

                header('location:/View/html/listarQuest.php?id=' . $idcurso);  // Redireciona a Página
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        } elseif (isset($_POST['add'])) {

            $pergunta = $_POST['pergunta'];
            $ra = $_POST['respostaA'];
            $va = $_POST['valorA'];

            $rb = $_POST['respostaB'];
            $vb = $_POST['valorB'];

            $rc = $_POST['respostaC'];
            $vc = $_POST['valorC'];

            $rd = $_POST['respostaD'];
            $vd = $_POST['valorD'];

            $idcurso = $_POST['idcurso'];

            $idq = '';


            //==================== Cadastro de questoes ====================

            try {

                $questoes = new questoes($idq, $pergunta, $ra, $rb, $rc, $rd, $va, $vb, $vc, $vd, $idcurso);



                $DAO->Create($questoes); // Operação de Create no banco de dados
                header('location:/View/html/cadastroQuest.php?cad=1&curso=' . $idcurso);  // Redireciona a Página
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        } elseif (isset($_POST['update'])) {

            $pergunta = $_POST['pergunta'];
            $ra = $_POST['respostaA'];
            $va = $_POST['valorA'];

            $rb = $_POST['respostaB'];
            $vb = $_POST['valorB'];

            $rc = $_POST['respostaC'];
            $vc = $_POST['valorC'];

            $rd = $_POST['respostaD'];
            $vd = $_POST['valorD'];

            $idcurso = $_POST['idcurso'];

            $idq = $_POST['idq'];


            $questao = new questoes($idq, $pergunta, $ra, $rb, $rc, $rd, $va, $vb, $vc, $vd, $idcurso);

            $DAO->Update($questao);
              header('location:/View/html/listarQuest.php?id=' . $idcurso);  // Redireciona a Página
            
        }elseif (isset($_POST['addQuestionario'])) {
           
            
            
            
        }
        ?>
    </body>
</html>


