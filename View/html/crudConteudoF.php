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
        //================ Classe DAO de Conteudo ================
        include '../../Model/ConteudoDAO.php'; // inclue da pagina ConteudoDAO
        $DAO = new ConteudoDAO(); // instanciando um novo objeto do tipo ConteudoDAO
        //============== Paginação ==============  

        $itens_por_pagina = 10;
        @$idcurso = $_GET['id'];
        @$pagina = $DAO->itemPorPagina($_GET['pagina'], $itens_por_pagina);
        $numPagina = $DAO->numTotal($itens_por_pagina, $idcurso);
        
        @$nomecurso = $_GET['nomecurso'];
        
        if (isset($idcurso)) {

            $conteudo = $DAO->paginacaoByCurso($pagina, $numPagina, $itens_por_pagina, $idcurso);
        } else {
            $conteudo = $DAO->paginacao($pagina, $numPagina, $itens_por_pagina);
        }
     
        ?>


        <!-- ========================= CONTEUDOS E FORMULÁRIOS HTML ========================= -->
        <header>
            <div class="row mx-5" >
                <div class="col-sm-6">
                    <h2>Conteudos - <?php echo $nomecurso?> </h2>
                </div>
                <div class="col-sm-6 text-right h2">
                    <a class="btn btn-primary" target="_blank" href="aulasF.php?id=<?php echo $idcurso ?>"><i class="fa fa-eye"></i> Visualizar</a>
                    <a class="btn btn-primary" href="cadastroConteudoF.php?curso=<?php echo $idcurso ?>"><i class="fa fa-plus"></i> Novo Conteudo</a>

                </div>
            </div>
        </header>
        <!--============================ TABELA ========================  -->
        <div class="mx-5">
            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Capitulo</th>
                        <th>Secao</th>
                        <th>Slide</th>
                        <th>Opções</th>

                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($conteudo as $row): ?>
                        <tr class="text-center">
                            <!-- Pega as variaveis da classe Conteudo -->
                            <td><?php echo $row->getIdconteudo(); ?></td>
                            <td ><?php echo $row->getTitulo(); ?></td>
                            <td><?php echo $row->getCapitulo(); ?></td>
                            <td><?php echo $row->getSecao(); ?></td>
                            <td><?php echo $row->getOrdem(); ?></td>
                            

                            <td>

                                <a class="btn btn-sm btn-success"href="../../Model/php/crudConteudoB.php?id=<?php echo $row->getIdconteudo(); ?>">
                                    <i class="fa fa-pencil"></i> Editar </a>
                                <a class="btn btn-sm btn-danger" href="../../Model/php/crudConteudoB.php?idDel=<?php echo $row->getIdconteudo(); ?>&idcurso=<?php echo $row->getIdcurso();?>">
                                    <i class="fa fa-trash"></i> Excluir </a>
                                    
                                    
                                    <a class="btn btn-sm btn-success"href="../../Model/php/crudConteudoB.php?id=<?php echo $row->getIdconteudo(); ?>&edit=0">
                                    <i class="fa fa-arrow-up"></i> Add </a>
                                    
                                    <a class="btn btn-sm btn-success"href="../../Model/php/crudConteudoB.php?id=<?php echo $row->getIdconteudo(); ?>&edit=1">
                                    <i class="fa fa-arrow-down"></i> Add </a>


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
                            <a class="page-link" href="crudConteudoF.php?pagina=<?php echo $pagina - 1 ?>&id=<?php echo $idcurso ?>" tabindex="-1"><i class="fa fa-2x fa-angle-double-left "></i></a>
                        </li>
                        <?php
                        for ($i = 0; $i < $numPagina; $i++) {  // Laço de repetição para paginação
                            if ($pagina == $i) {
                                $estilo = "active";
                            } else {
                                $estilo = "";
                            }
                            ?>
                            <li class="page-item <?php echo $estilo ?> "><a class="h4 page-link" href="crudConteudoF.php?pagina=<?php echo $i ?>&id=<?php echo $idcurso ?> "> <?php echo $i + 1 ?> </a></li>
                        <?php } ?>
                        <li class="page-item">
                            <a class="page-link" href="crudConteudoF.php?pagina=<?php echo $pagina + 1 ?>&id=<?php echo $idcurso ?>"><i class="fa fa-2x fa-angle-double-right "></i></a>
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

