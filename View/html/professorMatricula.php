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
    <link href="../../bootstrap4/dist/css/bootstrap.css?version=12" rel="stylesheet" type="text/css"/>
    <link href="../../bootstrap4/dist/css/bootstrap.min.css?version=12" rel="stylesheet" type="text/css"/>
    <script src="../../bootstrap4/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../bootstrap4/popper/dist/popper.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <body>



        <?php
        include 'barraSupProf.php';
        ?>



        <div class = "container" id="menu" >

            <div class="row"> 
                <div class="col-12 text-center my-5">
                    <h1 class="display-3">Ola Seja bem-vindo Professor</h1>
                    <p>Plataforma de Cursos Online </p>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-2  ml-4">

                <!-- Teste de Munu lateral-->


                <div id="accordion">

                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                CRIAR
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse show" >
                            <div class="card-body">

                                <a class=" list-group-item-action list-inline-item my-2" href="professorCurso.php">
                                    Curso

                                </a>

                                <a class="list-group-item-action list-inline-item my-2" href="professorTurma.php">
                                    Turma
                                </a>

                                <a class="list-group-item-action list-inline-item my-2" href="professorMatricula.php">
                                    Matricula
                                </a>

                                <a class="list-group-item-action list-inline-item my-2" href="professorConteudo.php">
                                    Conteudo
                                </a>


                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                EDITAR / EXCLUIR
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse show" >
                            <div class="card-body">




                                <a class="list-group-item-action list-inline-item my-2" href="professorCurso.php?pagina=crudCursoF.php">
                                    Curso
                                </a>

                                <a class="list-group-item-action list-inline-item my-2" href="professorCurso.php?pagina=crudConteudoF.php">
                                    Conteudo
                                </a>

                                <a class="list-group-item-action list-inline-item my-2" href="professorCurso.php?pagina=crudTurmaF.php">
                                    Turma
                                </a>

                                <a class="list-group-item-action list-inline-item my-2" href="professorCurso.php?pagina=crudMatriculaF.php">
                                    Matricula
                                </a>


                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                                Collapsible Group Item #3
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse" >
                            <div class="card-body">
                                Lorem ipsum..
                            </div>
                        </div>
                    </div>

                </div>



            </div>
            <!--Cadastrar Matricula  -->
            <div class="col-9 pull-right">


                <section class="h-100 h">
                    <div class="container h-100">
                        <div class="row justify-content-md-center h-100">
                            <div class="card-wrapper"style="color:white;">
                                <div class="row justify-content-lg-start">

                                </div>
                                <div class="card"style=" width: 20rem;background-color: #004085;">
                                    <div class="card-body">
                                        <center> <h4 class="card-title row justify-content-center"style="font-family:'Arial';"><strong>FORMULÁRIO</br> DE </br>MATRICULA</strong></h4></center>

                                        <form method="POST" action="../../Model/php/professorMatriculaB.php">

                                            <div class="form-group">
                                                <label for="nota1">Nota 1</label>
                                                <input id="nota1" type="float" class="form-control" name="nota1" required autofocus>
                                            </div>


                                            <div class="form-group">
                                                <label for="nota2">Nota 2</label>
                                                <input id="nota2" type="float" class="form-control" name="nota2" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="turma">Turma</label>
                                                <select name="turma"class="dropdown-item-text"style="width: 17.5rem">


                                                    <?php
                                                    include_once '../../Model/TurmaDAO.php';

                                                    $DAO = new turmaDAO();  // Instancia a Classe TurmaDAO
                                                    $t = $DAO->Read();    // Usa um vetor chamado t do tipo Read que esta localizado na classe turmaDAO

                                                    foreach ($t as $row) { // Laço de repetição para percorrer o vetor matricula
                                                        $a = $row->getIdturma();  // atribui à variavel ( a ) o id da nova matricula
                                                        if ($turma != $a) {    //compara se a nova turma é diferente da atual
                                                            ?>
                                                            <option  value="<?php echo $row->getIdturma(); ?>"><?php echo $row->getIdturma(); ?></option> <?php
                                                            // o primeiro get pega os valores de ID e o outro mostra os valores.
                                                        }
                                                    }
                                                    ?>

                                                </select>

                                            </div>

                                            <div class="form-group">
                                                <label for="aluno">Aluno</label>
                                                <select name="aluno"class="dropdown-item-text"style="width: 17.5rem">
                                                    <?php
                                                    include_once '../../Model/UsuarioDAO.php';

                                                    $DAO = new UsuarioDAO(); // Instancia a Classe UsuárioDAO
                                                    $usuario = $DAO->Read(); // Cria um vetor chamado usuario do tipo Read que esta localizado na classe UsuarioDAO

                                                    foreach ($usuario as $row) { // Laço de repetição para percorrer o vetor 
                                                        $a = $row->getNome(); // atribui à variavel ( a ) o nome do novo Usuário
                                                        if ($nome != $a) { //compara se o novo nome é diferente do atual
                                                            ?>
                                                            <option  value="<?php echo $row->getIdusuario(); ?>"><?php echo $row->getNome(); ?></option> <?php
                                                            // pega os valores de ID e Nome
                                                        }
                                                    }
                                                    ?>

                                                </select>

                                            </div>

                                            <div class="form-group no-margin">
                                                <button type="submit" class="btn btn-success btn-block">
                                                    Registrar
                                                </button>
                                            </div>

                                        </form>
                                    </div>

                                </div>
                                <div class="footer text-center"style="color:black;">
                                    Copyright &copy; PCO Company 2018
                                </div>
                                <?php
                                @$cad = $_GET['cad']; // verifica se existe algum erro e mostra a mensagem de erro

                                if (isset($cad)) {  //Condição para mostrar a mensagem de cadastro efetuado com sucesso
                                    ?>    
                                    <div class="alert alert-success alert-dismissible my-5">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <div class="text-center"> <strong >Success!</strong> Cadastro efetuado com Sucesso.</div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </section>
                <?php
                @$pagina = $_GET['pagina'];
               echo '<style>#curso{display:none;}</style>';
                ?>
                <iframe allowtransparency="true" class="bg-transparent" src="<?php
                        if (isset($pagina)) {
                            echo $pagina;
                        }
                        ?>" width="1500" height="1000" frameborder='0' all >
                </iframe>
            </div>







            <script src="../bootstrap4/dist/js/bootstrap.js" type="text/javascript"></script>
            <script src = "../bootstrap4/jquery/dist/jquery.js?version=12" type = "text/javascript"></script>
            <script src="../bootstrap4/dist/js/Menu.js" type="text/javascript"></script>
            <script src="../bootstrap4/popper/dist/umd/popper.js?version=12" type="text/javascript"></script>
            <script src="../bootstrap4/dist/js/bootstrap.js?version=12" type="text/javascript"></script>
            <?php ?>

    </body>
</html>
