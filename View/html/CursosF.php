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
        <script src="../../bootstrap4/dist/js/bootstrap.js" type="text/javascript"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="../../bootstrap4/dist/js/bootstrap-filestyle.js" type="text/javascript"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </head>


    <body>
        <?php
        include './barraSup.php';
        //================ Classe DAO de Cursos ================
        @include_once '../../Model/CursoDAO.php';
        include_once '../../Model/TurmaDAO.php';
        $DAO = new cursoDAO();

        //============== Paginação ==============   
        @session_start();
        $idusuario = $_SESSION['idusuario'];
        $itens_por_pagina = 10;
        @$pagina = $DAO->itemPorPagina($_GET['pagina'], $itens_por_pagina);
        $numPagina = $DAO->numTotal($itens_por_pagina, $idusuario);
        $curso = $DAO->paginacao($pagina, $numPagina, $itens_por_pagina);
        //$curso = $DAO->paginacao($pagina, $numPagina, $itens_por_pagina);

        $turma = new turmaDAO();

        // $turma->ReadByIDCurso(9);
        // die();

        if (isset($_GET['erro'])) {
            // echo '<script> alert("Erro! Usuario ja cadastrado no Curso!!"); </script>';
            echo "<script> $('#myModal').modal('show'); </script>";
        }
        ?>

        <div class="row mx-3 mt-5 container-fluid " style=" width:1600px;" >

            <?php
            foreach ($curso as $row): // variavel $curso da paginação
                ?>

                <div class="col mb-4" >
                    <div class="card " style="width:300px; margin-top: 80px; margin-bottom: 30px;" >
                        <div class="card-header"style="background-color: #004085;">
                            <img class="card-img" src="../img/curso.jpg" alt="Card image">
                        </div>

                        <div data-spy="scroll" class="card-body"style="color:#ffffff; background-color: #004085; overflow-y: auto; height: 270px;">
                            <h4 class="card-title"style="color:#"><?php echo $row->getNome(); ?></h4>
                            <hr style="height: 4px; border-width: 0; background-color: red;">
                            <label style="color:#0c0"><strong>Descrição:</strong></label><p class="card-text"><?php echo $row->getDescricao(); ?></p>
                            <p class="card-text">  <label style="color:#0c0"><strong>Carga Horária:</strong></label> <?php echo $row->getCargaHoraria(); ?> H</p>

                        </div>
                        <a style="height: 50px; font-size: 22px;"href="../../Model/php/casdastroMatriculaB.php?turma=<?php $turma->ReadByIDCurso($row->getId()); ?>& idusuario=<?php echo $idusuario; ?>" class="btn btn-success">Inscreva-se</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item ">
                        <a class="page-link" href="CursosF.php?pagina=<?php echo $pagina - 1 ?>" tabindex="-1"><i class="fa fa-2x fa-angle-double-left "></i></a>
                    </li>
                    <?php
                    for ($i = 0; $i < $numPagina; $i++) {
                        if ($pagina == $i) {
                            $estilo = "active";
                        } else {
                            $estilo = "";
                        }
                        ?>
                        <li class="page-item <?php echo $estilo ?> "><a class="h4 page-link" href="CursosF.php?pagina=<?php echo $i ?>"> <?php echo $i + 1 ?> </a></li>
                    <?php } ?>
                    <li class="page-item">
                        <a class="page-link" href="CursosF.php?pagina=<?php echo $pagina + 1 ?>"><i class="fa fa-2x fa-angle-double-right "></i></a>
                    </li>
                </ul>
            </nav>
        </div>


        <!----------- Modal ----------->
        <div class="modal fade" id="modalErro">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Incrição Cursos</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Erro.. Usuario ja Inscrito no Curso!!
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <script src="../../bootstrap4/dist/js/bootstrap.js" type="text/javascript"></script>
        <script src = "../../bootstrap4/jquery/dist/jquery.js?version=12" type = "text/javascript"></script>
        <script src="../../bootstrap4/dist/js/Menu.js" type="text/javascript"></script>
        <script src="../../bootstrap4/popper/dist/umd/popper.js?version=12" type="text/javascript"></script>
        <script src="../../bootstrap4/dist/js/bootstrap.js?version=12" type="text/javascript"></script>
        <?php
        if (isset($_GET['erro'])) {
            // echo '<script> alert("Erro! Usuario ja cadastrado no Curso!!"); </script>';
            echo "<script> $('#modalErro').modal('show'); </script>";
        }
        ?>

    </body>
</html>
