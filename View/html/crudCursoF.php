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
    </head>
    <body>
        <?php
        //================ Classe DAO de Cursos ================
        @include '../../Model/CursoDAO.php'; // inclue da pagina CursoDAO
        $DAO = new cursoDAO(); // instanciando um novo objeto do tipo CursoDAO


        //============== Paginação ==============   
        $itens_por_pagina = 10;
        @$pagina = $DAO->itemPorPagina($_GET['pagina'], $itens_por_pagina);
        $numPagina = $DAO->numTotal($itens_por_pagina);
        $curso = $DAO->paginacao3($pagina, $numPagina, $itens_por_pagina)
        ?>

       <!-- ========================= CONTEUDOS E FORMULÁRIOS HTML ========================= -->
        <header>
            <div class="row mx-5" >
                <div class="col-sm-6">
                    <h2>Cursos</h2>
                </div>
                <div class="col-sm-6 text-right h2">
                    <a class="btn btn-primary" href="cadastroCursoF.php"><i class="fa fa-plus"></i> Novo Curso</a>

                </div>
            </div>
        </header>
 <!--============================ TABELA ========================  -->
        <div class="mx-5">
            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Nome Curso</th>
                        <th>Descrição</th>
                        <th>Carga Horária</th>
                        <th>Opções</th>

                    </tr>
                </thead>
                <tbody>
                
                    <?php
                    foreach ($curso as $c):
                        ?>
                        <tr class="text-center">
                            <!-- Pega as variaveis da classe Curso -->
                            <td><?php echo $c->getId(); ?></td>
                            <td><?php echo $c->getNome(); ?></td>
                            <td><?php echo $c->getDescricao(); ?></td>
                            <td><?php echo $c->getCargaHoraria(); ?></td>

                            <td class="actions text-center">

                                <a class="btn btn-sm btn-success"href="../../Model/php/crudCursoB.php?id=<?php echo $c->getId(); ?>& nomecurso=<?php echo $c->getNome(); ?>& descricao=<?php echo $c->getDescricao(); ?>& cargahoraria=<?php echo $c->getCargaHoraria(); ?>">
                                    <i class="fa fa-pencil"></i> Editar </a>
                                <a class="btn btn-sm btn-danger" href="../../Model/php/crudCursoB.php?idDel=<?php echo $c->getId(); ?>">
                                    <i class="fa fa-trash"></i> Excluir </a>
                                  <a class="btn btn-sm btn-success"href="crudConteudoF.php?id=<?php echo $c->getId(); ?>& nomecurso=<?php echo $c->getNome(); ?>" >
                                    <i class="fa fa-pencil"></i> Contúdo </a>  
                                    
                                    <a class="btn btn-sm btn-success"href="listarQuest.php?id=<?php echo $c->getId(); ?>& nomecurso=<?php echo $c->getNome(); ?>" >
                                    <i class="fa fa-pencil"></i> Avaliação </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
            <!--============================ PAGINAÇÃO ========================  -->
            <div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item ">
                            <a class="page-link" href="crudCursoF.php?pagina=<?php echo $pagina - 1 ?>" tabindex="-1"><i class="fa fa-2x fa-angle-double-left "></i></a>
                        </li>
                        <?php
                        for ($i = 0; $i < $numPagina; $i++) { // Laço de repetição para paginação
                            if ($pagina == $i) {
                                $estilo = "active";
                            } else {
                                $estilo = "";
                            }
                            ?>
                            <li class="page-item <?php echo $estilo ?> "><a class="h4 page-link" href="crudCursoF.php?pagina=<?php echo $i ?>"> <?php echo $i + 1 ?> </a></li>
                        <?php } ?>
                        <li class="page-item">
                            <a class="page-link" href="crudCursoF.php?pagina=<?php echo $pagina + 1 ?>"><i class="fa fa-2x fa-angle-double-right "></i></a>
                        </li>

                    </ul>
                </nav>
            </div>


        </div>

        <!--Optional JavaScript -->
        <!--jQuery first, then Popper.js, then Bootstrap JS -->
        <script src = "../bootstrap4/jquery/dist/jquery.js?version=12" type = "text/javascript"></script>
        <script src="../bootstrap4/popper/dist/umd/popper.js?version=12" type="text/javascript"></script>
        <script src="../bootstrap4/dist/js/bootstrap.js?version=12" type="text/javascript"></script>

    </body>
</html>

