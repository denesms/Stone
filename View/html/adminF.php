<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../../bootstrap4/dist/css/bootstrap.css?version=12" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap4/dist/css/bootstrap.min.css?version=12" rel="stylesheet" type="text/css"/>
        <script src="../../bootstrap4/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../bootstrap4/popper/dist/popper.min.js" type="text/javascript"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </head>

    <body class="">

        <?php
        include 'barraSup.php';
        include '../../Model/CursoDAO.php'; // inclue da pagina CursoDAO
        $DAO = new cursoDAO();
        $curso = $DAO->Read();
        ?>


        <!-- 
        <div class = "container" id="menu" >

            <div class="row"> 
                <div class="col-12 text-center my-5">
                    <h1 class="display-3"><strong>Seja bem-vindo</strong></h1>
                    <p>Plataforma de Cursos Online </p>
                </div>
            </div>
        </div> -->

        <div class="row">

            <div class="col-2  ml-4">

                <!-- Teste de Menu lateral-->


                <div id="accordion">


                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapse1">
                                Usuário
                            </a>
                        </div>
                        <div id="collapse1" class="collapse" >
                            <div class="card-body">

                                <a class=" list-group-item-action list-inline-item my-2" href="adminF.php?paginaAdm=cadastroUsuarioF.php">
                                    Cadastrar
                                </a>

                                <a class=" list-group-item-action list-inline-item my-2" href="adminF.php?paginaAdm=crudUsuarioF.php">
                                    Listar
                                </a>

                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapse2">
                                Turma
                            </a>
                        </div>
                        <div id="collapse2" class="collapse" >
                            <div class="card-body">

                                <a class="list-group-item-action list-inline-item my-2" href="adminF.php?paginaAdm=cadastroTurmaF.php">
                                    Cadastrar
                                </a>

                                <a class="list-group-item-action list-inline-item my-2" href="adminF.php?paginaAdm=crudTurmaF.php">
                                    Listar
                                </a>

                            </div>
                        </div>
                    </div>





                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapse3">
                                Matricula
                            </a>
                        </div>
                        <div id="collapse3" class="collapse" >
                            <div class="card-body">

                                <a class="list-group-item-action list-inline-item my-2" href="adminF.php?paginaAdm=casdastroMatriculaF.php">
                                    Cadastrar
                                </a>




                                <a class="list-group-item-action list-inline-item my-2" href="adminF.php?paginaAdm=crudMatriculaF.php">
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
                        <div id="collapse5" class="collapse" >
                            <div class="card-body">



                                <a class="list-group-item-action list-inline-item my-2" href="adminF.php?paginaAdm=cadastroCursoF.php">
                                    Cadastrar
                                </a>


                                <a class="list-group-item-action list-inline-item my-2" href="adminF.php?paginaAdm=crudCursoF.php">
                                    Listar
                                </a>



                            </div>
                        </div>
                    </div>





                    <!-- ============================================================================================= 
                    
                    
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                CADASTROS
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse show" >
                            <div class="card-body">

                                <a class=" list-group-item-action list-inline-item my-2" href="adminF.php?paginaAdm=cadastroUsuarioF.php">
                                    Usuario
                                </a>

                                <a class="list-group-item-action list-inline-item my-2" href="adminF.php?paginaAdm=cadastroCursoF.php">
                                    Curso
                                </a>

                                <a class="list-group-item-action list-inline-item my-2" href="adminF.php?paginaAdm=cadastroConteudoF.php">
                                    Conteudo
                                </a>

                                <a class="list-group-item-action list-inline-item my-2" href="adminF.php?paginaAdm=cadastroTurmaF.php">
                                    Turma
                                </a>

                                <a class="list-group-item-action list-inline-item my-2" href="adminF.php?paginaAdm=casdastroMatriculaF.php">
                                    Matricula
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


                                <a class=" list-group-item-action list-inline-item my-2" href="adminF.php?paginaAdm=crudUsuarioF.php">
                                    Usuario
                                </a>

                                <a class="list-group-item-action list-inline-item my-2" href="adminF.php?paginaAdm=crudCursoF.php">
                                    Curso
                                </a>

                                <a class="list-group-item-action list-inline-item my-2" href="adminF.php?paginaAdm=crudTurmaF.php">
                                    Turma
                                </a>

                                <a class="list-group-item-action list-inline-item my-2" href="adminF.php?paginaAdm=crudMatriculaF.php">
                                    Matricula
                                </a>

                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapse4">
                                Curso/Conteudo
                            </a>
                        </div>
                        <div id="collapse4" class="collapse" >
                            <div class="card-body">


                    <?php
                    foreach ($curso as $c) {

                        $v = 'crudConteudoF.php?id=' . $c->getId();
                        ?>

                                        <a class=" list-group-item-action list-inline-item my-2" href="adminF.php?paginaAdm=<?php echo $v ?>">
                        <?php echo $c->getNome(); ?>
                                        </a>    

                    <?php } ?>

                                
                            </div>
                        </div>
                    </div>
                    
                    
=================================================================================== -->



                </div>

            </div>

            <div class="col-9 pull-right embed-responsive embed-responsive-16by9">
                <?php
                @$pagina = $_GET['paginaAdm'];
                ?>
                <iframe allowtransparency="true" class="bg-transparent embed-responsive-item" src="<?php
                        if (isset($pagina)) {
                            echo $pagina;
                        }
                        ?>"  frameborder='0' all >
                </iframe>

            </div>
        </div>


    </body>
</html>
