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
        include_once '../TurmaDAO.php'; // inclue a pagina turmaDAO
        include_once '../UsuarioDAO.php'; // inclue a pagina UsuariDAO
        include_once '../MatriculaDAO.php'; // inclue a pagina MatriculaDAO

        $DAO = new MatriculaDAO();  // Instancia um novo objeto do tipo MatriculaDAO

//=================== Funçao para Deletar ===================
        if (isset($_GET['idDel'])) {
            $idDel = $_GET['idDel'];
            $DAO->Delete($idDel);

            header("location:../../View/html/crudMatriculaF.php");    // Redireciona a pagina
        }
//============= Função pega Valores de Outra Pagina, do crudMatriculaF. =============
        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $nota1 = $_GET['nota1'];
            $nota2 = $_GET['nota2'];
            $notafinal = $_GET['notafinal'];
            $turma = $_GET['turma'];
            $idaluno = $_GET['idaluno'];
            $nome = $_GET['nome'];
        }

        //============= VARIAVES DA PRÓPRIA PAGINA =============
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $nota1 = $_POST['nota1'];
            $nota2 = $_POST['nota2'];
            $notafinal = ($nota1 + $nota2) / 2;
            $turma = $_POST['turma'];
            $aluno = $_POST['idaluno'];

//======= Realiza a função de Update na matriculaDAO ======= 
            $DAO->Update($id, $nota1, $nota2, $notafinal, $turma, $aluno);
            header("location:../../View/html/crudMatriculaF.php");  // Redireciona a pagina
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
                                <center> <h4 class="card-title row justify-content-center"style="font-family:'Arial';"><strong>FORMULÁRIO</br> DE </br>MATRICULA</strong></h4></center>

                                <form method="POST" action="crudMatriculaB.php"  >

                                    <div class="form-group">
                                        <input id="id" type="hidden" class="form-control" name="id" value="<?php echo $id ?>" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label for="nota1">Nota 1</label>
                                        <input id="nota1" type="text" class="form-control" name="nota1" value="<?php echo $nota1 ?>"  autofocus>
                                    </div>


                                    <div class="form-group">
                                        <label for="nota2">Nota 2</label>
                                        <input id="nota2" type="text" class="form-control" name="nota2" value="<?php echo $nota2 ?>" >
                                    </div>

                                    <div class="form-group">
                                        <label for="notafinal">Nota Final</label>
                                        <input disabled id="notafinal" type="text" class="form-control " name="notafinal" value="<?php echo $notafinal ?>">

                                    </div>

                                    <div class="form-group">

                                        <label for="turma">Turma</label>

                                        <select name="turma"class="dropdown-item-text"style="width: 17.5rem">

                                            <option  value="<?php echo $turma; ?>"> <?php echo $turma; ?> </option>  <!-- Utiliza as variaveis do GET -->

                                            <?php
                                            $DAO = new turmaDAO();  // Instancia a Classe TurmaDAO
                                            $t = $DAO->Read();    // Usa um vetor chamado t do tipo Read que esta localizado na classe turmaDAO
                                            
                                            foreach ($t as $row) { // Laço de repetição para percorrer o vetor matricula

                                                $a = $row->getIdturma();  // atribui à variavel ( a ) o id da nova matricula
                                                if ($turma != $a) {    //compara se a nova turma é diferente da atual
                                                    ?>
                                                    <option  value="<?php echo $row->getIdturma(); ?>"><?php echo $row->getIdturma(); ?></option> <?php // o primeiro get pega os valores de ID e o outro mostra os valores.
                                                }
                                            }
                                            ?>


                                        </select>
                                    </div>




                                    <div class="form-group">
                                        <label for="aluno">Aluno</label>
                                        <select name="idaluno"class="dropdown-item-text"style="width: 17.5rem">

                                            <option  value="<?php echo $idaluno; ?>"> <?php echo $nome; ?> </option> <!-- Utiliza as variaveis do GET -->
                                            <?php
                                            $DAO = new UsuarioDAO(); // Instancia a Classe UsuárioDAO
                                            $usuario = $DAO->Read(); // Cria um vetor chamado usuario do tipo Read que esta localizado na classe UsuarioDAO
                                            
                                            foreach ($usuario as $row) { // Laço de repetição para percorrer o vetor 

                                                $a = $row->getNome(); // atribui à variavel ( a ) o nome do novo Usuário
                                                if ($nome != $a) { //compara se o novo nome é diferente do atual
                                                    ?>
                                                    <option  value="<?php echo $row->getIdusuario(); ?>"><?php echo $row->getNome(); ?></option> <?php // pega os valores de ID e Nome
                                                }
                                            }
                                            ?>



                                        </select>

                                    </div>


                                    <div class="form-group no-margin">
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


