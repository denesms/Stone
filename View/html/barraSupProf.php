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
        <link href="../../../bootstrap4/dist/css/bootstrap.css?version=12" rel="stylesheet" type="text/css"/>
        <link href="../../../bootstrap4/dist/css/bootstrap.min.css?version=12" rel="stylesheet" type="text/css"/>
        <script src="../../../bootstrap4/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../../bootstrap4/popper/dist/popper.min.js" type="text/javascript"></script>
        <script src="../../../bootstrap4/dist/js/bootstrap.js" type="text/javascript"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>

        <div class="container-viewport" id="navBar" >
            <nav class="navbar navbar-expand-lg navbar-light mt-0"style="background-color: #004085;">

                <div class="container-fluid">
                    <a class="navbar-brand h1 mb-0 ml-4 text-white" href="../../../index.php" ><strong>CURSOS ONLINE</strong></a>

                    <!--Botao de tres barras -->
                    <button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbarSite">
                        <span class = "navbar-toggler-icon"> </span>
                    </button>
                    <div class = "collapse navbar-collapse container-fluid" id = "navbarSite">

                        <ul class = "navbar-nav ml-auto">
                            <a href="../../../index.php"></a>
                            <li class = "nav-item"> <a class = "nav-link text-white" href = "../../../index.php" ><strong>Inicio</strong></a> </li>
                            <li class = "nav-item"> <a class = "nav-link text-white" href = "../CursosF.php" ><strong>Cursos</strong></a> </li>
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
                                <input type="text" class="form-control"style="width: 300px" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button> 
                                </div>
                            </div>
                        </form>
                        <ul class = "navbar-nav ml-auto mr-md-auto">
                            


                            <?php
                            @session_start();

                            if (isset($_SESSION['nomeUser'])) {
                                echo '<style>#login{display:none;}</style>';
                                echo '<style>#cadastro{display:none;}</style>';
                                ?>
                                <i class="fa fa-user-circle fa-2x my-2 text-white"></i>
                                <a href="../../Model/php/loginB.php"></a>
                                <li class = "nav-item dropdown">
                                    <a class = "nav-link dropdown-toggle h5 text-white" href = "#" data-toggle = "dropdown" id = "navDrop"><?php echo $_SESSION['nomeUser'] ?></a>
                                    <div class = "dropdown-menu">
                                       
                                        <a class = "dropdown-item list-group-item text-primary" href = "../perfilF.php"><i class="fa fa-vcard fa-lg"></i><strong>&nbsp&nbsp;Perfil</strong></a>
                                        <a class = "dropdown-item list-group-item text-success" href = "#"><i class="fa fa-university fa-lg"></i><strong>&nbsp&nbsp;Meus Cursos</strong></a>
                                        <a class = "dropdown-item list-group-item text-info" href = "#"><i class="fa fa-mortar-board fa-lg"></i><strong>&nbsp&nbsp;Notas</strong></a>
                                        <a class = "dropdown-item list-group-item text-danger" href = "../../../Model/php/loginB.php?deslogar"><i class="fa fa-window-close fa-lg"></i><strong>&nbsp&nbsp;Sair</strong></a>
                                    </div>
                                </li> 
                                <a href="adminF.php"></a>
                            <?php } if (@$_SESSION['permissao'] == 'Administrador') { ?>
                                <a class = "nav-link text-white ml-5"style="padding-left: 100px" href = "adminF.php" ><strong>Administrador</strong></a>
                            <?php } elseif (@$_SESSION['permissao'] == 'Professor') { ?>
                                <a class = "nav-link text-white ml-5"style="padding-left: 100px" href = "professorCurso.php" ><strong>Professor</strong></a>
                            <?php } ?>
                                
                            <!-- Button to Open the Modal -->
                            <li class = "nav-item " id="login"> <a class = "nav-link" href = "../../../index.php?pagina=loginF.php" ><button type="button" class="btn btn-success">LOGIN</button></a> </li>
                            <li class = "nav-item" id="cadastro"> <a class = "nav-link" href = "../../../index.php?user=cadastroUsuarioF.php" ><button type="button" class="btn btn-danger">CADASTRE-SE</button></a> </li>

                        </ul>
                    </div>
                </div>
            </nav>

        </div>





        <?php
        ?>
    </body>
</html>
