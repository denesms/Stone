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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <body>



        <?php
        include './barraSup.php';
        ?>





        <div class="row">

            <div class="col-2  ml-4">

                <!-- Teste de Munu lateral-->


                <div id="accordion">

                    <!--                    <div class="card">
                                            <div class="card-header">
                                                <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                                    CRIAR
                                                </a>
                                            </div>
                                            <div id="collapseOne" class="collapse show" >
                                                <div class="card-body">
                    
                                                    <a class=" list-group-item-action list-inline-item my-2" href="professorF.php?pagina=cadastroCursoF.php">
                                                        Curso
                    
                                                    </a>
                    
                                                    <a class="list-group-item-action list-inline-item my-2" href="professorF.php?pagina=professorTurma.php">
                                                        Turma
                                                    </a>
                    
                                                    <a class="list-group-item-action list-inline-item my-2" href="professorF.php?pagina=casdastroMatriculaF.php">
                                                        Matricula
                                                    </a>
                    
                                                    <a class="list-group-item-action list-inline-item my-2" href="professorF.php?pagina=professorConteudo.php">
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
                    
                                                    <a class="list-group-item-action list-inline-item my-2" href="professorF.php?pagina=crudCursoF.php">
                                                        Curso
                                                    </a>
                    
                                                    <a class="list-group-item-action list-inline-item my-2" href="professorF.php?pagina=crudConteudoF.php">
                                                        Conteudo
                                                    </a>
                    
                    
                                                    <a class="list-group-item-action list-inline-item my-2" href="professorF.php?pagina=crudTurmaF.php">
                                                        Turma
                                                    </a>
                    
                                                    <a class="list-group-item-action list-inline-item my-2" href="professorF.php?pagina=crudMatriculaF.php">
                                                        Matricula
                                                    </a>
                                                </div>
                                            </div>
                                        </div>-->



                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapse2">
                                Turma
                            </a>
                        </div>
                        <div id="collapse2" class="collapse show" >
                            <div class="card-body">

                                <a class="list-group-item-action list-inline-item my-2" href="professorF.php?pagina=cadastroTurmaF.php">
                                    Cadastrar
                                </a>

                                <a class="list-group-item-action list-inline-item my-2" href="professorF.php?pagina=crudTurmaF.php">
                                    Listar
                                </a>

                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapse5">
                                Curso
                            </a>
                        </div>
                        <div id="collapse5" class="collapse show" >
                            <div class="card-body">



                                <a class="list-group-item-action list-inline-item my-2" href="professorF.php?pagina=cadastroCursoF.php">
                                    Cadastrar
                                </a>


                                <a class="list-group-item-action list-inline-item my-2" href="professorF.php?pagina=crudCursoF.php">
                                    Listar
                                </a>

                               

                            </div>
                        </div>
                    </div>







                </div>
            </div>
            <!--Cadastrar Matricula  -->

            <div class="col-9 pull-right embed-responsive embed-responsive-16by9">

                <?php
                @$pagina = $_GET['pagina'];
                ?>
                <iframe allowtransparency="true" class="bg-transparent embed-responsive-item" src="<?php
                        if (isset($pagina)) {
                            echo $pagina;
                        }
                        ?>" frameborder='0'  all >
                </iframe>
            </div>



        </div>



        <script src="../bootstrap4/dist/js/bootstrap.js" type="text/javascript"></script>
        <script src = "../bootstrap4/jquery/dist/jquery.js?version=12" type = "text/javascript"></script>
        <script src="../bootstrap4/dist/js/Menu.js" type="text/javascript"></script>
        <script src="../bootstrap4/popper/dist/umd/popper.js?version=12" type="text/javascript"></script>
        <script src="../bootstrap4/dist/js/bootstrap.js?version=12" type="text/javascript"></script>


    </body>
</html>
