<!DOCTYPE html>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">

        <style>
            body {
                font-family: "Lato", sans-serif;
            }

            .sidenav {
                height: 100%;
                width: 0;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                background-color: #111;
                overflow-x: hidden;
                transition: 0.5s;
                padding-top: 60px;
            }

            .sidenav a {
                padding: 0px 0px 0px 0px;
                text-decoration: none;
                font-size: 20px;
                color: #818181;
                display: block;
                transition: 0.3s;
            }

            .sidenav a:hover {
                color: #f1f1f1;
            }

            .sidenav .closebtn {
                position: absolute;
                top: 0;
                right: 25px;
                font-size: 36px;
                margin-left: 50px;
            }

            @media screen and (max-height: 450px) {
                .sidenav {padding-top: 15px;}
                .sidenav a {font-size: 18px;}
            }
        </style>


        <title></title>
    </head>
    <link href="../../bootstrap4/dist/css/bootstrap.css?version=12" rel="stylesheet" type="text/css"/>
    <link href="../../bootstrap4/dist/css/bootstrap.min.css?version=12" rel="stylesheet" type="text/css"/>
    <script src="../../bootstrap4/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../bootstrap4/popper/dist/popper.min.js" type="text/javascript"></script>
    <script src="../../bootstrap4/dist/js/bootstrap.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <body background ="../img/Wallpapers/fundo-degrade.jpg">
        <?php
        //================ Classe DAO de Conteudo ================
        include '../../Model/ConteudoDAO.php'; // inclue da pagina ConteudoDAO
        $DAO = new ConteudoDAO(); // instanciando um novo objeto do tipo ConteudoDAO
        //============== Paginação ==============  

        $itens_por_pagina = 1;
        @$idcurso = $_GET['id'];
        @$pagina = $DAO->itemPorPagina($_GET['pagina'], $itens_por_pagina);

        $numPagina = $DAO->numTotal($itens_por_pagina, $idcurso);
        $conteudo = $DAO->paginacaoByCurso($pagina, $numPagina, $itens_por_pagina, $idcurso);
        $conteudo2 = $DAO->ReadByIDCurso($idcurso);

        $total = $DAO->Total($idcurso) - 1;
        ?>


        <!-- Barra lateral -->
        <div id="mySidenav" class="sidenav">


            <?php
            $cap = -1;
            $secao = -1;
            $slide = -1;
            $pag = 0;


            foreach ($conteudo2 as $row):
                ?>



                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                <ul>

                    <li>

                        <?php if ($cap != $row->getCapitulo()) { ?>
                            <a href=<?php echo "?pagina=".$pag."&id=".$idcurso?>>Capitulo <?php echo $row->getCapitulo(); ?></a>
                        <?php } $cap = $row->getCapitulo(); ?>

                        <ul>

                            <?php if ($secao != $row->getSecao()) { ?>
                                <li><a href= <?php echo"?pagina=" .$pag."&id=".$idcurso ?> >Seção <?php echo $row->getSecao(); ?></a></li>
                            <?php } $secao = $row->getSecao(); ?>
                            <ul>

                                <?php if ($slide != $row->getOrdem()) { ?>
                                    <li><a href=<?php echo  "?pagina=".$pag."&id=" . $idcurso ?> >Slide <?php echo $row->getOrdem(); ?></a></li>
                                <?php } $slide = $row->getOrdem();
                                $pag++; ?>
                            </ul>

                        </ul>
                    </li>

                </ul>


<?php endforeach; ?>


        </div>



        <div class="container-fluid">
            <br/>
            <div  class="row col-3 border-danger" style="border-bottom:solid 6px ">  

<?php foreach ($conteudo as $row): ?>
                    <br/>

                    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; 

                        <strong style="font-size: 18px;"><label>Capitulo-></label><?php echo $row->getCapitulo(); ?><label>&nbsp;- Seção-> </label><?php echo $row->getSecao(); ?><label>&nbsp;- Slide-> </label><?php echo $row->getOrdem(); ?></strong>

                    </span>

<?php endforeach; ?>


            </div>          
            <div class="row">

                <!--=========================== Lado Esquerdo ===========================-->
                <div class="col-6  mx-4 my-3"style="padding-left: 160px;" ><br/><br/>

                    <?php
                    $caminho = " ../dados/curso/" . $idcurso . "/";


                    foreach ($conteudo as $row):
                        $imagem = $row->getImagem();
                        $video = $row->getVideo();
                        if (isset($imagem) && $imagem != '') {

                            $imagem = $caminho . $imagem;
                            ?>
                            <img src="<?php echo $imagem ?>" alt="" style="height: 580px; width: 750px;"/>

                            <?php
                        } else {
                            $video = $caminho . $video;
                            ?>

                            <video width="750" height="580" controls>
                                <source src="<?php echo $video ?>" type="video/mp4">
                                <source src="<?php echo $video ?>" type="video/ogg">
                                <source src="<?php echo $video ?>" type="video/webm">
                                Seu navegador não Suporta o Video!!
                            </video>

                            <?php
                        }

                    endforeach;
                    ?>
                </div>

                <!--=========================== Lado Direito ===========================-->

                <div class=" col-5  mx-4 my-3" style="overflow-y: auto; height: 720px;" ><br/><br/>
<?php foreach ($conteudo as $row): ?>
                        <p>  <strong style="font-size: 32px;"><?php echo $row->getTitulo(); ?></strong>  </p> 
                        <label style="text-align: justify;text-indent: 40px" >   <?php echo $row->getTexto(); ?>  </label>

<?php endforeach; ?>
                </div>
            </div>

            <!-- Quadrado Transparente 
            <div class="carousel-inner">

            </div> -->
            <div id="demo" class="row" style=" background-image: linear-gradient(to right,#004085, #000000 );">

                <!-- Botao home -->
                <div class="col-1 ml-4">
                    <a class=" btn ml-5" href="MeusCursos.php">

                        <span class=" fa fa-home fa-4x text-danger"></span>
                    </a>
                </div>

                <!-- Barra de Progresso -->
                <div class="col-8 mt-4 mx-4">

                    <?php
                    // $porcent = $total;    
                    if ($total == 0) {
                        $porcent = 100;
                    } else {
                        $porcent = ($pagina * 100) / $total;
                    }

                    $porcentInt = intval($porcent) . "%";
                    ?>

                    <div class="progress" style="height:30px;font-size:25px; ">
                        <div class="progress-bar" style="width:<?php echo $porcentInt; ?>;height:30px;  "><?php echo $porcentInt; ?> </div>
                    </div>
                </div>

                <div class="col-2 ml-md-4">
                    <!-- Paginação -->
                    <?php
                    $p = 0;
                    if ($pagina != 0) {
                        $p = 1;
                    }
                    ?>

                    <a class=" btn "  href="aulasF.php?pagina=<?php echo $pagina - $p; ?>&id=<?php echo $idcurso ?>" tabindex="-1" data-slide="prev">

                        <span class=" fa fa-arrow-circle-left fa-4x text-primary"></span>
                    </a>
                    <?php
                    $p = 0;
                    if ($pagina < ($numPagina - 1)) {
                        $p = 1;
                    }
                    ?>
                    <a class="btn ml-4" href="aulasF.php?pagina=<?php echo $pagina + $p; ?>&id=<?php echo $idcurso ?>" data-slide="next">

                        <span class="fa fa-arrow-circle-right fa-4x text-primary"></span>
                    </a> 



                </div>
            </div>
        </div>  




        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>
    </body>
</html>
