<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'barraSup.php';
        include '../../Model/CursoDAO.php'; // inclue da pagina CursoDAO
        $DAO = new cursoDAO();
        $curso = $DAO->Read();
        ?>
        <div class = "container" id="menu" >

            <div class="row"> 
                <div class="col-12 text-center my-5">
                    <h1 class="display-3"><strong>Ola Seja bem-vindo</strong></h1>
                    <p>Plataforma de Cursos Online </p>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-2  ml-4">

                <!-- Teste de Menu lateral-->
                <div id="accordion">

                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                                Cursos Disponiveis
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse show" >
                            <div class="card-body">
                                <?php
                                foreach ($curso as $c) {

                                    $v = 'CursoF.php?id='.$c->getId();
                                    ?>
                                
                                <a class=" list-group-item-action list-inline-item my-2" href='<?php echo $v ; ?>'>
                                        <?php echo $c->getNome(); ?>
                                    </a>    

                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>



            </div>

            <div class="col-9 pull-right">
                <?php
                @$pagina = $_GET['paginaAdm'];
                ?>
                <iframe allowtransparency="true" class="bg-transparent" src="<?php
                        if (isset($pagina)) {
                            echo $pagina;
                        }
                        ?>" width="2000" height="1000" frameborder='0' all >
                </iframe>

            </div>
        </div>
    </body>
</html>
