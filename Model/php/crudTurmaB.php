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
        <link href="../../bootstrap4/dist/css/bootstrap.css?version=12" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap4/dist/css/bootstrap.min.css?version=12" rel="stylesheet" type="text/css"/>
        <script src="../../bootstrap4/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../bootstrap4/popper/dist/popper.min.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        include '../TurmaDAO.php'; // inclue a pagina TurmaDAO
        include '../CursoDAO.php'; // inclue a pagina CursoDAO
        include '../UsuarioDAO.php'; // inclue a pagina UsuarioDAO

        $DAO = new turmaDAO(); // Instancia um novo objeto do tipo TurmaDAO

//=================== Funçao para Deletar ===================
        if (isset($_GET['idDel'])) {

            $idDel = $_GET['idDel'];
            $DAO->Delete($idDel);

            header("location:../../View/html/crudTurmaF.php");  // Redireciona a pagina
        }

//============= Função para pegar os Valores de Outra Pagina, ou seja do crudTurmaF. =============
        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $datainicio = $_GET['datainicio'];
            $datafinal = $_GET['datafinal'];
            $idcurso = $_GET['idcurso'];
            $idprofessor1 = $_GET['idprofessor1'];
            $idprofessor2 = $_GET['idprofessor2'];
            $nomecurso = $_GET['nomecurso'];
            $nomeprofessor1 = $_GET['nomeprofessor1'];
            $nomeprofessor2 = $_GET['nomeprofessor2'];
        }

//============= VARIAVES DA PROPRIA PAGINA  =============
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $datainicio = $_POST['datainicio'];
            $datafinal = $_POST['datafinal'];
            $idcurso = $_POST['idcurso'];
            $idprofessor1 = $_POST['idprofessor1'];
            $idprofessor2 = $_POST['idprofessor2'];


            
//======= Realiza a função de Update na TurmaDAO =======
            $DAO->Update($id, $datainicio, $datafinal, $idcurso, $idprofessor1, $idprofessor2);
            header("location:../../View/html/crudTurmaF.php");   // Redireciona a página
        }
        ?>
  <!--================= FORMULARIOS HTML =================-->
        <section class="h-100 h">
            <div class="container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper"style="margin-top: 07%;color:white;">
                        <div class="row justify-content-lg-start">

                        </div>
                        <div class="card"style=" width: 20rem;background-color: #004085;">
                            <div class="card-body">
                                <h4 class="card-title row justify-content-center"style="font-family:'Arial';"><strong>FORMULÁRIO DE TURMA</strong></h4>

                                <form method="POST" action="crudTurmaB.php"  >

                                    <div class="form-group">
                                        <input id="id" type="hidden" class="form-control" name="id" value="<?php echo $id ?>" required autofocus>
                                    </div>

                                    <div class="form-group" style ="width: 17.5rem">
                                        <label for="datainicio">Data Inicio</label>
                                        <input id="datainicio" type="date" class="form-control" name="datainicio" value="<?php echo $datainicio ?>" required autofocus>
                                    </div>


                                    <div class="form-group" style ="width: 17.5rem">
                                        <label for="datafinal">Data Final</label>
                                        <input id="datafinal" type="date" class="form-control" name="datafinal" value="<?php echo $datafinal ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="idcurso">Curso</label>
                                        <select name="idcurso"class="dropdown-item-text"style="width: 17.5rem">
                                            <?php
                                            $DAO = new CursoDAO(); // Instancia a Classe CursoDAO
                                            $curso = $DAO->Read();  // Usa um vetor chamado curso do tipo Read que esta localizado na classe CursoDAO
                                            ?>
                                            
                                            <option  value="<?php echo $idcurso; ?>"> <?php echo $nomecurso; ?> </option> <!-- Utiliza as variaveis do GET -->
                                            <?php
                                            
                                            foreach ($curso as $row) { // Laço de repetição para percorrer o vetor curso

                                                $a = $row->getNome();  // atribui a variavel a o nome do novo curso
                                                if ($nomecurso != $a) { //compara se o novo nome é diferente do atual
                                                    ?>
                                                    <option  value="<?php echo $row->getId(); ?>"><?php echo $row->getNome(); ?></option><?php // pega os valores de ID e Nome
                                                }
                                            }
                                            ?>

                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="idprofessor1">Professor1</label>
                                        <select name="idprofessor1"class="dropdown-item-text"style="width: 17.5rem">
                                            <?php
                                            $DAO = new UsuarioDAO();  // Instancia a Classe UsuárioDAO
                                            $usuario = $DAO->Read(); // Usa um vetor chamado usuario do tipo Read que esta localizado na classe UsuarioDAO
                                            ?>
                                            <option  value="<?php echo $idprofessor1; ?>"> <?php echo $nomeprofessor1; ?> </option> <!-- Utiliza as variaveis do GET -->

                                            <?php
                                            foreach ($usuario as $row) {  // Laço de repetição para percorrer o vetor 

                                                $a = $row->getNome(); // atribui à variavel ( a ) o nome do novo Usuário
                                                if ($nomeprofessor1 != $a) { //compara se o novo nome é diferente do atual
                                                    ?>
                                                    <option  value="<?php echo $row->getIdusuario(); ?>"><?php echo $row->getNome(); ?></option> <?php // pega os valores de ID e Nome
                                                }
                                            }
                                            ?>
                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label for="idprofessor2">Professor2</label>
                                        <select name="idprofessor2"class="dropdown-item-text"style="width: 17.5rem">
                                           
                                          <?php
                                            $DAO = new UsuarioDAO(); // Instancia a Classe UsuárioDAO
                                            $usuario = $DAO->Read(); // Usa um vetor chamado usuario do tipo Read que esta localizado na classe UsuarioDAO
                                            ?>
                                            <option  value="<?php echo $idprofessor2; ?>"> <?php echo $nomeprofessor2; ?> </option> <!-- Utiliza as variaveis do GET -->

                                            <?php
                                            foreach ($usuario as $row) { // Laço de repetição para percorrer o vetor 

                                                $a = $row->getNome(); // atribui à variavel ( a ) o nome do novo Usuário
                                                if ($nomeprofessor2 != $a) {  //compara se o novo nome é diferente do atual
                                                    ?>
                                                    <option  value="<?php echo $row->getIdusuario(); ?>"><?php echo $row->getNome(); ?></option> <?php // pega os valores de ID e Nome
                                                }
                                            }
                                            ?>
                                     
                                        </select>

                                    </div>


                                    <div class="form-group no-margin"style ="width: 17.5rem">
                                        <button type="submit" class="btn btn-success btn-block " name="atualizar">
                                            Atualizar
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </section>








    </body>
</html>



