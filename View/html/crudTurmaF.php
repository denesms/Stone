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
//================ Classe DAO de Turmas ================
       @include '../../Model/TurmaDAO.php';  // inclue da pagina TurmaDAO
        $DAO = new turmaDAO(); // instanciando um novo objeto do tipo TurmaDAO

//============== Paginação ==============   
        $itens_por_pagina = 10;
        @$pagina = $DAO->itemPorPagina($_GET['pagina'], $itens_por_pagina);
        $numPagina = $DAO->numTotal($itens_por_pagina);
        $turma = $DAO->paginacao($pagina, $numPagina, $itens_por_pagina)
        ?>

<!-- ========================= CONTEUDOS E FORMULÁRIOS HTML ========================= -->
        <header>
            <div class="row mx-5" >
                <div class="col-sm-6">
                    <h2>Turmas</h2>
                </div>
                <div class="col-sm-6 text-right h2">
                    <a class="btn btn-primary" href="cadastroTurmaF.php"><i class="fa fa-plus"></i> Nova Turma</a>

                </div>
            </div>
        </header>

  <!--============================ TABELA ========================  -->
        <div class="mx-5" style="width: 1200px;">
            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Data Inicio</th>
                        <th>Data Final</th>
                        <th>Curso</th>
                        <th>Professor1</th>
                        <th>Professor2</th>
                         <th>Descrição</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($turma as $row): ?>
                        <tr class="text-center">
                            <!-- Pega as variaveis da classe Conteudo -->
                            <td><?php echo $row->getIdturma(); ?></td>
                            <td><?php echo $row->getDatainicio(); ?></td>
                            <td><?php echo $row->getDatafinal(); ?></td>
                            <td><?php echo $row->getNomecurso(); ?></td>
                            <td><?php echo $row->getNomeprofessor1(); ?></td>
                            <td><?php echo $row->getNomeprofessor2(); ?></td>
                            <td><?php echo $row->getTDescricao(); ?></td>

                            <td class="actions text-center">

                                <a class="btn btn-sm btn-success"href="../../Model/php/crudTurmaB.php?id=<?php echo $row->getIdturma(); ?>& datainicio=<?php echo $row->getDatainicio(); ?>& datafinal=<?php echo $row->getDatafinal(); ?>& idcurso=<?php echo $row->getIdcurso(); ?>& idprofessor1=<?php echo $row->getIdprofessor1(); ?>& idprofessor2=<?php echo $row->getIdprofessor2(); ?>& nomecurso=<?php echo $row->getNomecurso(); ?>& nomeprofessor1=<?php echo $row->getNomeprofessor1(); ?>& nomeprofessor2=<?php echo $row->getNomeprofessor2(); ?>">
                                    <i class="fa fa-pencil"></i> Editar </a>
                                <a class="btn btn-sm btn-danger" href="../../Model/php/crudTurmaB.php?idDel=<?php echo $row->getIdturma(); ?>">
                                    <i class="fa fa-trash"></i> Excluir </a>

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
                            <a class="page-link" href="crudTurmaF.php?pagina=<?php echo $pagina - 1 ?>" tabindex="-1"><i class="fa fa-2x fa-angle-double-left "></i></a>
                        </li>
                        <?php
                        for ($i = 0; $i < $numPagina; $i++) { // Laço de repetição para paginação
                            if ($pagina == $i) {
                                $estilo = "active";
                            } else {
                                $estilo = "";
                            }
                            ?>
                            <li class="page-item <?php echo $estilo ?> "><a class="h4 page-link" href="crudTurmaF.php?pagina=<?php echo $i ?>"> <?php echo $i + 1 ?> </a></li>
                        <?php } ?>
                        <li class="page-item">
                            <a class="page-link" href="crudTurmaF.php?pagina=<?php echo $pagina + 1 ?>"><i class="fa fa-2x fa-angle-double-right "></i></a>
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
