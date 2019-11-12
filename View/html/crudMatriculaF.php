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

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php
        //================ Classe DAO de MATRICULA ================
        @include '../../Model/MatriculaDAO.php'; // inclue da pagina MatriculaDAO
        $DAO = new MatriculaDAO(); // instanciando um novo objeto do tipo MatriculaDAO


        //============== Paginação ==============   
        $itens_por_pagina = 6;
        @$pagina = $DAO->itemPorPagina($_GET['pagina'], $itens_por_pagina);
        $numPagina = $DAO->numTotal($itens_por_pagina);
        $matricula = $DAO->paginacao($pagina, $numPagina, $itens_por_pagina)
        ?>

 <!-- ========================= CONTEUDOS E FORMULÁRIOS HTML ========================= -->
        <header>
            <div class="row mx-5" >
                <div class="col-sm-6">
                    <h2>Matriculas</h2>
                </div>
                <div class="col-sm-6 text-right h2">
                    <a class="btn btn-primary" href="casdastroMatriculaF.php"><i class="fa fa-plus"></i> Nova Matricula</a>

                </div>
            </div>
        </header>

        <!--============================ TABELA ========================  -->
        <div class="mx-5"style="width: 1180px;">
            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Nota1</th>
                        <th>Nota2</th>
                        <th>Nota Final</th>
                        <th>Ultimo Slide</th>
                        <th>Ultimo Capitulo</th>
                        <th>Ultima Secao</th>
                         <th>Curso</th>
                        <th>Turma</th>
                        <th style="width: 10%;">Aluno</th>
                        <th style="width: 15%;">Opções</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($matricula as $row): ?>
                        <tr class="text-center">
                            <!-- Pega as variaveis da classe Conteudo -->
                            <td><?php echo $row->getIdmatricula(); ?></td>
                            <td><?php echo $row->getNota1(); ?></td>
                            <td><?php echo $row->getNota2(); ?></td>
                            <td><?php echo $row->getNotafinal(); ?></td>
                            <td><?php echo $row->getUltimoslide(); ?></td>
                            <td><?php echo $row->getUltimocapitulo(); ?></td>
                            <td><?php echo $row->getUltimasecao(); ?></td>
                            <td><?php echo $row->getNomecurso(); ?></td>
                            <td><?php echo $row->getIdturma(); ?></td>
                            <td><?php echo $row->getNomealuno(); ?></td>


                            <td class="actions text-center">

                                <a class="btn btn-sm btn-success"href="../../Model/php/crudMatriculaB.php?id=<?php echo $row->getIdmatricula(); ?>& nota1=<?php echo $row->getNota1(); ?>& nota2=<?php echo $row->getNota2(); ?>& notafinal=<?php echo $row->getNotafinal(); ?>& ultimoslide=<?php echo $row->getUltimoslide(); ?>& ultimocapitulo=<?php echo $row->getUltimocapitulo(); ?>& ultimasecao=<?php echo $row->getUltimasecao(); ?>& turma=<?php echo $row->getIdturma(); ?>& idaluno=<?php echo $row->getIdaluno(); ?>& nome=<?php echo $row->getNomealuno(); ?>">
                                    <i class="fa fa-pencil"></i> Editar </a>
                                <a class="btn btn-sm btn-danger" href="../../Model/php/crudMatriculaB.php?idDel=<?php echo $row->getIdaluno(); ?>">
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
                            <a class="page-link" href="crudMatriculaF.php?pagina=<?php echo $pagina - 1 ?>" tabindex="-1"><i class="fa fa-2x fa-angle-double-left "></i></a>
                        </li>
                        <?php
                        for ($i = 0; $i < $numPagina; $i++) { // Laço de repetição para paginação
                            if ($pagina == $i) {
                                $estilo = "active";
                            } else {
                                $estilo = "";
                            }
                            ?>
                            <li class="page-item <?php echo $estilo ?> "><a class="h4 page-link" href="crudMatriculaF.php?pagina=<?php echo $i ?>"> <?php echo $i + 1 ?> </a></li>
                        <?php } ?>
                        <li class="page-item">
                            <a class="page-link" href="crudMatriculaF.php?pagina=<?php echo $pagina + 1 ?>"><i class="fa fa-2x fa-angle-double-right "></i></a>
                        </li>

                    </ul>
                </nav>
            </div>

        </div>
fsdfsdffdgsdfggsdfgdfgdfsgdfsg

        <!--Optional JavaScript -->
        <!--jQuery first, then Popper.js, then Bootstrap JS -->
        <script src = "../bootstrap4/jquery/dist/jquery.js?version=12" type = "text/javascript"></script>
        <script src="../bootstrap4/popper/dist/umd/popper.js?version=12" type="text/javascript"></script>
        <script src="../bootstrap4/dist/js/bootstrap.js?version=12" type="text/javascript"></script>

    </body>
</html>


