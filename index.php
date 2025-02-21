<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../bootstrap4/dist/css/bootstrap.css?version=12" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap4/dist/css/bootstrap.min.css?version=12" rel="stylesheet" type="text/css"/>
        <script src="../bootstrap4/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../bootstrap4/dist/js/bootstrap.js" type="text/javascript"></script>
        <script src="../bootstrap4/popper/dist/popper.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    </head>
    <body style="background: url(View/img/Wallpapers/marvin-meyer-571072-unsplash.jpg);
          background-size:100%;
          background-repeat: no-repeat;
          width: 100%;" >


        <div class="container-viewport" id="navBar">
            <nav class="navbar navbar-expand-lg navbar-light mt-0"style="background-color: #004085;">

                <div class="container-fluid">
                    <a class="navbar-brand h1 mb-0 ml-4 text-white" href="index.php" ><strong>CURSOS ONLINE</strong></a>

                    <!--Botao de tres barras -->
                    <button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbarSite">
                        <span class = "navbar-toggler-icon"> </span>
                    </button>
                    <div class = "collapse navbar-collapse container-fluid" id = "navbarSite">

                        <ul class = "navbar-nav ml-auto">

                            <li class = "nav-item"> <a class = "nav-link text-white" href = "index.php" ><strong>Inicio</strong></a> </li>
                            <li class = "nav-item"> <a class = "nav-link text-white" href = "View/html/CursosF.php" ><strong>Cursos</strong></a> </li>
                            <li class = "nav-item"> <a class = "nav-link text-white" href = "#" ><strong>Professores</strong></a> </li>
                            <li class = "nav-item"> <a class = "nav-link text-white" href = "#" ><strong>Depoimentos</strong></a> </li>
                            <li class = "nav-item"> <a class = "nav-link text-white" href = "#" ><strong>Outros</strong></a> </li>

                        </ul>
                        <ul class = "navbar-nav ml-4">
                            <li class = "nav-item dropdown">
                                <a class = "nav-link dropdown-toggle text-white" href = "#" data-toggle = "dropdown" id = "navDrop"><strong>Social</strong></a>
                                <div class = "dropdown-menu">
                                    <a class = "dropdown-item list-group-item text-primary" href = "https://www.facebook.com/"target="_blank"><i class="fa fa-facebook-official"></i><strong>&nbsp;FaceBook</strong></a>
                                    <a class = "dropdown-item list-group-item text-info" href = "https://twitter.com/?lang=pt-br"target="_blank"><i class="fa fa-twitter"></i><strong>&nbsp;Twitter</strong></a>
                                    <a style="color: #C32aa3;" class = "dropdown-item list-group-item " href = "https://www.instagram.com/?hl=pt-br"target="_blank"><i class="fa fa-instagram"></i><strong>&nbsp;Instagram</strong></a>
                                </div>
                            </li>
                        </ul>


                        <form class="form-inline">
                            <div class="input-group ml-5">
                                <input type="text" class="form-control"style="width: 240px" placeholder="Buscar">
                                <div class="input-group-append">
                                    <button class="btn btn-success"style="width: 57px" type="submit"><i class="fa fa-search"></i></button> 
                                </div>
                            </div>
                        </form>
                        <ul class = "navbar-nav ml-auto mr-md-auto">
                            <a href="View/html/loginF.php"></a>

                            &emsp;&emsp;&emsp;
                            <?php
                            @session_start();

                            if (isset($_SESSION['nomeUser'])) {
                                echo '<style>#login{display:none;}</style>';
                                echo '<style>#cadastro{display:none;}</style>';
                                ?>
                                <i class="fa fa-user-circle fa-2x my-2 text-white"></i>

                                <li class = "nav-item dropdown">
                                    <a class = "nav-link dropdown-toggle h5 text-white" href = "#" data-toggle = "dropdown" id = "navDrop"><?php echo $_SESSION['nomeUser'] ?></a>
                                    <div class = "dropdown-menu">
                                        <a class = "dropdown-item list-group-item text-primary" href = "View/html/perfilF.php"><i class="fa fa-vcard fa-lg"></i><strong>&nbsp&nbsp;Perfil</strong></a>
                                        <a class = "dropdown-item list-group-item text-success" href = "View/html/MeusCursos.php"><i class="fa fa-university fa-lg"></i><strong>&nbsp&nbsp;Meus Cursos</strong></a>
                                        <a class = "dropdown-item list-group-item text-info" href = "View/html/NotasF.php"><i class="fa fa-mortar-board fa-lg"></i><strong>&nbsp&nbsp;Notas</strong></a>
                                        <a style="color:#7d15bd; " class = "dropdown-item list-group-item" href = "#"> <img style="width:23px; height: 18px;" src="View/img/certificate-diploma.png" alt=""/> <strong>&nbsp&nbsp;Certificados</strong></a>
                                        <a class = "dropdown-item list-group-item text-danger" href = "Model/php/loginB.php?deslogar"><i class="fa fa-window-close fa-lg"></i><strong>&nbsp&nbsp;Sair</strong></a>
                                    </div>
                                </li> 

                            <?php } if (@$_SESSION['permissao'] == 'Administrador') { ?>
                                <a class = "nav-link text-white ml-5"style="padding-left: 100px" href = "View/html/adminF.php" ><strong>Administrador</strong></a>
                            <?php } elseif (@$_SESSION['permissao'] == 'Professor') { ?>
                                <a class = "nav-link text-white ml-5"style="padding-left: 100px" href = "View/html/professorF.php" ><strong>Professor</strong></a>
                            <?php } ?>

                                
                                
                                
                                
                            <!-- Button to Open the Modal -->
                            <li class = "nav-item " id="login"> <a class = "nav-link" href = "index.php?pagina=View/html/loginF.php" ><button type="button" class="btn btn-success">LOGIN</button></a> </li>
                            <li class = "nav-item" id="cadastro"> <a class = "nav-link" href = "index.php?user=View/html/cadastroUsuarioF.php" ><button type="button" class="btn btn-danger">CADASTRE-SE</button></a> </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div id="conteudo">

            <div id="carouselSite" class="carousel slide" data-ride="carousel" >

                <ol class="carousel-indicators">
                    <li data-target="#carouselSite" data-slide-to="0" class="active"  >  </li>
                    <li data-target="#carouselSite" data-slide-to="1" >  </li>
                    <li data-target="#carouselSite" data-slide-to="2" >  </li>
                    <!-- <li data-target="#carouselSite" data-slide-to="3" >  </li>
                     <li data-target="#carouselSite" data-slide-to="4" >  </li> -->
                </ol>

                <!-- <div class="carousel-item active"   >
                   <img src="../img/1.jpg" class="img-fluid d-block "> 

                    <div class=" carousel-caption text-justify text-right text-dark"> 
                        <h5>Lorem ipsum rutrum </h5>
                        <p >Eget fringilla interdum vestibulum habitasse porta taciti facilisis maecenas facilisis gravida mattis</p>
                    </div> 

                </div> -->

                <div class="carousel-item active">
                    <img src="View/img/2.jpg" class="img-fluid d-block"style="height: 180px; width: 2000px">

                    <!--<div class=" carousel-caption text-justify text-right text-dark"> 
                        <h5>Lorem ipsum rutrum </h5>
                        <p >Eget fringilla interdum vestibulum habitasse porta taciti facilisis maecenas facilisis gravida mattis</p>
                    </div> -->
                </div>

                <div class="carousel-item">
                    <img src="View/img/3i.jpg" class="img-fluid d-block"style="height: 180px; width: 2000px">
                </div>


                <!-- <div class="carousel-item">
                     <img src="../img/4.jpg" class="img-fluid d-block">
                 </div> -->


                <div class="carousel-item">
                    <img src="View/img/6i.jpg" class="img-fluid d-block"style="height: 180px; width: 2000px">
                </div>

                <a class="carousel-control-prev" href="#carouselSite" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="sr-only">Avançar</span>
                </a>

                <a class="carousel-control-next" href="#carouselSite" role="button" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    <span class="sr-only">Avançar</span>
                </a>

            </div>  

            <div class = "container" id="menuTexto" >

                <div class="row"> 
                    <div class="col-12 text-center my-5">
                        <h1 class="display-3">Eget fringilla interdum</h1>
                        <p>Fames cras himenaeos ipsum eros convallis egestas</p>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-3">

                        <nav id="navbarVertical" class="navbar navbar-light bg-light ">


                            <nav class="nav nav-pills flex-column">
                                <a class="nav-link  my-2" href="#titulo1" >Titulo1</a>
                                <nav class="nav nav-pills flex-column ml-3">
                                    <a class="nav-link" href="#Subtitulo1-1" >SubTitulo1-1</a>
                                    <a class="nav-link" href="#Subtitulo1-2" >SubTitulo1-2</a>
                                </nav>
                                
                                <a class="nav-link  my-2" href="#titulo2" >Titulo2</a>
                                <a class="nav-link my-2" href="#titulo3" >Titulo3</a>
                                
                                <nav class="nav nav-pills flex-column ml-3">
                                    <a class="nav-link" href="#Subtitulo3-1" >SubTitulo3-1</a>
                                    <a class="nav-link" href="#Subtitulo3-2" >SubTitulo3-2</a>
                                </nav>

                            </nav>
                        </nav>
                    </div>

                    <div class="col-9">
                        <div  data-spy="scroll" data-target="#navbarVertical" data-offset="0" style="position:relative ;overflow:auto ;height:350px    ">
                            <h4 id="titulo1">Titulo1</h4>
                            <p>
                                rutrum placerat mi, accumsan platea accumsan adipiscing risus laoreet lacus amet inceptos, 
                                aliquam id congue commodo habitasse taciti et ultrices neque. congue diam imperdiet nisl class 
                                curabitur aliquam ad ultrices, nec lobortis praesent nunc bibendum taciti sodales, eget consectetur
                                mauris ipsum litora neque ipsum. sit dolor fusce vehicula pellentesque sit pharetra nunc consectetur
                                mauris non condimentum, tempus vehicula nunc mollis mauris nullam congue bibendum habitant molestie, 
                                ultrices ac sociosqu ante dapibus dolor vestibulum libero porta at.vehicula ligula mauris molestie nullam
                                ullamcorpeFames cras himenaeos ipsum eros convallis egestasr mattis risus nibh fusce arcu adipiscing
                                elementum primis hendrerit placerat ut, integer scelerisque leo aptent infacilisis inceptos nibh massa
                                non donec leo luctus hendrerit augue. 
                            </p>

                            <h4 id="Subtitulo1-1">SubTitulo1-1</h4>
                            <p>
                                sed rutrum placerat mi, accumsan platea accumsan adipiscing risus laoreet lacus amet inceptos, 
                                aliquam id congue commodo habitasse taciti et ultrices neque. congue diam imperdiet nisl class 
                                curabitur aliquam ad ultrices, nec lobortis praesent nunc bibendum taciti sodales, eget consectetur
                                mauris ipsum litora neque ipsum. sit dolor fusce vehicula pellentesque sit pharetra nunc consectetur
                                mauris non condimentum, tempus vehicula nunc mollis mauris nullam congue bibendum habitant molestie, 
                                ultrices ac sociosqu ante dapibus dolor vestibulum libero porta at.vehicula ligula mauris molestie nullam
                                ullamcorpeFames cras himenaeos ipsum eros convallis egestasr mattis risus nibh fusce arcu adipiscing
                                elementum primis hendrerit placerat ut, integer scelerisque leo aptent infacilisis inceptos nibh massa
                                non donec leo luctus hendrerit augue. 
                            </p>
                            <h4 id="Subtitulo1-2">SubTitulo1-2</h4>
                            <p>
                                sed rutrum placerat mi, accumsan platea accumsan adipiscing risus laoreet lacus amet inceptos, 
                                aliquam id congue commodo habitasse taciti et ultrices neque. congue diam imperdiet nisl class 
                                curabitur aliquam ad ultrices, nec lobortis praesent nunc bibendum taciti sodales, eget consectetur
                                mauris ipsum litora neque ipsum. sit dolor fusce vehicula pellentesque sit pharetra nunc consectetur
                                mauris non condimentum, tempus vehicula nunc mollis mauris nullam congue bibendum habitant molestie, 
                                ultrices ac sociosqu ante dapibus dolor vestibulum libero porta at.vehicula ligula mauris molestie nullam
                                ullamcorpeFames cras himenaeos ipsum eros convallis egestasr mattis risus nibh fusce arcu adipiscing
                                elementum primis hendrerit placerat ut, integer scelerisque leo aptent infacilisis inceptos nibh massa
                                non donec leo luctus hendrerit augue. 
                            </p>
                            <h4 id="titulo2">Titulo2</h4>
                            <p>
                                sed rutrum placerat mi, accumsan platea accumsan adipiscing risus laoreet lacus amet inceptos, 
                                aliquam id congue commodo habitasse taciti et ultrices neque. congue diam imperdiet nisl class 
                                curabitur aliquam ad ultrices, nec lobortis praesent nunc bibendum taciti sodales, eget consectetur
                                mauris ipsum litora neque ipsum. sit dolor fusce vehicula pellentesque sit pharetra nunc consectetur
                                mauris non condimentum, tempus vehicula nunc mollis mauris nullam congue bibendum habitant molestie, 
                                ultrices ac sociosqu ante dapibus dolor vestibulum libero porta at.vehicula ligula mauris molestie nullam
                                ullamcorpeFames cras himenaeos ipsum eros convallis egestasr mattis risus nibh fusce arcu adipiscing
                                elementum primis hendrerit placerat ut, integer scelerisque leo aptent infacilisis inceptos nibh massa
                                non donec leo luctus hendrerit augue. 
                            </p>
                            <h4 id="titulo3">Titulo3</h4>
                            <p>
                                sed rutrum placerat mi, accumsan platea accumsan adipiscing risus laoreet lacus amet inceptos, 
                                aliquam id congue commodo habitasse taciti et ultrices neque. congue diam imperdiet nisl class 
                                curabitur aliquam ad ultrices, nec lobortis praesent nunc bibendum taciti sodales, eget consectetur
                                mauris ipsum litora neque ipsum. sit dolor fusce vehicula pellentesque sit pharetra nunc consectetur
                                mauris non condimentum, tempus vehicula nunc mollis mauris nullam congue bibendum habitant molestie, 
                                ultrices ac sociosqu ante dapibus dolor vestibulum libero porta at.vehicula ligula mauris molestie nullam
                                ullamcorpeFames cras himenaeos ipsum eros convallis egestasr mattis risus nibh fusce arcu adipiscing
                                elementum primis hendrerit placerat ut, integer scelerisque leo aptent infacilisis inceptos nibh massa
                                non donec leo luctus hendrerit augue. 
                            </p>

                            <h4 id="Subtitulo3-1">Titulo3-1</h4>
                            <p>
                                sed rutrum placerat mi, accumsan platea accumsan adipiscing risus laoreet lacus amet inceptos, 
                                aliquam id congue commodo habitasse taciti et ultrices neque. congue diam imperdiet nisl class 
                                curabitur aliquam ad ultrices, nec lobortis praesent nunc bibendum taciti sodales, eget consectetur
                                mauris ipsum litora neque ipsum. sit dolor fusce vehicula pellentesque sit pharetra nunc consectetur
                                mauris non condimentum, tempus vehicula nunc mollis mauris nullam congue bibendum habitant molestie, 
                                ultrices ac sociosqu ante dapibus dolor vestibulum libero porta at.vehicula ligula mauris molestie nullam
                                ullamcorpeFames cras himenaeos ipsum eros convallis egestasr mattis risus nibh fusce arcu adipiscing
                                elementum primis hendrerit placerat ut, integer scelerisque leo aptent infacilisis inceptos nibh massa
                                non donec leo luctus hendrerit augue. 
                            </p>
                            <h4 id="Subtitulo3-2">Titulo3-2</h4>
                            <p>
                                sed rutrum placerat mi, accumsan platea accumsan adipiscing risus laoreet lacus amet inceptos, 
                                aliquam id congue commodo habitasse taciti et ultrices neque. congue diam imperdiet nisl class 
                                curabitur aliquam ad ultrices, nec lobortis praesent nunc bibendum taciti sodales, eget consectetur
                                mauris ipsum litora neque ipsum. sit dolor fusce vehicula pellentesque sit pharetra nunc consectetur
                                mauris non condimentum, tempus vehicula nunc mollis mauris nullam congue bibendum habitant molestie, 
                                ultrices ac sociosqu ante dapibus dolor vestibulum libero porta at.vehicula ligula mauris molestie nullam
                                ullamcorpeFames cras himenaeos ipsum eros convallis egestasr mattis risus nibh fusce arcu adipiscing
                                elementum primis hendrerit placerat ut, integer scelerisque leo aptent infacilisis inceptos nibh massa
                                non donec leo luctus hendrerit augue. 
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div> 


        <!--Optional JavaScript -->
        <!--jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../../bootstrap4/dist/js/bootstrap.js" type="text/javascript"></script>
        <script src = "../../bootstrap4/jquery/dist/jquery.js?version=12" type = "text/javascript"></script>
        <script src="../../bootstrap4/dist/js/Menu.js" type="text/javascript"></script>
        <script src="../../bootstrap4/popper/dist/umd/popper.js?version=12" type="text/javascript"></script>
        <script src="../../bootstrap4/dist/js/bootstrap.js?version=12" type="text/javascript"></script>
        <?php
        @$login = $_GET['login'];
        @$user = $_GET['user'];
        @$deslogar = $_GET['deslogar'];
        @$pagina = $_GET['pagina'];


        if (isset($pagina)) {
            include $pagina;
        }



        if (isset($user)) {
            echo '<style>#conteudo{display:none;}</style>';
            include $user;
            echo "<script> $('#loginErro').modal('show'); </script>;";
        }

        if (isset($_GET['deslogar'])) {
            session_destroy();
            $_GET['deslogar'] = null;
        }
        ?>



    </body>
</html>
