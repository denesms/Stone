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

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


    </head>
    <body class="my-login-page">
        <!-- ========================= CONTEUDOS E FORMULÁRIOS HTML ========================= -->     
        <section style="padding-right: 925px;" class="h-100 h mt-3">
            <div class="justify-content-center container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper"style="margin-top: 7%;color:white;">
                        <div class="row justify-content-lg-start">

                        </div>
                        <div class="card"style=" width: 30rem;background-color: #004085;">
                            <div class="card-body">
                                <h4 class="card-title row justify-content-center"style="font-family:'Arial';"><strong>DADOS DE USUÁRIO</strong></h4>

                                <form method="POST" action="../../Model/php/cadastroUsuarioB.php"  >

                                    <div class="form-group">
                                        <label for="name">Nome</label>
                                        <input id="name" type="text" class="form-control h" name="nome" required autofocus>
                                    </div>


                                    <div class="form-group">
                                        <label for="email">E-Mail</label>
                                        <input id="email" type="email" class="form-control" name="email" required maxlength="50">
                                    </div>



                                    <div class="row">
                                        <div class="form-group ml-3 ">
                                            <label for="cpf">CPF</label>
                                            <input id="cpf" type="text" class="form-control cpf-mask" style="width: 200px" name="cpf" required maxlength="14">

                                        </div>
                                        <div class="form-group ml-5">
                                            <label for="rg">RG</label>
                                            <input id="rg" type="text" class="form-control" style="width: 120px" name="rg" maxlength="7" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="rg">Telefone</label>
                                        <input id="phone" type="tel" class="form-control phone-ddd-mask" name="telefone" data-inputmask="'mask': '(99)99999-9999'"  required>
                                    </div>

                                    <div class="form-group float-left">
                                        <label for="cidade">Cidade</label>
                                        <input id="name" type="text" class="form-control" name="cidade" required>

                                    </div>

                                    <div class="row">

                                        <div class="form-group float-right ml-3">
                                            <label for="estado">Estado</label>
                                            <input id="name" type="text" class="form-control" name="estado"  maxlength="2" required>

                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <label for="permissao">Aluno ou Professor ?</label>
                                        <select name="permissao"class="dropdown-item-text"style="width: 17.5rem">

                                            <option  value="Aluno">Aluno</option>
                                            <option  value="Professor">Professor</option>
                                        </select>


                                    </div>

                                    <div class="form-group">
                                        <label for="login">Login</label>
                                        <input id="log" type="text" class="form-control" name="login" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Senha</label>
                                        <input id="password" type="password" class="form-control " name="senha" maxlength="10" required data-eye>
                                    </div>



                                    <div class="form-group no-margin">

                                        <button type="submit" class="btn btn-success btn-block">
                                            Registrar
                                        </button>
                                    </div>
                                    <div class="margin-top20 text-center">
                                        Estou Cadastrado? <a href="index.php?pagina=loginF.php" style="color:#0c0">Login</a>

                                    </div>
                                </form>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </section>
        <!-- Mascaras     --> 


        <script async="" src="//www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
        <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>







        <?php
        @$cad = $_GET['cad']; // verifica se existe algum erro e mostra a mensagem de erro
        @$erro = $_GET['erro'];
        if (isset($cad)) { //Condição para mostrar a mensagem de cadastro efetuado com sucesso
            if ($cad == 1) {
               
                ?>
                <script type="text/javascript"> // Função de Atualizar a Página
               
                    history.go(-2); //volta duas paginas
                </script>
                <div class="alert alert-success alert-dismissible my-3 ">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <div class="text-center"> <strong >Sucesso!</strong> Cadastro efetuado com Sucesso.</div>
                </div>

            <?php } elseif ($cad == 2) {
                ?>

                <div class="alert alert-danger alert-dismissible my-3 ">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <div class="text-center"> <strong >ERRO! </strong>erro - Tente outra vez <?php echo $erro ?></div>
                </div>

                <?php
            } {
                ?>


                <?php
            }
        }
        ?>








    </body>
</html>
