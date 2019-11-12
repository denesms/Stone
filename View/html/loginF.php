<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8"/>
        <title></title>
        
        
        <link href="../../bootstrap4/dist/css/bootstrap.css?version=12" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap4/dist/css/bootstrap.min.css?version=12" rel="stylesheet" type="text/css"/>
        <script src="../../bootstrap4/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../bootstrap4/popper/dist/popper.min.js" type="text/javascript"></script>
    </head>
    <body class="my-login-page"style="background-color: #004085;">

        <div class="modal fade" id="ModalLogin">
            <div class="modal-dialog" style="color:white;">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header bg-dark justify-content-center">
                        <h4 class="modal-title "><strong>LOGIN</strong></h4>

                    </div>

                    <!-- Modal body -->
                    <div class="modal-body " style="background-color: #7C909E;">

                        <section class="h-100">
                            <div class="container h-100">
                                <div class="row justify-content-md-center h-100">
                                    <div class="card-wrapper"style="margin-top: 20%;color:white; ">



                                        <h4 class="card-title row justify-content-center"style="font-family:'Arial';">Seja Bem-Vindo</h4>
                                        <form method="POST"  action="../../Model/php/loginB.php">
                  
                                            <div class="form-group">
                                                <label for="email">Login:</label>

                                                <input id="email" type="text" class="form-control" name="login" value="" required autofocus>
                                            </div>

                                            <div class="form-group">
                                                <label for="password">Senha:

                                                </label>
                                                <input id="password" type="password" class="form-control" name="senha" required data-eye>
                                            </div>



                                            <div class="form-group no-margin">
                                                <button type="submit" id="loginModal" class="btn btn-primary btn-block">
                                                    Login
                                                </button>
                                            </div>
                                            <div class="margin-top20 text-center">
                                                Criar uma Conta? <a href="index.php?user=cadastroUsuarioF.php">Inscreva-se</a>
                                            </div>
                                        </form>
                                    

                                        
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer bg-dark">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- The Modal Sucesso -->
        <div class="modal fade" id="LoginSucesso">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Login</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Logado Com Sucesso!
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                       
                 
                      <a href="MeusCursos.php"> <button type="button" class="btn btn-success" data-dismiss="modal">OK</button> </a>  
                    </div>

                </div>
            </div>
        </div>

        <!-- The Modal Erro -->
        <div class="modal fade" id="loginErro">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Login</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Erro no Login
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                    </div>

                </div>
            </div>
        </div>



        <script src="../../bootstrap4/dist/js/Menu.js" type="text/javascript"></script>
        <script src="../../bootstrap4/dist/js/my-login.js" type="text/javascript"></script>
        <script src="../../bootstrap4/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../bootstrap4/jquery/dist/jquery.min.js" type="text/javascript"></script>

        <script src="../../bootstrap4/dist/js/bootstrap.js" type="text/javascript"></script>
        <script src = "../../bootstrap4/jquery/dist/jquery.js?version=12" type = "text/javascript"></script>
        <script src="../../bootstrap4/dist/js/Menu.js" type="text/javascript"></script>
        <script src="../../bootstrap4/popper/dist/umd/popper.js?version=12" type="text/javascript"></script>
        <script src="../../bootstrap4/dist/js/bootstrap.js?version=12" type="text/javascript"></script>

        <?php
        @$login = $_GET['login'];

        ob_start();
        if (isset($login)) {
            if ($login == 1) {

                echo "<script> $('#loginErro').modal('show'); </script>";
                //echo" <script> document.location.href=' ../html/index1.php?login=loginF.php' </script>;";
            } elseif ($login == 2) {
                echo "<script> $('#LoginSucesso').modal('show'); </script>";
                // echo" <script> document.location.href=' ../html/index1.php' </script>;";
                //header('location: ../html/index1.php');
            }

            if (isset($_GET['deslogar'])) {
                session_destroy();
                $_GET['deslogar'] = null;
            }
        } else {
            echo "<script> $('#ModalLogin').modal('show'); </script>";
        }
        ?>

    </body>
</body>
</html>
