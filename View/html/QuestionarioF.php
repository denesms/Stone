<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Adicione uma pergunta</title>


        <link href="../../bootstrap4/dist/css/bootstrap.css?version=12" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap4/dist/css/bootstrap.min.css?version=12" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap4/dist/css/questionario.css?version=12" rel="stylesheet" type="text/css"/>

        <script src="../../bootstrap4/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../bootstrap4/popper/dist/popper.min.js" type="text/javascript"></script>
        <script src="../../bootstrap4/dist/js/bootstrap.js" type="text/javascript"></script>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    </head>
    <body>

        <?php
        //================ Classe DAO de Questionario ================

        include '../../Model/questoesDAO.php'; // inclue da pagina queataoDAO
        $DAO = new QuestoesDAO(); // instanciando um novo objeto do tipo ConteudoDAO
        //============== Paginação ==============  

        $itens_por_pagina = 1;
        @$idcurso = $_GET['id'];
        @$pagina = $DAO->itemPorPagina($_GET['pagina'], $itens_por_pagina);
        $numPagina = $DAO->numTotal($itens_por_pagina, $idcurso);

        @$nomecurso = $_GET['nomecurso'];


        $questao = $DAO->paginacao($pagina, $numPagina, $itens_por_pagina, $idcurso);
        ?>


        <form action="../../Model/php/cadastroQuestB.php" method="post">

            <div class="container">
                <div class="row d-block justify-content-center"><br><br>
                    <div class="col-lg-12 ">



                        <div id="quiz">


                            <?php foreach ($questao as $row): ?>

                                <div class="question">
                                    <h3><span class="label label-warning" id="qid"> <?php echo $pagina + 1; ?></span>
                                        <span id="question"> <?php echo $row->getPergunta(); ?></span>
                                    </h3>
                                </div>
                                <ul>
                                    <li>
                                        <input type="radio" id="f-option" name="selector" value="<?php echo $row->getVa(); ?>" >
                                        <label for="f-option" class="element-animation"> <?php echo $row->getRa(); ?> </label>
                                        <div class="check"></div>
                                    </li>

                                    <li>
                                        <input type="radio" id="s-option" name="selector" value="<?php echo $row->getVb(); ?>">
                                        <label for="s-option" class="element-animation"><?php echo $row->getRb(); ?></label>
                                        <div class="check"><div class="inside"></div></div>
                                    </li>

                                    <li>
                                        <input type="radio" id="t-option" name="selector" value="<?php echo $row->getVc(); ?>">
                                        <label for="t-option" class="element-animation"><?php echo $row->getRc(); ?></label>
                                        <div class="check"><div class="inside"></div></div>
                                    </li>

                                    <li>
                                        <input type="radio" id="g-option" name="selector" value="<?php echo $row->getVd(); ?>">
                                        <label for="g-option" class="element-animation"><?php echo $row->getRd(); ?></label>
                                        <div class="check"><div class="inside"></div></div>
                                    </li>
                                </ul>
                            </div>

                            <input type="hidden" name="idcurso" value="<?php echo $idcurso; ?>" >
                            <input type="hidden" name="idq" value="<?php echo $row->getIdq(); ?>" >

                        <?php endforeach; ?>
                        <div class="text-muted">


                            <div class="row ">
                                <!--============================ PAGINAÇÃO ========================  -->

                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">

                                        <li class="page-item mt-5 mr-5">
                                            <a class="page-link bg-success" href="?pagina=<?php if ($pagina != 0) echo $pagina - 1 ?>&id=<?php echo $idcurso ?>" tabindex="-1"><i class="fa fa-2x fa-angle-double-left "></i></a>
                                        </li>


                                        <li class="page-item mt-5 ml-5">
                                            <a class="page-link bg-success" href="?pagina=<?php
                                            if ($pagina < $numPagina) {
                                                echo $pagina + 1;
                                            } else {
                                                echo $numPagina;
                                            }
                                            ?>&id=<?php echo $idcurso ?>"><i class="fa fa-2x fa-angle-double-right "></i></a>
                                        </li>

                                        <?php if ($pagina == $numPagina) { ?>
                                            <li class="page-item mt-5 ml-lg-5"> <input type="submit" class="btn btn-success  " name="addQuestionario" value="Finalizar Teste" >  </li>
                                            <?php } ?>
                                    </ul>
                                </nav>

                            </div>


                        </div>

                    </div>


                </div>



            </div>

        </form>

    </body>
</html>





