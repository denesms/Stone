<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../../bootstrap4/dist/css/bootstrap.css?version=12" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap4/dist/css/bootstrap.min.css?version=12" rel="stylesheet" type="text/css"/>
        <script src="../../bootstrap4/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../bootstrap4/popper/dist/popper.min.js" type="text/javascript"></script>
        <script src="../../bootstrap4/dist/js/bootstrap.js" type="text/javascript"></script>

    </head>
    <body class="my-tuma-page ">

        <section style="padding-right: 1080px;"class="h-100 h">
            <div class="container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper"style="margin-top: 20%;color:white;">
                        <div class="row justify-content-lg-start">

                        </div>
                        <div class="card"style=" width: 20rem;background-color: #004085;">
                            <div class="card-body">
                                <h4 class="card-title row justify-content-center"style="font-family:'Arial';"><strong>FORMULÁRIO DE TURMA</strong></h4>

                                <form method="POST" action="../../Model/php/cadastroTurmaB.php">

                                    <div class="form-group">
                                        <label for="datainicio">Data Inicio</label>
                                        <input id="datainicio" type="date" class="form-control" name="datainicio" required autofocus>
                                    </div>


                                    <div class="form-group">
                                        <label for="datafinal">Data Final</label>
                                        <input id="datafinal" type="date" class="form-control" name="datafinal" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="idcurso">Curso</label>
                                        <select name="idcurso"class="dropdown-item-text"style="width: 17.5rem">
                                            <?php
                                            include_once '../../Model/CursoDAO.php';
                                            $DAO = new CursoDAO();
                                            $curso = $DAO->Read();

                                            foreach ($curso as $row) {
                                                ?>
                                                <option  value="<?php echo $row->getId(); ?>"><?php echo $row->getNome(); ?></option><?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <?php if($_SESSION['permissao'] != 'Professor'){ ?>
                                    
                                    <div class="form-group">
                                        <label for="idprofessor1">Professor1</label>
                                        <select name="idprofessor1"class="dropdown-item-text"style="width: 17.5rem">


                                            <?php
                                            include_once '../../Model/UsuarioDAO.php';
                                            $DAO = new UsuarioDAO();
                                            $usuario = $DAO->ReadProFeADM();
                                            foreach ($usuario as $row) {
                                                ?>
                                                <option  value="<?php echo $row->getIdusuario(); ?>"><?php echo $row->getNome(); ?></option> <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    
                                        <?php }  else{?>
                                    
                                    <input  type="hidden" value=" <?php echo $_SESSION['idusuario'] ?>" name="idprofessor1">
                                    
                                        <?php }?>
                                        
                                    
                                    

                                    <div class="form-group">
                                        <label for="idprofessor2">Professor2</label>
                                        <select name="idprofessor2"class="dropdown-item-text"style="width: 17.5rem">
                                            <option  value="0"  > </option>                                           

                                            <?php
                                            include_once '../../Model/UsuarioDAO.php';
                                            $DAO = new UsuarioDAO();
                                            $usuario = $DAO->ReadProFeADM();
                                            foreach ($usuario as $row) {

                                                
                                                
                                                    ?>
                                            <option  value="<?php echo $row->getIdusuario(); ?>"><?php echo $row->getNome(); ?></option> <?php
                                            }
                                            
                                            ?>


                                        </select>

                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="descricao">Descrição</label>
                                        
                                        <input id="descricao" type="text" class="form-control" name="descricao" required>
                                        
                                    </div>

                                    <div class="form-group no-margin">
                                        <button type="submit" class="btn btn-success btn-block">
                                            Registrar
                                        </button>
                                    </div>

                                </form>
                            </div>

                        </div>
                        
                    </div>
                </div>
            </div>

        </section>

        <?php
        @$cad = $_GET['cad'];

        if (isset($cad)) {
            ?>    
            <div class="alert alert-success alert-dismissible my-5">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div class="text-center"> <strong >Success!</strong> Cadastro efetuado com Sucesso.</div>
            </div>
        <?php } ?>

    </body>

</html>
